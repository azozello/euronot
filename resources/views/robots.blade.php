<!DOCTYPE html>
<html lang="en">
<head>
	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>

	@include('layouts.styles')

	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">robots.txt</span></h4>
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
		<form method="post" action="{{ route('robots_update') }}" enctype="multipart/form-data">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<textarea name="robots_text" id="editor1">
              @if(isset($robots[0]))
					{{$robots[0]->robots}}
				@endif
			</textarea>

			<button type="submit" class="btn bg-teal-400" style="margin-top: 20px;">Обновить</button>
		</form>
		<!-- Footer -->
		<script>
            var editor = CKEDITOR.replace( 'editor1' );
		</script>
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
	<style>
		.cke_top, .cke_bottom{
			display: none;
		}
	</style>
	</body>
</html>
