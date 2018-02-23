<?php

namespace App\Http\Controllers;

use App\AboutCompany;
use App\ObjectImages;
use App\Objects;
use App\SiteMap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Texts;
use App\PagesNews;
use App\News;
use App\TextBlocks;
use App\Organization;
use App\DefaultMetaTags;
use Illuminate\Support\Facades\Redirect;
use App\Languages;
use Translit;
use Image;
use File;
use DB;
use AppliedMethods;
use SessionVariables;

class EditorController extends Controller
{
    public function show_editor()
    {
        SessionVariables::set_session_variable('floder','pages_images');
        $number = AppliedMethods::set_number_model('PagesNews','page_id');
        $languages = Languages::where('active', '=', 1)->get();
        return view('editor_ckeditor', [
            'languages' => $languages,
            'number' => $number
        ]);
    }

    public function add_text(Request $request)
    {
        //  dd(URL::base());
        $text = new Texts();
        $text->url = $request->url;
        $text->text = $request->editor1;
        $text->save();
        $texts = Texts::all();
        return view('texts', [
            'request' => $texts
        ]);
    }

    public function choosen_texts($url)
    {
        $text = Texts::where('url', $url)->get();
        //dd($url);
        return view('request_editor', [
            'text' => $text[0]->text
        ]);
    }

    public function add_page(Request $request)
    {
        $title = NULL;
        $description = NULL;
        foreach ($request->editor as $k=>$editor) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            if (is_null($request->editor[$k])) {
                return Redirect::back()->withErrors(['Введите текст страницы']);
            }
            if (is_null($request->description[$k])) {
                $description = DefaultMetaTags::where('type', '=', 'pages')->value('description');
                if (is_null($description)) {
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if (is_null($request->title[$k])) {
                $title = DefaultMetaTags::where('type', '=', 'pages')->value('title');
                if (is_null($title)) {
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }

            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            //dd(empty($url));
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }

            if (!count(PagesNews::where('page_url', $url)->get()) == 0) {
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }

            $data = new PagesNews();
            $data->page_id = $request->number;
            $data->page_lang = $request->page_lang[$k];
            $data->page_name = $request->name[$k];
            $data->page_title = $title;
            $data->page_text = $request->editor[$k];
            $data->page_url = $url;
            $data->page_description = $description;
            $data->save();
        }

//блок sitemap
        $pages = PagesNews::get();
        $update_time = SiteMap::get();
        if (count($update_time) == 0) {
            $time = 0;
        } else {
            $time = $update_time[0]->update_time;
        }
        File::put(base_path() . '/sitemap1.xml',
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>

		<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n"
        );
        foreach ($pages as $page) {
            File::append(base_path() . '/sitemap1.xml',
                "<url>
	<loc>http://panel/article/$page->url</loc>
	<lastmod>$time</lastmod>
</url>\n"
            );
        }
        File::append(base_path() . '/sitemap1.xml', "</urlset>");
//конец блока
        return \redirect()->route('pages_list');
    }

    public function edit_page_show(Request $request)
    {
        SessionVariables::set_session_variable('floder','pages_images');
        Session::put('id', $request->page_id);
        $pages = DB::table('pages_news')->
        where('page_id', $request->page_id)->
        join('languages', 'pages_news.page_lang', '=', 'languages.id')->
        where(['languages.active' => 1])->
        get();

        //dd($pages);
        return view('editor_ckeditor_edit', [
            'pages' => $pages,
        ]);
    }

    public function edit_page(Request $request)
    {
        $title = NULL;
        $description = NULL;
        foreach ($request->editor as $k => $editor) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            if (is_null($request->editor[$k])) {
                return Redirect::back()->withErrors(['Введите текст страницы']);
            }
            //dd($request);
            if (is_null($request->description[$k])) {
                $description = DefaultMetaTags::where('type', '=', 'pages')->value('description');
                if (is_null($description)) {
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if (is_null($request->title[$k])) {
                $title = DefaultMetaTags::where('type', '=', 'pages')->value('title');
                if (is_null($title)) {
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }

            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            //dd(empty($url));
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name);
            }

            $urls_count = PagesNews::where('page_url', $url)->get();
            if (count($urls_count) > 1 && $urls_count[0]->url != $request->url) {
                //dd($request);
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
            PagesNews::where('page_lang', $request->page_lang[$k])->where('page_id', $request->page_id)->update([
                'page_url' => $url,
                'page_name' => $request->name[$k],
                'page_text' => $request->editor[$k],
                'page_title' => $title,
                'page_description' => $description
            ]);
        }
        return \redirect()->route('pages_list');
    }

    public function edit_news_show(Request $request)
    {
        SessionVariables::set_session_variable('floder','news_images');

        $news = DB::table('news')->
        where('page_id', $request->page_id)->
        join('languages', 'news.page_lang', '=', 'languages.id')->
        get();

        return view('edit_news_show', [
            'news' => $news
        ]);
    }

    public function edit_news(Request $request)
    {
        $description = NULL;
        $title = NULL;
        foreach ($request->editor as $k => $editor) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            if (is_null($request->editor[$k])) {
                return Redirect::back()->withErrors(['Введите текст страницы']);
            }
            if (is_null($request->description[$k])) {
                $description = DefaultMetaTags::where('type', '=', 'pages')->value('description');
                if (is_null($description)) {
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if (is_null($request->title[$k])) {
                $title = DefaultMetaTags::where('type', '=', 'pages')->value('title');
                if (is_null($title)) {
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            if (is_null($request->tags[$k])) {
                $request->tags[$k] = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            $urls_count = News::where('url', $url)->get();
            if (count($urls_count) > 1 && $urls_count[0]->url != $request->url) {
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
            $data = $request->editor[$k]; // HTML страница, например полученная при помощи file_get_content():
            preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
            unset($data);
            $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
            if (empty($data)) {
                $data = ' ';
            }
            News::where('page_lang', '=', $request->page_lang[$k])->where('page_id', '=', $request->page_id)->update([
                'name' => $request->name[$k],
                'title' => $title,
                'text' => $request->editor[$k],
                'url' => $url,
                'description' => $description,
                'image' => $data[0],
                'tags' => $request->tags[$k]
            ]);
        }
        return \redirect()->route('show_news');
    }

    public function delete_page(Request $request)
    {
        PagesNews::where('id', '=', $request->id)->delete();
        return \redirect()->back();
    }

    public function add_news(Request $request)
    {
        $description = NULL;
        $title = NULL;
        foreach ($request->editor as $k => $editor) {
            if (is_null($request->name[$k])) {
                return Redirect::back()->withErrors(['Введите название страницы']);
            }
            if (is_null($request->editor[$k])) {
                return Redirect::back()->withErrors(['Введите текст страницы']);
            }
            if (is_null($request->description[$k])) {
                $description = DefaultMetaTags::where('type', '=', 'pages')->value('description');
                if (is_null($description)) {
                    $description = '';
                }
            }
            else{
                $description = $request->description[$k];
            }
            if (is_null($request->title[$k])) {
                $title = DefaultMetaTags::where('type', '=', 'pages')->value('title');
                if (is_null($title)) {
                    $title = '';
                }
            }
            else{
                $title = $request->title[$k];
            }
            $tags = $request->tags[$k];
            if (is_null($tags)) {
                $tags = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            $url = $request->url[$k];
            $url = Translit::translit_lower_with_underlining($url);
            //dd(empty($url));
            if (empty($url)) {
                $url = Translit::translit_lower_with_underlining($request->name[$k]);
            }
            //dd($request->name);
            if (!count(News::where('url', $url)->get()) == 0) {
                return Redirect::back()->withErrors(['Такой url уже занят']);
            }
            $data = $request->editor[$k]; // HTML страница, например полученная при помощи file_get_content():
            preg_match_all('/(img|src)=("|\')[^"\'>]+/i', $data, $media);
            unset($data);
            $data = preg_replace('/(img|src)("|\'|="|=\')(.*)/i', "$3", $media[0]);
            if (empty($data)) {
                $data = ' ';
            }
            $img = $data[0];
            //dd($url);
            $data = new News();
            $data->name = $request->name[$k];
            $data->title = $title;
            $data->text = $request->editor[$k];
            $data->url = $url;
            $data->page_id = $request->number;
            $data->description = $description;
            $data->image = $img;
            $data->tags = $tags;
            $data->page_lang = $request->page_lang[$k];
            $data->date = date("Y-m-d");
            $data->save();
        }
        //блок sitemap
        $pages = News::get();
        $update_time = SiteMap::get();
        if (count($update_time) == 0) {
            $time = 0;
        } else {
            $time = $update_time[0]->update_time;
        }
        File::put(base_path() . '/sitemap2.xml',
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>

		<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n"
        );
        foreach ($pages as $page) {
            File::append(base_path() . '/sitemap2.xml',
                "<url>
	<loc>http://panel/news/$page->url</loc>
	<lastmod>$time</lastmod>
</url>\n"
            );
        }
        File::append(base_path() . '/sitemap2.xml', "</urlset>");
//конец блока

        return \redirect()->route('show_news');
    }

    public function delete_news(Request $request)
    {
        News::where('id', '=', $request->id)->delete();
        return \redirect()->back();
    }

    public function upload_organization(Request $request)
    {
        Organization::truncate();
        $data = new Organization();
        $data->name = $request->name;
        $data->street_address = $request->street_address;
        $data->postal_code = $request->postal_code;
        $data->address_locality = $request->address_locality;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->fax_number = $request->fax_number;
        $data->url = $request->url;
        $data->save();

        return \redirect()->back();
    }

    public function text_blocks_update(Request $request)
    {
        foreach ($request->file() as $f) {
            if ($f->move(public_path('image'), $f->getClientOriginalName())) {
                $name = $f->getClientOriginalName();
            } else {
                return 'Ошибка загрузки';
            }
            TextBlocks::where('id', '=', $request->id)->update([
                'image' => $name
            ]);
        }
        TextBlocks::where('id', '=', $request->id)->update([
            'title' => $request->title,
            'text' => $request->text
        ]);
        return redirect()->back();
    }

    public function object_new(Request $request)
    {
        if (is_null($request->name)) {
            return Redirect::back()->withErrors(['Введите название страницы']);
        }
        if (is_null($request->editor1)) {
            return Redirect::back()->withErrors(['Введите текст страницы']);
        }
        if (is_null($request->description)) {
            $request->description = DefaultMetaTags::where('type', '=', 'objects')->value('description');
            if (is_null($request->description)) {
                $request->description = '';
            }
        }
        if (is_null($request->title)) {
            $request->title = DefaultMetaTags::where('type', '=', 'objects')->value('title');
            if (is_null($request->title)) {
                $request->title = '';
            }
        }

        $url = $request->url;
        $url = Translit::translit_lower_with_underlining($url);
        //dd(empty($url));
        if (empty($url)) {
            $url = Translit::translit_lower_with_underlining($request->name);
        }

        if (!count(Objects::where('url', $url)->get()) == 0) {
            return Redirect::back()->withErrors(['Такой url уже занят']);
        }
        $object = Objects::orderBy('id', 'desc')->first();
        //dd($pages->page_id);
        if (is_null($object)) {
            $number = 1;
        } else {
            $number = ($object->object_id) + 1;
        }
        $data = new Objects();
        $data->name = $request->name;
        $data->title = $request->title;
        $data->object_id = $number;
        $data->text = $request->editor1;
        $data->url = $url;
        $data->description = $request->description;
        $data->save();

        foreach ($request->file() as $file) {
            foreach ($file as $f) {
                //dd($f);
                if (Image::make($f)
                    ->save(public_path('objects') . '/' . $f->getClientOriginalName())) {
                    $data = new ObjectImages();
                    $data->name = $f->getClientOriginalName();
                    $data->object_id = $number;
                    $data->save();
                } else {
                    return 'Ошибка загрузки';
                }
            }
        }

//блок sitemap
        $pages = Objects::get();
        $update_time = SiteMap::get();
        if (count($update_time) == 0) {
            $time = 0;
        } else {
            $time = $update_time[0]->update_time;
        }
        File::put(base_path() . '/sitemap1.xml',
            "<?xml version=\"1.0\" encoding=\"UTF-8\"?>

		<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">\n"
        );
        foreach ($pages as $page) {
            File::append(base_path() . '/sitemap1.xml',
                "<url>
	<loc>http://panel/article/$page->url</loc>
	<lastmod>$time</lastmod>
</url>\n"
            );
        }
        File::append(base_path() . '/sitemap1.xml', "</urlset>");
//конец блока
        return \redirect()->route('object_list');
    }

    public function delete_object(Request $request)
    {
        Objects::where('object_id', '=', $request->object_id)->delete();
        $objects = ObjectImages::where('object_id', '=', $request->object_id)->get();
        foreach ($objects as $object) {
            //dd(public_path('objects').'/'.$object->name);
            File::delete(public_path('objects') . '/' . $object->name);
        }
        ObjectImages::where('object_id', '=', $request->object_id)->delete();
        return \redirect()->back();
    }

    public function edit_object_show(Request $request)
    {
        $object = Objects::where('object_id', '=', $request->object_id)->get();
        $object_images = ObjectImages::where('object_id', '=', $request->object_id)->get();
        //dd($object_images);
        return view('object_editor_edit_vent', [
            'object' => $object,
            'object_images' => $object_images
        ]);
    }

    public function edit_object(Request $request)
    {
        //dd($request);
        if (is_null($request->name)) {
            return Redirect::back()->withErrors(['Введите название страницы']);
        }
        if (is_null($request->editor1)) {
            return Redirect::back()->withErrors(['Введите текст страницы']);
        }
        if (is_null($request->description)) {
            $request->description = DefaultMetaTags::where('type', '=', 'objects')->value('description');
            if (is_null($request->description)) {
                $request->description = '';
            }
        }
        if (is_null($request->title)) {
            $request->title = DefaultMetaTags::where('type', '=', 'objects')->value('title');
            if (is_null($request->title)) {
                $request->title = '';
            }
        }

        $url = $request->url;
        $url = Translit::translit_lower_with_underlining($url);
        //dd(empty($url));
        if (empty($url)) {
            $url = Translit::translit_lower_with_underlining($request->name);
        }

        $object = Objects::orderBy('id', 'desc')->first();
        //dd($pages->page_id);
        if (is_null($object)) {
            $number = 1;
        } else {
            $number = ($object->object_id) + 1;
        }
        Objects::where('object_id', '=', $request->object_id)->update([
            'name' => $request->name,
            'title' => $request->title,
            'text' => $request->editor1,
            'url' => $url,
            'description' => $request->description
        ]);
        if ($request->file != null) {
            $objects = ObjectImages::where('object_id', '=', $request->object_id)->get();
            foreach ($objects as $object) {
                //dd(public_path('objects').'/'.$object->name);
                File::delete(public_path('objects') . '/' . $object->name);
            }
            ObjectImages::where('object_id', '=', $request->object_id)->delete();
            foreach ($request->file() as $file) {
                foreach ($file as $f) {
                    if (Image::make($f)
                        ->save(public_path('objects') . '/' . $f->getClientOriginalName())) {
                        $data = new ObjectImages();
                        $data->name = $f->getClientOriginalName();
                        $data->object_id = $request->object_id;
                        $data->save();
                    } else {
                        return 'Ошибка загрузки';
                    }
                }
            }
        }
        return redirect()->route('object_list');
    }

    public function about_company_edit_show(Request $request)
    {
        $about = AboutCompany::get();
        return view('about_company', [
            'about_company' => $about,
        ]);
    }

    public function about_company_edit(Request $request)
    {
        AboutCompany::truncate();
        $data = new AboutCompany();
        $data->about_company_lang = 1;
        $data->about_company_text = $request->editor1;
        $data->about_company_name = $request->name;
        $data->about_company_url = $request->url;
        $data->about_company_description = $request->description;
        $data->about_company_title = $request->title;
        $data->save();
        return redirect()->back();
    }
}
