<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($type, $id)
    {
        if ($type == 'user') {
            return view('subscriber.subscriber-details');
        } else if ( $type ==  'company') {
            return view('company.company-details');
        }
    }
}
