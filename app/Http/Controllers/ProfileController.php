<?php

namespace App\Http\Controllers;

use App\Mail\ContactUser;
use App\Models\Company;
use App\Models\JobOffer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index($type, $id) {
        try {
            if ($type == 'user') {
                $user = User::findOrFail($id);
                return view('subscriber.candidate-details')->with('user', $user);
            } else if ($type == 'company') {
                $company = Company::findOrFail($id);
                $latestJobOffers = JobOffer::where('company_id', '=', $id)
                    ->where('due_date', '>=', Carbon::today())
                    ->orderBy('created_at', 'desc')->limit(4);

                return view('company.company-details')->with('company', $company)->with('latestJobs', $latestJobOffers->get());
            }

            abort(404, 'not found');
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function downloadCv($idUser) {
        try {
            $user = User::findOrFail($idUser);
            if (!$user->hasRole('user')) {
                abort(401, 'unauthorized');
            }
            return Storage::disk('public')->download($user->profile->cv_path);
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function sendMail(Request $request, $idRecipient) {
        try {
            $data = $request->validate([
                'message' => ['required', 'string'],
                'idUser' => ['required', 'numeric']
            ]);

            $data['user'] = User::findOrFail($data['idUser']);

            $userTo = User::findOrFail($idRecipient);

            Mail::to($userTo->email)->send(new ContactUser($data));

            return back()->with('success', __('profile/userProfile.mailSuccess'));
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

}
