<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index() {
        try {

        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }
}
