<?php

namespace Database\Seeders;

use App\Models\Home;
use App\Models\HomeComponent;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creazione home
        $home = Home::firstOrCreate([
            'banner_title_it' => 'Trova il lavoro adatto a te',
            'banner_title_en' => 'Find all jobs right for you',
            'banner_subtitle_it' => 'Trova lavoro, occupazione e le migliori opportunità di carriera nel mondo dell\'informatica',
            'banner_subtitle_en' => 'Find jobs, employment & best career opportunities in the IT world',
            'banner_img_path' => '/img/banner_home.jpeg',
            'show_search_bar' => true,
            'active' => true,
        ]);

        // Creazione Componenti Home
        $home->homeComponents()->createMany([
            [
                'component_title_it' => 'Aziende più Attive',
                'component_title_en' => 'Most Active Companies',
                'component_subtitle_it' => 'Cerca le aziende di tendenza',
                'component_subtitle_en' => 'Browse trending companies',
                'component_name' => 'pupular_companies',
                'active' => true
            ],
            [
                'component_name' => 'statistics_banner',
                'active' => true
            ],
            [
                'component_title_it' => 'Offerte Lavorative Popolari',
                'component_title_en' => 'Top Trending Jobs',
                'component_subtitle_it' => 'Cerca le offerte di lavoro più popolari',
                'component_subtitle_en' => 'Browse popular jobs',
                'component_name' => 'popular_jobs',
                'active' => true
            ],
            [
                'component_title_it' => 'Ultimi Aggiornamenti',
                'component_title_en' => 'Latest Updates',
                'component_subtitle_it' => 'Notizie recenti',
                'component_subtitle_en' => 'Top news',
                'component_name' => 'latest_news',
                'active' => true
            ]
        ]);
    }
}
