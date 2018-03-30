<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles')

	<!-- Main navbar -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Список страниц</span></h4>
			</div>
		</div>

	</div>


				<!-- Content area -->
				<div class="content">
					<form role="form" method="get" action="{{ route('search_page') }}" enctype="multipart/form-data">
						<div class="form-group">
							<label  for="pass">Название страницы</label>
							<input type="text" name="name" class="form-control" id="name_search" placeholder="">
						</div>
						<button type="submit" class="btn btn-success">Поиск</button>
					</form>

					<h6 class="content-group text-semibold">
						Список страниц
						<small class="display-block">Список страниц</small>
					</h6>
					<div class="row">
						@if(isset($pages))
					@foreach($pages as $page)

								<div class="col-md-4">
									<div class="panel panel-flat">
										<div style="display: inline-block;" class="panel-heading">

											<p><a href="admin/article/{{$page->url}}"><h6 class="panel-title text-semibold">{{$page->page_name}}</h6></a></p>

										</div>
										<div class="line"></div>

										<div class="row">
											<div class="panel-body">
												{{$page->created_at}}
											</div>
											<div class="navbar-button">
												<div class="navbar-edit">
													<form role="form" method="get" action="{{ route('edit_page_show') }}" enctype="multipart/form-data">
														{{ csrf_field() }}
														<div class="form-group">
															<input type="hidden" name="id" class="form-control" id="id" value="{{$page->id}}">
															<input type="hidden" name="page_id" class="form-control" id="page_id" value="{{$page->page_id}}">
															<input type="hidden" name="page_language" class="form-control" id="page_id" value="{{$page->page_id}}">
														</div>
														<button type="submit" class="btn btn-success">Редактировать</button>
													</form>
												</div>
												<div  class="navbar-trash">
													<form role="form" method="post" action="{{ route('delete_page') }}" enctype="multipart/form-data">
														{{ csrf_field() }}
														<div class="form-group">
															<input type="hidden" name="id" class="form-control" id="id" value="{{$page->id}}">
														</div>
														<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
													</form>
												</div>
											</div>
										</div>
									</div>

								</div>
							<div id="detail1" style="display: none;">{{$num++}}}</div>
						@if($num > 2)
						</div>
					     <div class="row">
							 <div id="detail1" style="display: none;">{{$num = 0}}}</div>
					    @endif
						@endforeach
						</div>
				{{$pages->links()}}
					@endif
						<!-- /panel heading options --

					<!-- Footer -->
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
