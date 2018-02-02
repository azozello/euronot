<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class post extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            [
                'name'=>"admin",
                'phone_number'=>"12123123",
                'email'=>"admin@gmail.com",
                'comment'=>"admin",
                'date' => "2008-11-11"
            ],
            [
                'name'=>"adn",
                'phone_number'=>"12123",
                'email'=>"adin@gmail.com",
                'comment'=>"admn",
                'date' => "2008-11-11"
            ]
        ]
        );
    }
}
