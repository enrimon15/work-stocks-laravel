<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Tags\Tag;

class JobController extends Controller
{
    public function __construct() {

    }

    public function jobCatalog() {
        //Retrieve Most popular tags
        $mostUsedTags = DB::table('tags')
            ->join('taggables', 'tags.id', '=', 'taggables.tag_id')
            ->select('tags.id','tags.name',DB::raw('count(*) as occ'))
            ->where('tags.type' , '=', 'skill')
            ->groupBy('tags.id', 'tags.name')
            ->orderBy('occ', 'desc')
            ->limit(5)
            ->get();

        $tags = array();

        foreach ($mostUsedTags as $tg) {
            $tags[] = Tag::findOrCreate(substr($tg->name,7,(strlen($tg->name)-2)));
        }

        return view('jobs/job-search')->with('tags', $tags);
    }
}
