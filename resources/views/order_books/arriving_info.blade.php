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
        <form method="get" action="{{route('arriving_change_order_show')}}" enctype="multipart/form-data">
            <input type="hidden" name="order_number" value="{{$order_number}}">
            <button type="submit" class="btn bg-teal-400 upload">Перенести заказ</button>
        </form>
        <form method="get" action="{{route('arriving_order_ship')}}" enctype="multipart/form-data">
            <input type="hidden" name="order_number" value="{{$order_number}}">
            <button type="submit" class="btn bg-teal-400 upload">Отгрузить заказ</button>
        </form>
        <form method="get" action="{{route('arriving_order_ship_break')}}" enctype="multipart/form-data">
            <input type="hidden" name="order_number" value="{{$order_number}}">
            <button type="submit" class="btn bg-teal-400 upload">Скасувати</button>
        </form>
        <form method="get" action="{{route('arriving_order_ship_success')}}" enctype="multipart/form-data">
            <input type="hidden" name="order_number" value="{{$order_number}}">
            <button type="submit" class="btn bg-teal-400 upload">Виконан</button>
        </form>
        <!-- Task manager table -->
        <div class="panel panel-white">
            <table class="table tasks-list table-lg">
                <thead>
                <tr>
                    <th>Статус заказа</th>
                    <th>Номер заказа</th>
                    <th>Дата заказа</th>
                    <th>Наименование покупателя</th>
                    <th>Сумма заказа</th>
                    <th>Адрес доставки</th>
                    <th>Дата желаемой доставки</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr @if($order->overdue_order != 0) bgcolor="#f08080" @endif>
                        <td>{{$order->arriving_info_order_condition}}</td>
                        <td>{{$order->arriving_info_number}}</td>
                        <td>{{$order->arriving_info_order_date}}</td>
                        <td>{{$order->arriving_info_user_name}}</td>
                        <td>{{$order->arriving_info_sum}}</td>
                        <td>{{$order->arriving_info_address}}</td>
                        <td>{{$order->arriving_info_preferred_date}}</td>
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
