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
				<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Журнал заказов поставщикам</span></h4>
			</div>
		</div>

	</div>


	<!-- Content area -->
	<div class="content">

		<!-- Task manager table -->
		<form method="get" action="{{route('show_seller_product_make')}}" enctype="multipart/form-data">
			<select name="trader">
				@foreach($traders as $trader)
				<option>{{$trader->traders_name}}</option>
				@endforeach
			</select>
			<button type="submit" class="btn bg-teal-400 upload">Создать заказ</button>
		</form>
		<div class="panel panel-white">

			<table class="table tasks-list table-lg">
				<thead>
				<tr>
					<th>Статус заказа</th>
					<th>Номер заказа</th>
					<th>Дата заказа</th>
					<th>Время заказа</th>
					<th>Наименование поставщика</th>
					<th>Cумма заказа</th>
					<th>Дата предпологаемого получения</th>
					<th>Признак просроченного заказа</th>
					<th>Дата прихода</th>
					<th>Время прихода</th>
				</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr @if($order->overdue_order != 0) bgcolor="#f08080" @endif>
						<td><a href="{{ route('show_seller_products',['order_number' => $order->seller_order_number,'trader' => $trader->traders_name]) }}">{{$order->seller_order_condition}}</a></td>
						<td>{{$order->seller_order_number}}</td>
						<td>{{$order->seller_creating_order_date}}</td>
						<td>{{$order->seller_creating_order_time}}</td>
						<td>{{$order->seller_supplier_name}}</td>
						<td>{{$order->seller_order_sum}}</td>
						<td>{{$order->seller_expected_date_order}}</td>
						<td>{{$order->seller_overdue_order}}</td>
						<td>{{$order->seller_order_coming_time}}</td>
						<td>{{$order->seller_order_coming_date}}</td>
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
