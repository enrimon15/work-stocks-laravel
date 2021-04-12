<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->hasRole('company')) {
            return view('company.company-dashboard')->with('tab', 'profile');
        } else {
            return view('candidate.candidate-dashboard')->with('tab', 'profile');
        }
    }

    public function changePassword(Request $data) {
        $error = null;

        $validator = Validator::make(
            $data->input(),
            [
                'new_password'=> ['required', 'string', 'min:8'],
                'confirm_password'=> ['required', 'string', 'min:8']
            ]
        );
        if ($validator->fails()) {
            $error = ['new_pass' => 'La password non rispetta il formato, controlla che la lunghezza sia almeno di 8 caratteri'];
        }

        $user = Auth::user(); // current user
        if (!Hash::check($data->input('old_password'), $user->password)) {
            $error = ['old_pass' => 'La password attuale non coincide'];
        }
        if ($data->input('confirm_password') != $data->input('new_password')) {
            $error = ['new_pass' => 'Le due password non coincidono'];
        }

        if ($error != null) {
            return Redirect::route('dashboard')
                ->with('tab', 'password')
                ->withErrors($error)
                ->withInput();
        }

        $user->password = Hash::make($data->input('new_password'));
        $user->save();

        return Redirect::route('dashboard')
            ->with('tab', 'password')
            ->with('successPassword','Password cambiata con successo');
    }
}
