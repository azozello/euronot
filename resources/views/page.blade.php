<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content={{$page[0]->description}}>

	<meta property="og:type" content="article">
	<meta property="og:title" content={{$page[0]->title}}>
	<meta property="og:url" content={{$page[0]->url}}>
	<meta property="og:description" name="description" content={{$page[0]->description}}>
	<meta property="og:image" content={{$page[0]->image}}>
	<title>{{$page[0]->title}}</title>
	<link rel="canonical" href="{{ URL::current() }}"/>

@include('layouts.styles')
<body>
<a href="{{route('setlocale', ['lang' => 'ru'])}}">Русский</a>
<a href="{{route('setlocale', ['lang' => 'ua'])}}">Українська</a>
				<div class="content">

					{!! $page[0]->text !!}
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
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
