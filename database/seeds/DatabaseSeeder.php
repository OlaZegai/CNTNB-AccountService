<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Factory(App\Utilisateur::class, 10)->create();

        App\Role::create([
            'nom' => 'Client'
        ]);

        App\Role::create([
            'nom'=>'Contracteur'
        ]);
    }
}
