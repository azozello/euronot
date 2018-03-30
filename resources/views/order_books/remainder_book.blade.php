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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Почта</span></h4>
			</div>
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
					                <th>Телефон</th>
					                <th>Email</th>
					                <th>Комментарий</th>
					                <th>Дата</th>
					            </tr>
							</thead>
							<tbody>
							@foreach($mails as $mail)
								<tr>
									<td>{{$mail->id}}</td>
									<td>{{$mail->name}}</td>
					                <td>{{$mail->phone_number}}</td>
					                <td>{{$mail->email}}</td>
					                <td>{{$mail->comment}}</td>
					                <td>{{$mail->date}}</td>
					            </tr>
							@endforeach()
							</tbody>
						</table>
						{{$mails->links()}}
					</div>
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
