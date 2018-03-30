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
		<form method="get" action="{{route('arriving_order_make_new')}}" enctype="multipart/form-data">
			<select name="type">
				<option>Курьер</option>
				<option>Самовывоз</option>
				<option>Нова пошта</option>
			</select>
			<input type="date" name="date">
			<button type="submit" class="btn bg-teal-400 upload">Створити новий</button>
		</form>
		<!-- Task manager table -->
		<div class="panel panel-white">
			<table class="table tasks-list table-lg">
				<thead>
				<tr>
					<th>Статус отгрузки</th>
					<th>Номер отгрузки</th>
					<th>Дата плана</th>
					<th>Тип отгрузки</th>
					<th>Дата отгрузки</th>
					<th>Время отгрузки</th>
				</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr @if($order->overdue_order != 0) bgcolor="#f08080" @endif>
						<td><a href="{{ route('show_arriving_info',['arriving_order_number' => $order->arriving_order_number]) }}">{{$order->arriving_condition}}</a></td>
						<td>{{$order->arriving_number}}</td>
						<td>{{$order->arriving_plan_date}}</td>
						<td>{{$order->arriving_type}}</td>
						<td>{{$order->arriving_date}}</td>
						<td>{{$order->arriving_time}}</td>
					</tr>
				@endforeach()
				</tbody>
			</table>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://js.pusher.com/3.1/pusher.min.js"></script>
	<script>
        //instantiate a Pusher object with our Credential's key
        var pusher = new Pusher('05bc9ef1afa67b9a5ed5', {
            cluster: 'eu',
            encrypted: true
        });

        //Subscribe to the channel we specified in our Laravel Event
        var channel = pusher.subscribe('channelDemoEvent');

        //Bind a function to a Event (the full Laravel class)
        channel.bind('App\\Events\\eventTrigger', addMessage);

        function addMessage(data) {
            var listItem = $("<li class='list-group-item'></li>");
            listItem.html(data.message);
            $('#messages').prepend(listItem);
            alert('sdfasdf');
        }
	</script>
	</body>
</html>
