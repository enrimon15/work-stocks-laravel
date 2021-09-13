<?php

namespace App\Http\Middleware;

use App\Models\Footer;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class Localization
{


    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $languagesAllowed = ['it', 'en'];

        $inputLang = $request->query->get('language');

        if ($inputLang != '' && in_array($inputLang, $languagesAllowed)) {
            App::setLocale($inputLang);
            Session::put('language', $inputLang);
            Carbon::setLocale($inputLang);
        } else if (Session::has('language')) {
            App::setLocale(Session::get('language'));
            Carbon::setLocale(Session::get('language'));
        }

        // footer
        \Cache::rememberForever('footer', function () {return Footer::first();});

        return $next($request);
    }


}
