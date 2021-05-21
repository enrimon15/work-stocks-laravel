<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();
        if ($user->hasRole('user')) {
            return view('subscriber.subscriber-details');
        } else if ($user->hasRole('company')) {
            return view('company.company-details');
        }
    }
}
