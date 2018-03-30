<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Page</title>

    @include('layouts.styles')

    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Карта сайта</span></h4>
            </div>
            <form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="page-header-btn-right">
                    <button type="" class="btn bg-teal-400 ">Выход</button>
                </div>
            </form>
            <!--<div class="view_page"><button class="btn btn-primary" onclick="window.open('http://restoran-elit.com.ua/galereya')">Подивитись сторінку</button></div>
-->
        </div>
    </div>
    <div class="content">
        <!--< ?xml version="1.0" encoding="UTF-8"?> -->
        &lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
        <br>
        <!-- <urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"> -->
        &lt;urlset xmlns:xsi=&quot;http://www.w3.org/2001/XMLSchema-instance&quot; xmlns=&quot;http://www.sitemaps.org/schemas/sitemap/0.9&quot; xsi:schemaLocation=&quot;http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd&quot;&gt;
    @foreach($pages as $page)
        <!-- <url> -->
            <br>
            &lt;url&gt;
            <br>
        <!-- <loc>{{$page}}</loc> -->
            &lt;loc&gt;{{$page}}&lt;/loc&gt;
            <br>
            <!-- <lastmod>2017-09-28T17:20:16+01:00</lastmod> -->
            &lt;lastmod&gt;{{$update_time}}&lt;/lastmod&gt;
            <br>
            &lt;/url&gt;
            <!-- </url> -->
    @endforeach
    <!--</urlset> -->
        <br>
        &lt;/urlset&gt;


        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017.  by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
        </div>
        <!-- /footer -->

    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->

    </body>
</html>
