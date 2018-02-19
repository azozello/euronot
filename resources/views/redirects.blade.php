<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles_light')
<!-- Main navbar -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Перенаправление</span></h4>
			</div>

			<form method="get" action="{{route('new_redirect')}}" enctype="multipart/form-data" style="text-align: right;">
				<button type="submit" class="btn bg-teal-400 page-header-btn-right" >Добавить перенаправление</button>
			</form>
		</div>

	</div>
	<!-- Content area -->
	<div class="content">
		@if($errors->any())
			<div class="alert alert-danger">
				<strong>{{$errors->first()}}</strong>
			</div>
	@endif
	<!-- Detached content -->
		<div class="container-detached">
			<div class="content-detached">


				<div class="row">
					@foreach($blocks as $k=>$block)

						<div class="panel" style="margin: 20px 0 0 0;">

							<form method="post" action="{{route('update_redirect')}}" enctype="multipart/form-data" class="form-inline">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input name="id" type="hidden" value="{{$block->id}}">
								<div class="form-group" style="margin: 10px 20px;">
									<label for="email">Старый URL</label>
									<input type="text" name="old_url" value="{{$block->old_url}}" class="form-control" id="old_url" placeholder="url" style="width: 400px;">
								</div>
								<div class="form-group" style="margin: 10px 20px;">
									<label for="pass">Новый URL</label>
									<input type="text" name="new_url" value="{{$block->new_url}}" class="form-control" id="new_url" placeholder="url" style="width: 400px;">
								</div>
								<button type="submit" class="btn btn-success" style="margin: 10px 20px;">Обновить</button>
							</form>
						</div>


				</div>

				<div class="row">
					<div id="detail1" style="display: none;">{{$num++}}}</div>
					@if($num>1)
				</div>
			</div>
			<div id="detail1" style="display: none;">{{$num = 0}}}</div>
			<div class="row">
				@endif
				@endforeach
			</div>
			{{$blocks->links()}}
			
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
