<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

@include('layouts.styles')
<body>
<div class="page-header page-header-default">
	<div class="page-header-content">
		<div class="page-title">
			<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Кеширование</span></h4>
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
	<div class="cache">
		<h6 class="content-group text-semibold">
			Кеширование
		</h6>


		<form method="post" action="{{route('cache_on')}}" enctype="multipart/form-data" class="form-inline">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-success green">Включить кэш</button>
		</form>
		<form method="post" action="{{route('cache_off')}}" enctype="multipart/form-data" class="form-inline">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-success red">Выключить кэш</button>
		</form>
		<form method="post" action="{{route('cache_clean')}}" enctype="multipart/form-data" class="form-inline">
			<input name="_token" type="hidden" value="{{ csrf_token() }}">
			<button type="submit" class="btn btn-success orange btn-clear-cache">Очистить кэш</button>
		</form>
		@if($condition == 0)
			<div class="show-cache"><span class="red">КЕШ Выключен</span>
				<div class="clear-cache"><span class="orange">КЕШ ОЧИЩЕН</span></div>
			</div>
		@endif

		@if($condition == 1)


			<div class="show-cache"><span class="green">КЕШ ВКЛЮЧЕН</span>
				<div class="clear-cache"><span class="orange">КЕШ ОЧИЩЕН</span></div>
			</div>
	@endif

	<!-- /footer -->

	</div>
	<!-- /content area -->

</div>
</div>
<!-- /main content -->

</div>
<!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
