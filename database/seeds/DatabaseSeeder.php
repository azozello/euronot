<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Language::class);
         $this->call(post::class);
        $this->call(Subscription::class);
        $this->call(TextBlocks::class);
    }
}
