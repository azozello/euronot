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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Обратная связь</span></h4>
			</div>
		</div>

	</div>
	<script>
		function status(id) {
            var status = prompt("Введите статус заказа", "хуятус");
            var dto = {id : id, status : status};
            $.ajax({
                url : "/admin/page/change_post_stats",
                contentType : 'application/json',
                data : dto,
                type : 'GET',
                success: function(data) {
                    console.log(data);
                    document.getElementById(id).innerText = status;
                },
                error:  function(xhr, str){
                    alert('Возникла ошибка: ' + xhr + str);
                    console.log(xhr);
                    console.log(str);
                }
            });
        }
	</script>


				<!-- Content area -->
				<div class="content">

					<!-- Task manager table -->

					<div class="panel panel-white">
						<table class="table tasks-list table-lg">
							<thead>
								<tr>
									<th>#</th>
									<th>Подарок</th>
					                <th>Статус заказа</th>
									<th>Дата</th>
									<th>Сумма заказа</th>
					                <th>ФИО</th>
					                <th>Номер телефона</th>
									<th>E-mail</th>
                                    <th>Тип доставки</th>
									<th>Адрес доставки</th>
					            </tr>
							</thead>
							<tbody>
							@foreach($mails as $mail)
								<tr>
									<td><a href="/admin/page/order_items/{{$mail->id}}">{{$mail->id}}</a></td>
									<td>{{$mail->comment}}</td>
					                <td onclick="status({{$mail->id}})" id="{{$mail->id}}">{{$mail->status}}</td>
									<td>{{$mail->date}}</td>
									<td>{{$mail->sum}}</td>
									<td>{{$mail->name}}</td>
									<td>{{$mail->phone_number}}</td>
					                <td>{{$mail->email}}</td>
                                    <td>{{$mail->type}}</td>
					                <td>{{$mail->address}}</td>
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
