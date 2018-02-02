<?php

namespace App\Helpers\Facades;

use App\SiteMap as SiteMapModel;
use File;

class SiteMap
{
    const sitemap_text_begining = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
                          <urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n";
    const sitemap_text_ending = "</urlset>";

   public static function site_map_generate($model,$column_name,$url_str,$file_name){
       File::put(base_path().'/'.$file_name,self::sitemap_text_begining);
       self::writing_data(self::get_urls($model,$column_name,$url_str),self::get_updating_time(),$file_name);
       File::append(base_path().'/'.$file_name, self::sitemap_text_ending);
   }

    private static function get_urls($model,$column_name,$url_str){
        $model = 'App\\'.$model;
        $data = $model::where($column_name,'!=',NULL)->get();
        $urls = array();
        foreach ($data as $d){
            $urls[]=$url_str.$d->page_url;
        }
        return $urls;
    }
    private static function get_updating_time(){
        $update_time = SiteMapModel::get();
        if(count($update_time) == 0){
            $time = 0;
        }
        else {
            $time = $update_time[0]->update_time;
        }
        return $time;
    }
    private static function writing_data($urls,$time,$file_name){
        foreach ($urls as $u){
            File::append(base_path().'/'.$file_name,
                "<url>
	<loc>$u</loc>
	<lastmod>$time</lastmod>
</url>\n"
            );
        }
    }
}