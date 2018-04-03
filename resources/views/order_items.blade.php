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

    </script>


    <!-- Content area -->
    <div class="content">

        <!-- Task manager table -->

        <div class="panel panel-white">
            <table class="table tasks-list table-lg">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Стоимость</th>
                    <th>Количество</th>
                    <th>Оперативка</th>
                    <th>Хард</th>
                    <th>Процессор</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mails as $i=>$mail)
                    <tr>
                        <td>{{$mail->item_id}}</td>
                        <td>{{$names[$i]}}</td>
                        <td>{{$mail->item_price}}</td>
                        <td>{{$mail->item_value}}</td>
                        <td>{{$mail->item_amount}}</td>
                        <td>{{$mail->op}}</td>
                        <td>{{$mail->hard}}</td>
                        <td>{{$mail->proc}}</td>
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

    </body>
</html>
