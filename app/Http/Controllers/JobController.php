<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function __construct() {

    }

    public function jobCatalog() {
        return view('jobs/job-search');
    }
}
