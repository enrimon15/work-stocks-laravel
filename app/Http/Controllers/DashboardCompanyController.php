<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use App\Models\PlacesOfWork;
use App\Models\User;
use Conner\Tagging\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DashboardCompanyController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('company.dashboard.profile')->with('user', $user);
    }

    public function updateProfile(Request $data) {
        $user = Auth::user();

        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
            'surname' => ['required', 'string', 'max:255'],
            'companyName' => ['required', 'string', 'max:255'],
            'description'=> ['nullable','string'],
            'vatNumber' => ['required', 'numeric', 'digits:11'],
            'slogan' => ['nullable', 'string', 'max:255'],
            'companyForm' => ['required', 'string', 'max:255'],
            'foundationYear' => ['required', 'numeric', 'min:0'],
            'employeesNumber' => ['required', 'numeric', 'min:0'],
            'website' => ['nullable', 'string', 'max:255'],
            'phoneContact' => ['nullable','string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'typeWorkingPlace' => [
                'required',
                Rule::in(['legal', 'commercial', 'operative']),
            ]
        ]);

        $user->name = $data->input('name');
        $user->surname = $data->input('surname');
        $user->email = $data->input('email');
        if($data->avatar != null) {
            $newImageName = 'users/' . time() . "-" . $data->input('companyName') . "-" . $user->id . '.' . $data->avatar->extension();
            $data->avatar->move(public_path('storage/users'), $newImageName);
            $user->avatar = $newImageName;
        }
        $user->save();

        $company = $user->company;
        $company->name = $data['companyName'];
        $company->overview = $data['description'];
        $company->website = $data['website'];
        $company->slogan = $data['slogan'];
        $company->employees_number = $data['employeesNumber'];
        $company->foundation_year = $data['foundationYear'];
        $company->company_form = $data['companyForm'];
        $company->vat_number = $data['vatNumber'];
        $company->telephone = $data['phoneContact'];
        $company->save();

        $workingPlace = $company->mainPlaceOfWork();
        $workingPlace->address = $data['address'];
        $workingPlace->city = $data['city'];
        $workingPlace->country = $data['country'];
        $workingPlace->type = $data['typeWorkingPlace'];
        $workingPlace->primary = true;
        $workingPlace->save();

        return back()->with('success', __('dashboard/company/profile.success'));
    }

    public function workingPlaces() {
        $user = Auth::user();
        return view('company.dashboard.working-places')->with('workingPlaces', $user->company->workingPlaces);
    }

    public function editWorkingPlaces($id) {
        $user = Auth::user();
        $workingPlace = PlacesOfWork::find($id);
        if ($workingPlace->company->user == $user) {
            return view('company.dashboard.edit-working-place')->with('workingPlace', $workingPlace);
        }
    }

    public function deleteWorkingPlaces($id) {
        $user = Auth::user();
        $workingPlace = PlacesOfWork::find($id);
        if ($workingPlace->company->user == $user) {
            $workingPlace->delete();
            return back()->with('success', __('dashboard/company/workingPlaces.successDelete'));
        }
    }

    public function executeWorkingPlaces(Request $data) {
        $user = Auth::user(); // current user

        $data->validate([
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required','string', 'max:255'],
            'address'=> ['required','string', 'max:255'],
            'type'=> ['required','string', 'max:255', Rule::in(['legal', 'commercial','operative'])],
            'primary'=> ['nullable','string', 'max:255']
        ]);

        $company = $user->company;
        $main = $company->mainPlaceOfWork();
        if ($data->input('primary') == 'on' && $main != null) {
            $main->primary = false;
            $main->save();
        }

        $workingPlace = $data->input('id') != null ? $company->workingPlaces->firstWhere('id', $data->input('id')) : new PlacesOfWork();
        $workingPlace->city = $data->input('city');
        $workingPlace->country = $data->input('country');
        $workingPlace->address = $data->input('address');
        $workingPlace->type = $data->input('type');
        $workingPlace->primary = ($data->input('primary') == 'on') ? true : false;
        $workingPlace->company()->associate($company);

        $workingPlace->save();

        if ($data->input('id') == null) return redirect()->route('workingPlacesCompany')->with('success', __('dashboard/company/workingPlaces.successAdd'));
        else return redirect()->route('workingPlacesCompany')->with('success', __('dashboard/company/workingPlaces.successUpdate'));
    }

    public function postNewJob() {
        //dd(JobOffer::find(3)->tagNames());

        $user = Auth::user(); // current user
        $workingPlaces = $user->company->workingPlaces;
        return view('company.dashboard.post-new-job')->with('workingPlaces', $workingPlaces);
    }

    public function editJob($id) {
        $user = Auth::user(); // current user

        $jobOffer = JobOffer::find($id);
        $workingPlaces = $user->company->workingPlaces;
        return view('company.dashboard.post-new-job')
            ->with('workingPlaces', $workingPlaces)
            ->with('jobOffer', $jobOffer);
    }

    public function postNewJobExecute(Request $data, $operationType) {
        $user = Auth::user(); // current user
        $company = $user->company;

        $data->validate([
            'workingPlace' => ['required','numeric', 'exists:places_of_works,id'], // Rule:exists -->'exists:places_of_work,id'
            'title' => ['required','string', 'max:255'],
            'description'=> ['required','string'],
            'dueDate'=> ['required', 'date', 'after:yesterday'],
            'offerType'=> ['required','string', 'max:255', Rule::in(['full_time', 'part_time','construction_base', 'internship'])],
            'experience' => ['required','numeric', 'min:0'],
            'gender' => ['required','string', 'max:255', Rule::in(['female', 'male','not_specified'])],
            'minSalary' => ['required','numeric', 'min:0'],
            'maxSalary' => ['required','numeric', 'min:0'],
            'skills' => ['required', 'array', 'min:1'],
            'skills.*' => ['required', 'string', 'distinct']
        ]);

        $newJob = $operationType == 'create' ? new JobOffer() : JobOffer::find($data->input('id'));
        $newJob->title = $data->input('title');
        $newJob->description = $data->input('description');
        $newJob->due_date = $data->input('dueDate');
        $newJob->offers_type = $data->input('offerType');
        $newJob->sex = $data->input('gender');
        $newJob->experience = $data->input('experience');
        $newJob->min_salary = $data->input('minSalary');
        $newJob->max_salary = $data->input('maxSalary');

        $newJob->company()->associate($company);

        $workingPlace = PlacesOfWork::find($data->input('workingPlace'));
        $newJob->workingPlace()->associate($workingPlace);

        $newJob->save();

        // skills
        $newJob->retag($data->input('skills'));

        /*$tags = $newJob->tags->;
        foreach ($tags as $tag) {
            $tag->setGroup('skill');
        }*/
        $jobOffers = $user->company->jobOffers()->orderBy('due_date', 'desc')->get();

        $success = $operationType == 'create' ? __('dashboard/company/newJob.success') : __('dashboard/company/newJob.successUpdate');
        return redirect()->route('manageJobsCompany')
            ->with('success', $success)
            ->with('jobs', $jobOffers);
    }

    public function manageJobs() {
        $user = Auth::user();
        $jobOffers = $user->company->jobOffers()->orderBy('due_date', 'desc')->paginate(10);
        return view('company.dashboard.manage-job-offer')->with('jobs', $jobOffers);
    }


    public function deleteJob($id) {
        $user = Auth::user();
        $job = JobOffer::find($id);

        if ($user->company->jobOffers->contains($job)) {
            $job->delete();
        }

        return back()->with('success', __('dashboard/company/manage-jobs.successDelete'));
    }

    public function showCandidate($jobId) {
        $user = Auth::user();

        $candidates=DB::table('users')
            ->join('applications','users.id','=','applications.id_subscriber')
            ->join('user_profiles','users.id','=','user_profiles.user_id')
            ->where('applications.id_job_offer','=',$jobId)
            ->orderBy('applications.created_at', 'desc')
            ->paginate(10);

        return view('company.dashboard.job-candidates')
            ->with('candidates', $candidates)
            ->with('jobName', JobOffer::find($jobId)->title);
    }
}
