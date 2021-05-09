<?php

namespace App\Http\Controllers;

use App\Models\Filters\FilterJobOfferExperienceYears;
use App\Models\Filters\FilterJobOfferLocation;
use App\Models\Filters\FilterJobOfferSalary;
use App\Models\Filters\FilterJobOfferSkills;
use App\Models\User;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SubscriberController extends Controller
{
    public function subscribersCatalog(Request $request) {
        $subscribers = QueryBuilder::for(User::class)
            ->where('role_id', '=',3)
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
                ->with('subscribers',$subscribers)
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
}
