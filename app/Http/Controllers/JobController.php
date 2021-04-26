<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class JobController extends Controller
{
    public function __construct()
    {

    }

    public function jobCatalog(Request $request)
    {

        if ($request->ajax()) {
            $jobs = JobOffer::paginate(10);
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
                ->with('jobs', JobOffer::paginate(10));
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
