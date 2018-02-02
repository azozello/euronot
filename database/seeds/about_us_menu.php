<?php

use Illuminate\Database\Seeder;

class about_us_menu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('about_us_menu')->insert([
            [
                'page_name'=>'Новости',
                'page_url' => 'show_news_site',
                'is_active' => 1,
                'updated_at'=>NULL,
                'created_at'=>NULL
            ],
            [
                'page_name'=>'Отзывы',
                'page_url' => 'show_reviews',
                'is_active' => 1,
                'updated_at'=>NULL,
                'created_at'=>NULL
            ],
        ]);
    }
}
