<?php

namespace App\Http\Controllers;

use App\Jobs\ApplicationSendEmailJob;
use App\Mail\ApplicationMailCompany;
use App\Mail\ApplicationMailForSubscriber;
use App\Models\Application;
use App\Models\Filters\FilterJobOfferExperienceYears;
use App\Models\Filters\FilterJobOfferLocation;
use App\Models\Filters\FilterJobOfferSalary;
use App\Models\Filters\FilterJobOfferSkills;
use App\Models\JobOffer;
use App\Models\User;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SubscriberController extends Controller
{
    public function subscribersCatalog(Request $request)
    {
        $subscribers = QueryBuilder::for(User::class)
            ->where('role_id', '=', 3)
            /*->allowedFilters(['title',
                'experience',
                'company.name',
                AllowedFilter::custom('location',new FilterJobOfferLocation),
                AllowedFilter::custom('experience',new FilterJobOfferExperienceYears),
                AllowedFilter::custom('salary', new FilterJobOfferSalary),
                AllowedFilter::custom('skill',new FilterJobOfferSkills)])*/
            ->paginate(10);

        if ($request->ajax()) {
            return view('subscribers.subscribers-search-data')
                ->with('subscribers', $subscribers)
                ->render();
        } else {

            $tagGroup = TagGroup::where('slug', '=', 'skill')->first();

            $tags = null;
            if ($tagGroup) {
                $tags = Tag::where('tag_group_id', '=', $tagGroup->getAttribute('id'))
                    ->orderBy('count', 'desc')
                    ->limit(5)
                    ->get();
            }

            return view('subscriber.subscribers-search')
                ->with('tags', $tags)
                ->with('subscribers', $subscribers);
        }


    }

    public function apply(Request $request, $idJobOffer)
    {
//        if (!$request->ajax()) {
//            return redirect()->route('subscribers/getAll');
//        } else {
            try {

                $idSubscriber = Auth::id();

                if($idSubscriber == null) {
                    return $this->abort("Redirect",308);
                }

                $subscriber = User::findOrFail($idSubscriber);
                $jobOffer = JobOffer::findOrFail($idJobOffer);

                if($subscriber === null || $jobOffer === null) {
                    return $this->abort('Subscriber o offerta non trovata',500);
                }

                if($jobOffer->due_date < Carbon::today()) {
                    return $this->abort('Offerta scaduta',405);
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
                        'companyEmail' => $jobOffer->company->user->email
                    ];

                    //JOB
                    ApplicationSendEmailJob::dispatch($details);
                    return response(json_encode(['body'=>'OK']), 200);
                }

                return $this->abort('Already Applied',500);


            } catch (ModelNotFoundException $e) {
                return redirect()->route('subscribers/getAll');
            }

       // }
    }

    private function abort($description, $errorCode) {
        return response($description,$errorCode);
    }
}
