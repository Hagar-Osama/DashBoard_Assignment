<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(10)->create();
        \App\Models\Service::factory(20)->create();
        \App\Models\Team::factory(3)->create();
        \App\Models\profile::factory(10)->create();
        \App\Models\Portfolio::factory(10)->create();
        \App\Models\About::factory(2)->create();
        \App\Models\Slider::factory(3)->create();
        \App\Models\Client::factory(6)->create();
        \App\Models\Brand::factory(3)->create();
        \App\Models\Client::factory(10)->create();





        $this->call([
           PageSeeder::class,
           // TeamSeeder::class
        ]);
    }
}
