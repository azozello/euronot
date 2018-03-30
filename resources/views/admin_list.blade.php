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
				<h4><span class="text-semibold">Пользователи</span></h4>
			</div>

			<form role="form" method="get" action="{{ route('register_show') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="page-header-btn-right">
					<button type="" class="btn bg-teal-400">Новый пользователь</button>
				</div>
			</form>

		</div>

	</div>


				<!-- Content area -->
				<div class="content">

					<!-- Task manager table -->

					<div class="panel panel-white">
						<table class="table tasks-list table-lg">
							<thead>
								<tr>
									<th>#</th>
									<th>ФИО</th>
					                <th>Email</th>
					                <th>Дата создания</th>
									<th>Удаление</th>
					            </tr>
							</thead>
							<tbody>
							@foreach($admins as $admin)
								<tr>
									<td>{{$admin->id}}</td>
									<td>{{$admin->name}}</td>
					                <td>{{$admin->email}}</td>
					                <td>{{$admin->created_at}}</td>
									<td><form method="post" action="{{ route('admin_delete') }}" enctype="multipart/form-data">
											<input name="_token" type="hidden" value="{{ csrf_token() }}">
											<input name="id" type="hidden" value="{{$admin->id}}">
											<button type="submit" class="btn bg-teal-400" >Удалить</button>
										</form></td>
					            </tr>
							@endforeach()
							</tbody>
						</table>
					</div>
					<!-- /task manager table -->


					<!-- Footer -->
					<div class="footer text-muted">

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
