<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.12.2017
 * Time: 22:29
 */

namespace App\Helpers\Facades;

class AppliedMethods
{
   public static function set_number_object($object,$number_field){
       if (is_null($object)) {
           $id = 1;
       } else {
           $id = (($object->$number_field) + 1);
       }
       return $id;
   }
    public static function set_number_model($model,$number_field){
        $model = 'App\\'.$model;
        $id = $model::orderBy('id', 'desc')->latest()->value($number_field);
        if(is_null($id)){
            $id = 1;
        }
        else{
           $id ++;
        }
        return $id;
    }
    public static function null_if_empty($data){
        if(count($data) == 0){
            $data = NULL;
        }
        return $data;
    }
    public static function null_if_not_isset($data){
        if(!isset($data)){
            $data = null;
        }
        return $data;
    }
    public static function zero_if_null($data){
        if(is_null($data)){
            $data = 0;
        }
        return $data;
    }
    public static function space_if_null($data){
        if($data == null){
            $data = ' ';
        }
        return $data;
    }
    public static function value_if_null($data,$value){
        if(is_null($data)){
            $data = $value;
        }
        return $data;
    }
    public static function get_key_array($array){
        if(is_null($array)){
            return null;
        }
        $keys = array();
        while ($value = current($array)) {
                $keys[] = key($array);
            next($array);
        }
        return $keys;
    }
}