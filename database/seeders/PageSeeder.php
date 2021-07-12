<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['home','services','portfolio','about','team','contact'];
        $status = ['on', 'off'];
        static $counter = 0;
        foreach($pages as $page) {
            $pageObject = new Page;
            $pageObject->name = ucfirst($page);
            $pageObject->link = $page;
            $pageObject->status = $status[array_rand($status)];
            $pageObject->order = $counter++;
            $pageObject->save();

        }
    }
}
