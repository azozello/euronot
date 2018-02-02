<?php

namespace App\Helpers\Facades;


class StringAction
{
     public static function html_img_to_php_tag($html_page){
         $page = $html_page;
         preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $page, $media);
         unset($page);
         $page = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
         foreach ($page as $text) {
             $html_page = str_replace($text, '<?php echo $message->embed(\'' . public_path() . $text . '\'); ?>', $html_page);
         }
         dd($html_page);
         return $html_page;
     }
}