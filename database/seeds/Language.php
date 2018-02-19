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
                'active'=>"1",
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
                'active'=>"1",
                'name_placeholder' => 'Введіть назву*',
                'url_placeholder' => 'Введіть URL*',
                'title_placeholder' => 'Введіть title*',
                'article_placeholder' => 'Введите article*' ,
                'description_placeholder' => 'Введіть description*',
                'upload_button_name' => 'Оновити'
            ],
            [
                'language_name'=>"English",
                'language_url' => "en",
                'sort'=>"3",
                'icon' => "images/flags/en.png",
                'active'=>"1",
                'name_placeholder' => 'Enter name*',
                'url_placeholder' => 'Enter URL*',
                'title_placeholder' => 'Enter title*',
                'article_placeholder' => 'Enter article*' ,
                'description_placeholder' => 'Enter description*',
                'upload_button_name' => 'Update'
            ],
            [
                'language_name'=>"English",
                'language_url' => "de",
                'sort'=>"4",
                'icon' => "images/flags/de.png",
                'active'=>"1",
                'name_placeholder' => 'Gib einen Titel ein*',
                'url_placeholder' => 'Geben Sie die URL*',
                'title_placeholder' => 'Geben Sie die title*',
                'article_placeholder' => 'Geben Sie die article*' ,
                'description_placeholder' => 'Geben Sie die description*',
                'upload_button_name' => 'Aktualisieren'
            ]
        ]);
    }
}



//