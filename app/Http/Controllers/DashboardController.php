<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Qualification;
use App\Models\Skill;
use App\Models\UserProfile;
use App\Models\WorkingExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();

        //dd($user->profile()->telephone ?? 'ciao');
        if ($user->hasRole('company')) {
            return view('company.company-dashboard');
        } else if ($user->hasRole('user')) {
            return view('candidate.dashboard.profile')->with('user', $user);
        }
    }

    public function updateProfile(Request $data) {
        $user = Auth::user(); // current user

        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'jobTitle'=> ['nullable','string', 'max:255'],
            'minSalary'=> ['nullable','numeric', 'min:0'],
            'description'=> ['nullable','string'],
            'avatar'=> ['nullable','max:10000','mimes:jpg,png,jpeg'], //10 mb
            'birth'=> ['nullable','date'],
            'sex' => [
                'nullable',
                Rule::in(['M', 'F']),
            ],
            'telephone'=> ['nullable','string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id, 'id')],
            'country'=> ['nullable','string', 'max:255'],
            'city'=> ['nullable','string', 'max:255'],
            'website'=> ['nullable','string', 'max:255']
        ]);

        $user->name = $data->input('name');
        $user->surname = $data->input('surname');
        $user->email = $data->input('email');

        if($data->avatar != null) {
            $newImageName = 'users/' . time() . "-" . $data->input('name') . $data->input('surname') . "-" . $user->id . $data->avatar->extension();
            $data->avatar->move(public_path('storage/users'), $newImageName);
            $user->avatar = $newImageName;
        }

        $user->save();

        $profile = new UserProfile();
        if ($user->profile()->exists()) {
            $profile = $user->profile;
        } else {
            $profile->user()->associate($user);
        }
        $profile->job_title = $data->input('jobTitle');
        $profile->min_salary = $data->input('minSalary');
        $profile->overview = $data->input('description');
        $profile->birth = $data->input('birth');
        $profile->sex = $data->input('sex');
        $profile->telephone = $data->input('telephone');
        $profile->country = $data->input('country');
        $profile->city = $data->input('city');
        $profile->website = $data->input('website');
        $profile->save();

        return back()->with('success', 'Profilo utente aggiornato correttamente');
    }

    public function showChangePassword() {
        return view('candidate.dashboard.change-password');
    }

    public function changePassword(Request $data) {
        $error = null;

        $data->validate([
            'new_password'=> ['required', 'string', 'min:8'],
            'confirm_password'=> ['required', 'string', 'min:8']
        ]);

        $user = Auth::user(); // current user
        if (!Hash::check($data->input('old_password'), $user->password)) {
            $error = ['old_pass' => 'La password attuale non corrisponde'];
        }
        if ($data->input('confirm_password') != $data->input('new_password')) {
            $error = ['new_pass' => 'Le due password non coincidono'];
        }

        if ($error != null) {
            return Redirect::back()
                ->withErrors($error)
                ->withInput();
        }

        $user->password = Hash::make($data->input('new_password'));
        $user->save();

        return Redirect::back()->with('success','Password cambiata con successo');
    }

    public function showFavorite() {
        return view('candidate.dashboard.favorite');
    }

    public function showAppliedJobs() {
        return view('candidate.dashboard.applied-jobs');
    }

    public function showJobAlert() {
        return view('candidate.dashboard.job-alert');
    }

    public function showOnlineCV() {
        $user = Auth::user();
        return view('candidate.dashboard.online-cv')->with([
            'qualifications' => $user->qualifications,
            'experiences' => $user->workingExperiences,
            'certificates' => $user->certificates,
            'skills' => $user->skills,
        ]);
    }

    public function populateOnlineCV(Request $data, $operationType) {
        $user = Auth::user(); // current user

        switch ($operationType) {
            case 'qualification':
                $data->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'inProgress' => ['nullable','string', 'max:255'],
                    'startDate'=> ['required', 'date'],
                    'endDate'=> ['nullable','date','after_or_equal:startDate'],
                    'institute'=> ['string', 'required', 'max:255'],
                    'description'=> ['nullable','string'], //10 mb
                    'valuation'=> ['nullable','string','max:255']
                ]);

                $qualification = $data->input('id') != null ? $user->qualifications->firstWhere('id', $data->input('id')) : new Qualification();
                $qualification->user()->associate($user);
                $qualification->name = $data->input('name');
                $qualification->start_date = $data->input('startDate');
                $qualification->end_date = $data->input('endDate');
                $qualification->in_progress = ($data->input('inProgress') == 'on') ? true : false;
                $qualification->institute = $data->input('institute');
                $qualification->description = $data->input('description');
                $qualification->valuation = $data->input('valuation');

                $qualification->save();
                return redirect()->route('onlineCV')->with('success', $data->input('id') == null ? 'Qualifica inserita correttamente' : 'Qualifica aggiornata correttamente');
                break;
            case 'experience':
                $data->validate([
                    'jobPosition' => ['required', 'string', 'max:255'],
                    'inProgress' => ['nullable','string', 'max:255'],
                    'startDate'=> ['required', 'date'],
                    'endDate'=> ['nullable','date','after_or_equal:startDate'],
                    'companyName'=> ['string', 'required', 'max:255'],
                    'description'=> ['nullable','string']
                ]);

                $experience = $data->input('id') != null ? $user->workingExperiences->firstWhere('id', $data->input('id')) : new WorkingExperience();
                $experience->user()->associate($user);
                $experience->job_position = $data->input('jobPosition');
                $experience->start_date = $data->input('startDate');
                $experience->end_date = $data->input('endDate');
                $experience->in_progress = ($data->input('inProgress') == 'on') ? true : false;
                $experience->company = $data->input('companyName');
                $experience->description = $data->input('description');

                $experience->save();
                return redirect()->route('onlineCV')->with('success', $data->input('id') == null ? 'Esperienza inserita correttamente' : 'Esperienza aggiornata correttamente');
                break;
            case 'certificate':
                $data->validate([
                    'certificateName' => ['required', 'string', 'max:255'],
                    'date'=> ['required', 'date'],
                    'endDate'=> ['nullable','date','after_or_equal:date'],
                    'certificateSociety'=> ['string', 'required', 'max:255'],
                    'credential'=> ['required','string'],
                    'link'=> ['nullable','string','max:255']
                ]);

                $certificate = $data->input('id') != null ? $user->certificates->firstWhere('id', $data->input('id')) : new Certificate();
                $certificate->user()->associate($user);
                $certificate->name = $data->input('certificateName');
                $certificate->date = $data->input('date');
                $certificate->end_date = $data->input('endDate');
                $certificate->society = $data->input('certificateSociety');
                $certificate->credential = $data->input('credential');
                $certificate->link = $data->input('link');

                $certificate->save();
                return redirect()->route('onlineCV')->with('success', $data->input('id') == null ? 'Certificato inserito correttamente' : 'Certificato aggiornato correttamente');
                break;
            case 'skill':
                $data->validate([
                    'skillName' => ['required', 'string', 'max:255'],
                    'skillLevel'=> ['required','string','max:255',Rule::in(['beginner', 'intermediate','advanced'])]
                ]);

                $skill = $data->input('id') != null ? $user->skills->firstWhere('id', $data->input('id')) : new Skill();
                $skill->user()->associate($user);
                $skill->name = $data->input('skillName');
                $skill->assestment = $data->input('skillLevel');

                $skill->save();
                return redirect()->route('onlineCV')->with('success', $data->input('id') == null ? 'Competenza inserita correttamente' : 'Competenza aggiornata correttamente');
                break;
            case 'cv':
                echo "i equals 2";
                break;
            default:
                //default case;
        }
    }

    public function editCV($operationType, $id) {
        $user = Auth::user(); // current user

        switch ($operationType) {
            case 'qualification':
                $qualification = Qualification::find($id);
                if ($qualification->user == $user) {
                    return view('candidate.dashboard.edit-cv')->with(['qualification' => $qualification, 'operationType' => $operationType]);
                } else {
                    // redirect error page
                }
                break;
            case 'experience':
                $experience = WorkingExperience::find($id);
                if ($experience->user == $user) {
                    return view('candidate.dashboard.edit-cv')->with(['experience' => $experience, 'operationType' => $operationType]);
                } else {
                    // redirect error page
                }
                break;
            case 'certificate':
                $certificate = Certificate::find($id);
                if ($certificate->user == $user) {
                    return view('candidate.dashboard.edit-cv')->with(['certificate' => $certificate, 'operationType' => $operationType]);
                } else {
                    // redirect error page
                }
                break;
            case 'skill':
                $skill = Skill::find($id);
                if ($skill->user == $user) {
                    return view('candidate.dashboard.edit-cv')->with(['skill' => $skill, 'operationType' => $operationType]);
                } else {
                    // redirect error page
                }
                break;
            case 'cv':
                echo "i equals 2";
                break;
            default:
                //default case;
        }
    }


    public function deleteRecordCv($id, $operationType) {
        switch ($operationType) {
            case 'qualification':
                $qualification = Qualification::find($id);
                if ($qualification->user == Auth::user()) {
                    $qualification->delete();
                    return back()->with('success', 'Qualifica eliminata correttamente');
                } else {
                    // redirect error page
                }
                break;
            case 'experience':
                $experience = WorkingExperience::find($id);
                if ($experience->user == Auth::user()) {
                    $experience->delete();
                    return back()->with('success', 'Esperienza eliminata correttamente');
                } else {
                    // redirect error page
                }
                break;
            case 'certificate':
                $certificate = Certificate::find($id);
                if ($certificate->user == Auth::user()) {
                    $certificate->delete();
                    return back()->with('success', 'Certificazione eliminata correttamente');
                } else {
                    // redirect error page
                }
            case 'skill':
                $skill = Skill::find($id);
                if ($skill->user == Auth::user()) {
                    $skill->delete();
                    return back()->with('success', 'Skill eliminata correttamente');
                } else {
                    // redirect error page
                }
                break;
            case 'cv':
                break;
            default:
                //default case;
        }
    }
}
