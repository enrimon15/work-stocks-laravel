<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Role::create([
            'name' => 'base_user',
            'display_name' => 'Utente Base'
        ]);

        Role::create([
            'name' => 'company',
            'display_name' => 'Azienda'
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Amministratore'
        ]);
    }
}
