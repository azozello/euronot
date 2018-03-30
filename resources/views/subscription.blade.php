<!DOCTYPE html>
<html lang="en">
<head>

	<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

@include('layouts.styles')

<!-- Main navbar -->
	<div class="page-header page-header-default">
		<div class="page-header-content">
			<div class="page-title">
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Подписки</span></h4>
			</div>
			<form role="form" method="get" action="{{ route('logout_out') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="page-header-btn-right">
					<button type="" class="btn bg-teal-400 ">Выход</button>
				</div>
			</form>
		</div>

	</div>


	<!-- Content area -->
	<div class="content">

		<!-- Task manager table -->
		<div class="col-md-12">
			<div class="panel panel-white">
				<table class="table tasks-list table-lg">
					<thead>
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Имя</th>
						<th>Телефон</th>
						<th>Коммент</th>
						<th>Дата</th>
					</tr>
					</thead>
					<tbody>
					@foreach($emails as $email)
						<tr>
							<td>{{$email->id}}</td>
							<td>{{$email->email}}</td>
							<td>{{$email->name}}</td>
							<td>{{$email->phone_number}}</td>
							<td>{{$email->comment}}</td>
							<td>{{$email->date}}</td>
						</tr>
					@endforeach()
					</tbody>
				</table>
				{{$emails->links()}}
			</div>
		</div>
		<script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace( 'editor1' );
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
		</script>
		<!-- /task manager table -->


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
