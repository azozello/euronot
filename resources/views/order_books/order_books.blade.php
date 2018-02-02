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
                    <th>Код товара</th>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->products_article}}</td>
                        <td>{{$product->products_name}}</td>
                        <td>{{$product->products_price}}</td>
                        <td>{{$product->products_quantity}}</td>
                        <td>{{$product->products_price_with_quantity}}</td>
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
