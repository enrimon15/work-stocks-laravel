<?php

namespace Database\Seeders;

use App\Models\JobOffer;
use Illuminate\Database\Seeder;
use Spatie\Tags\Tag;

class TagExample extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobOffer::create([
            'title'=>'Offertina'
        ]);

        JobOffer::create([
            'title'=>'Offertona'
        ]);

        $job = JobOffer::where('title','Offertina')->firstOrFail();
        $job2 = JobOffer::where('title','Offertona')->firstOrFail();

        $tag1 = Tag::findOrCreate('JEE','skill');
        $tag2 = Tag::findOrCreate('JSE','skill');
        $job->attachTag($tag2);
        $job2->attachTag($tag2);
    }
}
