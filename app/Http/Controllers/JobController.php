<?php

namespace App\Http\Controllers;

use App\Models\Filters\FilterJobOfferExperienceYears;
use App\Models\Filters\FilterJobOfferLocation;
use App\Models\Filters\FilterJobOfferSalary;
use App\Models\Filters\FilterJobOfferSkills;
use App\Models\JobOffer;
use Carbon\Carbon;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class JobController extends Controller
{
    public function __construct()
    {

    }

    public function jobCatalog(Request $request)
    {
        $jobs = QueryBuilder::for(JobOffer::class)
            ->where('due_date', '>=', Carbon::today())
            ->allowedFilters(['title',
                            'experience',
                            'company.name',
                            'offers_type',
                            AllowedFilter::custom('location',new FilterJobOfferLocation),
                            AllowedFilter::custom('experience',new FilterJobOfferExperienceYears),
                            AllowedFilter::custom('salary', new FilterJobOfferSalary),
                            AllowedFilter::custom('skill',new FilterJobOfferSkills)])
            ->paginate(10);

        if ($request->ajax()) {
            return view('jobs.job-search-data')
                ->with('jobs',$jobs)
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

            return view('jobs/job-search')
                ->with('tags', $tags)
                ->with('jobs', $jobs/*JobOffer::paginate(10)*/);
        }
    }

    public function getById($id)
    {

        try {
            $job = JobOffer::findOrFail($id);
            return view('jobs.job-details')
                ->with('job', $job);
        } catch (ModelNotFoundException $ex) {
            return redirect()->route('jobs/getAll');
        }


    }
}
