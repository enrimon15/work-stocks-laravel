<?php

namespace App\Http\Controllers;

use App\Models\Qualification;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $user = Auth::user();

        //dd($user->profile()->telephone ?? 'ciao');
        if ($user->hasRole('company')) {
            return view('company.company-dashboard')->with('tab', 'profile');
        } else if ($user->hasRole('base_user')) {
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
            $newImageName = time() . "-" . $data->input('name') . $data->input('surname') . "-" . $user->id . $data->avatar->extension();
            $data->avatar->move(public_path('images'), $newImageName);
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
        $qualifications = $user->qualifications;
        return view('candidate.dashboard.online-cv')->with(['qualifications' => $qualifications]);
    }

    public function populateOnlineCV(Request $data, $operationType) {
        $user = Auth::user(); // current user

        switch ($operationType) {
            case 'qualification':
                $data->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'inProgress' => ['nullable','string', 'max:255'],
                    'startDate'=> ['required', 'date'],
                    'endDate'=> ['nullable','date','after_or_equal:start_date'],
                    'institute'=> ['string', 'required', 'max:255'],
                    'description'=> ['nullable','string'], //10 mb
                    'valuation'=> ['nullable','string','max:255']
                ]);

                $qualification = new Qualification();
                $qualification->user()->associate($user);
                $qualification->name = $data->input('name');
                $qualification->start_date = $data->input('startDate');
                //if ($data->input('endDate') != null) $qualification->end_date = date('Y',strtotime($data->input('endDate')));
                if ($data->input('endDate') != null) $qualification->end_date = $data->input('endDate');
                $qualification->in_progress = ($data->input('inProgress') == 'on') ? true : false;
                $qualification->institute = $data->input('institute');
                if ($data->input('description') != null) $qualification->description = $data->input('description');
                if ($data->input('valuation') != null) $qualification->valuation = $data->input('valuation');

                $qualification->save();
                return back()->with('success', 'Qualifica inserita correttamente');
                break;
            case 'experience':
                echo "i equals 1";
                break;
            case 'certificate':
                echo "i equals 2";
                break;
            case 'skill':
                echo "i equals 2";
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
                if ($qualification->user == Auth::user()) {
                    return view('candidate.dashboard.edit-cv')->with('qualification', $qualification);
                } else {
                    // redirect error page
                }
                break;
            case 'experience':
                echo "i equals 1";
                break;
            case 'certificate':
                echo "i equals 2";
                break;
            case 'skill':
                echo "i equals 2";
                break;
            case 'cv':
                echo "i equals 2";
                break;
            default:
                //default case;
        }
    }

    public function deleteQualification($id) {
        $qualification = Qualification::find($id);
        if ($qualification->user == Auth::user()) {
            $qualification->delete();
            return back()->with('success', 'Qualifica eliminata correttamente');
        } else {
            // redirect error page
        }
    }
}
