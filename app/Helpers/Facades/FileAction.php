<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2017
 * Time: 14:18
 */

namespace App\Helpers\Facades;


class FileAction
{
    public static function upload_one_file($files,$public_folder_name){
        $name = '';
        foreach ($files as $f) {
            if ($f->move(public_path($public_folder_name), $f->getClientOriginalName())) {
                $name = $f->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
        }
        return $name;
    }
}