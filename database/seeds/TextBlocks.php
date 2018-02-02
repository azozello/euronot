<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextBlocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('text_blocks')->insert([
            [
                'text_block_name'=>"Тестовый блок 1",
                'text_block_id'=>"1",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ru.png",
                'language'=>"1",
            ],
            [
                'text_block_name'=>"Тестовый блок 1",
                'text_block_id'=>"1",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ua.png",
                'language'=>"2",
            ],
            [
                'text_block_name'=>"Тестовый блок 2",
                'text_block_id'=>"2",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ru.png",
                'language'=>"1",
            ],
            [
                'text_block_name'=>"Тестовый блок 2",
                'text_block_id'=>"2",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ua.png",
                'language'=>"2",
            ],
            [
                'text_block_name'=>"Тестовый блок 3",
                'text_block_id'=>"3",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ru.png",
                'language'=>"1",
            ],
            [
                'text_block_name'=>"Тестовый блок 3",
                'text_block_id'=>"3",
                'title' => "title",
                'text'=>"text",
                'image' => "images/flags/ua.png",
                'language'=>"2",
            ],
        ]);
    }
}
