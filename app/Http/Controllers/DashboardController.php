<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'jobTitle'=> ['string', 'max:255'],
            'minSalary'=> ['numeric', 'min:0'],
            'description'=> ['string'],
            'avatar'=> ['required','max:10000','mimes:jpg,png'], //10 mb
            'birth'=> ['date'],
            'sex' => [
                'required',
                Rule::in(['M', 'F']),
            ],
            'telephone'=> ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country'=> ['string', 'max:255'],
            'city'=> ['string', 'max:255'],
            'website'=> ['string', 'max:255']
        ]);

        $user = Auth::user(); // current user
        $user->name = $data->input('name');
        $user->surname = $data->input('surname');
        $user->email = $data->input('email');
        //$user->avatar = $data->input('avatar');
        $user->save();

        $profile = new UserProfile();;
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
        return view('candidate.dashboard.online-cv');
    }
}
