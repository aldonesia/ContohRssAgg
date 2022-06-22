<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rss;

class RssSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rss::create([
            'name' => 'The Apology Line',
            'url' => "https://rss.art19.com/apology-line"
        ]);
    }
}
