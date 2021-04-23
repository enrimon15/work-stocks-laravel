<?php

namespace Database\Seeders;

use App\Models\JobOffer;
use Conner\Tagging\Model\Tag;
use Illuminate\Database\Seeder;

//use Spatie\Tags\Tag;

class TagExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        JobOffer::create([
//            'title'=>'Offertina'
//        ]);
//
//        JobOffer::create([
//            'title'=>'Offertona',
//            ''
//        ]);

        $job = JobOffer::findOrFail(1);
       // $job2 = JobOffer::where('title','Offertona')->firstOrFail();

//        $tag1 = Tag::create
//        $tag2 = Tag::findOrCreate('JSE','skill');
        $job->tag('JakartaEE');
        $job->tag('JakartaEE2');
        $job->tag('JakartaEE3');
        $job->tag('JakartaEE4');
        $job->tag('JakartaEE5');
        $job->tag('JakartaEE6');

        $tag = Tag::findOrFail(1);
        $tag2 = Tag::findOrFail(2);
        $tag3 = Tag::findOrFail(3);
        $tag4 = Tag::findOrFail(4);
        $tag5 = Tag::findOrFail(5);
        $tag6 = Tag::findOrFail(6);
        $tag->setGroup('skill');
        $tag2->setGroup('skill');
        $tag3->setGroup('skill');
        $tag4->setGroup('skill');
        $tag5->setGroup('skill');
        $tag6->setGroup('skill');
        //$job2->tag('paperino');
    }
}
