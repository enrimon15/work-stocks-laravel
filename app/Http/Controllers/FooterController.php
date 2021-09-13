<?php

namespace App\Http\Controllers;

use App\Models\FooterMenuItem;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function index($id) {
        try {
            $foot = FooterMenuItem::find($id);
            return view('footer.footer-page')->with(['foot' => $foot]);
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }
}
