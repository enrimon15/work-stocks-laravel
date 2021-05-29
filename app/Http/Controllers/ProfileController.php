<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobOffer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($type, $id)
    {
        if ($type == 'user') {
            $user = User::findOrFail($id);
            return view('subscriber.subscriber-details')->with('user', $user);
        } else if ( $type ==  'company') {
            $company = Company::findOrFail($id);
            $latestJobOffers = JobOffer::where('company_id', '=', $id)
                ->where('due_date', '>=', Carbon::today())
                ->orderBy('created_at', 'desc')->limit(4);

            return view('company.company-details')->with('company', $company)->with('latestJobs', $latestJobOffers->get());
        }
    }
}
