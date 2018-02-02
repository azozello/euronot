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
        <form method="get" action="{{route('seller_products_autogenerate')}}" enctype="multipart/form-data">
            <input name="order_number" type="hidden" value="{{ $order_number }}">
            <input name="trader" type="hidden" value="{{ $trader }}">
            <button type="submit" class="btn bg-teal-400 upload">Заповнити</button>
        </form>
        <form method="get" action="{{route('seller_products_add_field')}}" enctype="multipart/form-data">
            <input name="order_number" type="hidden" value="{{ $order_number }}">
            <input type="number" size="3" name="count" min="1" max="100" value="1">
            <button type="submit" class="btn bg-teal-400 upload">Добавить поле</button>
        </form>
        <form method="get" action="{{route('seller_order_get')}}" enctype="multipart/form-data">
            <input name="order_number" type="hidden" value="{{ $order_number }}">
            <button type="submit" class="btn bg-teal-400 upload">Оприходовать</button>
        </form>
        <div class="panel panel-white">
            <form method="post" action="{{route('seller_products_save')}}" enctype="multipart/form-data">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input name="order_number" type="hidden" value="{{ $order_number }}">
                <button type="submit" name="save" class="btn bg-teal-400 upload">Сохранить</button>
                <button type="submit" name="make_order" class="btn bg-teal-400 upload">Заказать</button>
            <table class="table tasks-list table-lg">
                <thead>
                <tr>
                    <th>Код товара</th>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                    <th>Удаление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <input name="id[]" type="hidden" value="{{ $order->id }}">
                    <input name="seller_products_id[]" type="hidden" value="{{ $order->seller_products_id }}">
                    <tr>
                        <td> <input type="text" name="article[]" placeholder="Введите код товара*" value="{{$order->seller_products_article}}"></td>
                        <td> <input type="text" name="name[]" placeholder="Введите наименование товара*" value="{{$order->seller_products_name}}"></td>
                        <td> <input type="text" name="price[]" placeholder="Введите цену*" value="{{$order->seller_products_price}}"></td>
                        <td> <input type="text" name="quantity[]" placeholder="Введите количество*" value="{{$order->seller_products_quantity}}"></td>
                        <td> <input type="text" name="sum[]" placeholder="Введите сумму*" value="{{$order->seller_products_sum}}"></td>
                        <td><button class="btn btn-danger btn-xs" name="delete{{$order->id}}" data-title="AddToCart" data-toggle="modal" >
                                    <span class="glyphicon glyphicon-trash"></span>
                            </button></td>
                    </tr>
                @endforeach()
                </tbody>
            </table>
            </form>
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
