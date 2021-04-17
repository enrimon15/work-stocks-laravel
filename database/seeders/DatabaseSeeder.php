<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creazione admin
        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.it',
            'password' => Hash::make('admin')
        ]);

        // Creazione ruolo azienda
        Role::create([
            'name' => 'company',
            'display_name' => 'Azienda'
        ]);
    }
}
