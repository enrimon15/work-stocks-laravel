<?php

namespace App\Http\Controllers;

use App\Models\JobOffer;
use Conner\Tagging\Model\Tag;
use Conner\Tagging\Model\TagGroup;

class JobController extends Controller
{
    public function __construct() {

    }

    public function jobCatalog() {
        //Retrieve Most popular tags
//        $mostUsedTags = DB::table('tags')
//            ->join('taggables', 'tags.id', '=', 'taggables.tag_id')
//            ->select('tags.id','tags.name',DB::raw('count(*) as occ'))
//            ->where('tags.type' , '=', 'skill')
//            ->groupBy('tags.id', 'tags.name')
//            ->orderBy('occ', 'desc')
//            ->limit(5)
//            ->get();
//
//        $tags = array();
//
//        foreach ($mostUsedTags as $tg) {
//            //$tags[] = Tag::findOrCreate(substr($tg->name,7,(strlen($tg->name)-2)));
//            $tags = 1;
//        }


        $tagGroup = TagGroup::where('slug','=','skill')->first();

        $tags = null;
        if($tagGroup) {
            $tags = Tag::where('tag_group_id', '=', $tagGroup->getAttribute('id'))
                ->orderBy('count','desc')
                ->limit(5)
                ->get();
        }



        return view('jobs/job-search')
            ->with('tags', $tags)
            ->with('jobs', JobOffer::paginate(10));
    }
}
