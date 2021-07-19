<?php

namespace App\Http\Controllers;

use App\Jobs\ApplicationSendEmailJob;
use App\Mail\ApplicationMailCompany;
use App\Mail\ApplicationMailForSubscriber;
use App\Models\Application;
use App\Models\FavoriteJob;
use App\Models\Filters\FilterJobOfferExperienceYears;
use App\Models\Filters\FilterJobOfferLocation;
use App\Models\Filters\FilterJobOfferSalary;
use App\Models\Filters\FilterJobOfferSkills;
use App\Models\Filters\FilterSubscriberLocation;
use App\Models\Filters\FilterSubscriberNameSurname;
use App\Models\Filters\FilterSubscriberSalary;
use App\Models\Filters\FilterSubscriberSkills;
use App\Models\JobOffer;
use App\Models\Login;
use App\Models\User;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SubscriberController extends Controller
{
    public function subscribersCatalog(Request $request)
    {
        try {
            $subscribers = QueryBuilder::for(User::class)
                ->join('user_roles', 'user_roles.user_id', '=', 'users.id')
                ->where('user_roles.role_id', '=', 3)
                ->allowedFilters(['profile.job_title',/*
                'experience',
                'company.name',*/
                    AllowedFilter::custom('name_surname', new FilterSubscriberNameSurname()),
                    AllowedFilter::custom('location',new FilterSubscriberLocation()),
                    AllowedFilter::custom('salary',new FilterSubscriberSalary()),
                    AllowedFilter::custom('skill',new FilterSubscriberSkills())])
                ->paginate(10);

            if ($request->ajax()) {
                return view('subscriber.subscribers-search-data')
                    ->with('subscribers', $subscribers)
                    ->render();
            } else {
                return view('subscriber.subscribers-search')
                    ->with('subscribers', $subscribers);
            }
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function apply(Request $request, $idJobOffer)
    {
        try {
            if (!$request->ajax()) {
                return redirect()->route('subscribers/getAll');
            } else {
                $idSubscriber = Auth::id();

                if ($idSubscriber == null) {
                    return $this->abort("Redirect", 308);
                }

                $subscriber = User::findOrFail($idSubscriber);
                $jobOffer = JobOffer::findOrFail($idJobOffer);

                if ($subscriber === null || $jobOffer === null) {
                    return $this->abort('Subscriber o offerta non trovata', 500);
                }

                if ($jobOffer->due_date < Carbon::today()) {
                    return $this->abort('Offerta scaduta', 405);
                }

                $application = Application::where('id_subscriber', '=', $subscriber->id)
                    ->where('id_job_offer', '=', $jobOffer->id)
                    ->first();


                if ($application === null) {
                    $subscriber->applications()->attach($jobOffer->id);


                    $details = [
                        'name' => $subscriber->name,
                        'surname' => $subscriber->surname,
                        'jobOfferName' => $jobOffer->title,
                        'companyName' => $jobOffer->company->name,
                        'subscriberEmail' => $subscriber->email,
                        'companyEmail' => $jobOffer->company->user->email,
                        'emailType' => 'sendApplication'
                    ];

                    //JOB
                    ApplicationSendEmailJob::dispatch($details);
                    return response(json_encode(['body' => __('jobs/jobs.successSentApplication')]), 200);
                }

                return $this->abort('Already Applied', 500);
            }
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function favoriteExecute($idJobOffer) {
        try {
            $user = Auth::user();

            if($user == null) {
                return $this->abort("Redirect",308);
            }

            $jobOffer = JobOffer::findOrFail($idJobOffer);

            if($jobOffer->due_date < Carbon::today()) {
                return $this->abort('Offerta scaduta',405);
            }

            $favorite = FavoriteJob::where('user_id', '=', $user->id)
                ->where('job_offer_id', '=', $jobOffer->id)
                ->first();


            if ($favorite === null) {
                $user->favoriteJobs()->attach($jobOffer->id);
                return back()->with('success', __('jobs/jobs.successFavorite'));
            }

            return $this->abort('Already put in favorites',500);


        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function getById($id) {
        try {
            $user = User::findOrFail($id);

            if ($user == null || $user->role_id != 3) {
                return redirect()->route('subscribers/getAll');
            }

            return view('subscriber.subscriber-detail')->with('subscriber', $user);
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function downloadCV($id) {
        try {
            $user = User::findOrFail($id);

            if ($user->profile != null && $user->profile->cv_path != null) {
                return Storage::disk('public')->download($user->profile->cv_path);
            } else {
                abort(404, 'not found');
            }
        } catch (\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    private function abort($description, $errorCode) {
        abort($errorCode, $description);
    }

    public static function getLastLoginInDays($user)
    {
        $now = Carbon::now();
        $lastLogin = null;

        $days = null;

        try {
            $lastLogin= Login::where('user_id', '=', $user->id)
                ->orderBy('created_at', 'desc')
                ->firstOrFail();

            $last = Carbon::parse($lastLogin->created_at);

            $days = $now->diffInDays($last);
        } catch(ModelNotFoundException $e){
            $days = __('subcribers/subscribersList.noLastLogin');
            return $days;
        }

        if($days > 0) {
            $days = trans_choice('subcribers/subscribersList.daysLastLogin',$days,['giorni'=> $days]);
        } else {
            $days = __('subcribers/subscribersList.todayLastLogin');
        }
        return $days;
    }

    public static function progressPercentage($startDate, $endDate) {
        try {
            $beginDate = Carbon::parse($startDate);
            $dueDate = Carbon::parse($endDate);
            $today = Carbon::now();

            $totalDays = $dueDate->diffInDays($beginDate);
            $atTodayDays = $today->diffInDays($beginDate);

            return (100 * $atTodayDays)/$totalDays;
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }
}
