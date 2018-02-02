<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Language extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            [
                'language_name'=>"Русский",
                'language_url' => "ru",
                'sort'=>"2",
                'icon' => "images/flags/ru.png",
                'active'=>"0",
                'name_placeholder' => 'Введите название*',
                'url_placeholder' => 'Введите URL*',
                'title_placeholder' => 'Введите title*',
                'article_placeholder' => 'Введите article*' ,
                'description_placeholder' => 'Введите description*',
                'upload_button_name' => 'Обновить'
            ],
            [
                'language_name'=>"Українська",
                'language_url' => "ua",
                'sort'=>"1",
                'icon' => "images/flags/ua.png",
                'active'=>"0",
                'name_placeholder' => 'Введіть назву*',
                'url_placeholder' => 'Введіть URL*',
                'title_placeholder' => 'Введіть title*',
                'article_placeholder' => 'Введите article*' ,
                'description_placeholder' => 'Введіть description*',
                'upload_button_name' => 'Оновити'
            ]
        ]);
    }
}



//