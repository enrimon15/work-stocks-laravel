<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DashboardCommonController extends Controller
{

    public function index() {

    }

    public function showChangePassword() {
        return view('dashboard-common.change-password');
    }

    public function changePassword(Request $data) {
        $error = null;

        $data->validate([
            'new_password'=> ['required', 'string', 'min:8'],
            'confirm_password'=> ['required', 'string', 'min:8']
        ]);

        $user = Auth::user(); // current user
        if (!Hash::check($data->input('old_password'), $user->password)) {
            $error = ['old_pass' => __('dashboard/user/changePassword.errorCurrentPassword')];
        }
        if ($data->input('confirm_password') != $data->input('new_password')) {
            $error = ['confirm_password' => __('dashboard/user/changePassword.errorConfirmPassword')];
        }

        if ($error != null) {
            return Redirect::back()
                ->withErrors($error)
                ->withInput();
        }

        $user->password = Hash::make($data->input('new_password'));
        $user->save();

        return Redirect::back()->with('success', __('dashboard/user/changePassword.success'));
    }
}
