<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <style>
        .page-header-default {
            margin-bottom: 0;
        }

        #chartSquare {
            width: 100%;
            height: 500px;
        }
        #chartLine {
            width: 100%;
            height: 500px;
        }

        .amcharts-chart-div a {
            display: none !important;
        }
    </style>
    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>

    <!-- amChartsSquare javascript code -->
    <script type="text/javascript">
		AmCharts.makeChart("chartSquare",
			{
				"type": "serial",
				"categoryField": "category",
				"dataDateFormat": "YYYY-MM-DD",
				"maxSelectedSeries": 0,
				"depth3D": 1,
				"colors": [
					"#fbd754",
					"#84b761",
					"#cc4748",
					"#cd82ad",
					"#2f4074",
					"#448e4d",
					"#b7b83f",
					"#b9783f",
					"#b93e3d",
					"#913167"
				],
				"startDuration": 1,
				"startEffect": "bounce",
				"theme": "light",
				"categoryAxis": {
					"gridPosition": "start",
					"parseDates": true
				},
				"chartCursor": {
					"enabled": true
				},
				"chartScrollbar": {
					"enabled": true
				},
				"trendLines": [],
				"graphs": [
					{
						"fillAlphas": 1,
						"id": "AmGraph-1",
						"title": "graph 1",
						"type": "column",
						"valueField": "column-1"
					}
				],
				"guides": [],
				"valueAxes": [
					{
						"id": "ValueAxis-1",
						"title": ""
					}
				],
				"allLabels": [],
				"balloon": {
					"animationDuration": 0
				},
				"titles": [
					{
						"id": "Title-1",
						"size": 15,
						"text": ""
					}
				],
                "dataProvider": [
                        @foreach($dates as $date)
                    {
                        "category": "{{$date}}",
                        "column-1": @if(isset($count[$date])) "{{$count[$date]}}" @else "0" @endif
                    },
                    @endforeach
                ]
			}
		);
    </script>

    <!-- amChartsLine javascript code -->
    <script type="text/javascript">
		AmCharts.makeChart("chartLine",
			{
				"type": "serial",
				"categoryField": "date",
				"dataDateFormat": "YYYY-MM-DD",
				"colors": [
					"#fbd754",
					"#fbd754",
					"#B0DE09",
					"#0D8ECF",
					"#2A0CD0",
					"#CD0D74",
					"#CC0000",
					"#00CC00",
					"#0000CC",
					"#DDDDDD",
					"#999999",
					"#333333",
					"#990000"
				],
				"fontFamily": "Roboto",
				"fontSize": 18,
				"theme": "light",
				"categoryAxis": {
					"parseDates": true
				},
				"chartCursor": {
					"enabled": true
				},
				"chartScrollbar": {
					"enabled": true
				},
				"trendLines": [],
				"graphs": [
					{
						"bullet": "round",
						"bulletBorderAlpha": 1,
						"bulletBorderThickness": 1,
						"bulletSize": 15,
						"columnWidth": 0,
						"id": "AmGraph-1",
						"minDistance": 0,
						"tabIndex": 0,
						"title": "graph 1",
						"valueField": "column-1"
					}
				],
				"guides": [],
				"valueAxes": [
					{
						"id": "ValueAxis-1",
						"title": ""
					}
				],
				"allLabels": [],
				"balloon": {
					"borderAlpha": 0
				},
				"titles": [
					{
						"id": "Title-1",
						"size": 15,
						"text": ""
					}
				],

				"dataProvider": [
                        @foreach($connection_dates as $connection_date)
                    {
                        "date": "{{$connection_date}}",
                        "column-1": @if(isset($connection_count[$connection_date])) "{{$connection_count[$connection_date]}}" @else "0" @endif
                    },
                        @endforeach

				]
			}
		);
    </script>

    <script type="text/javascript">
	    $(document).ready(function () {

		    var date = new Date();
		    function getWeekDay(date) {
			    var days = ['Январь', 'Февраль', 'Март', 'Апрель', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

			    return days[date.getMonth()];
		    }
		    $('.calendar-month').text(getWeekDay(date));
		    $('.calendar-date').text(date.getDate());
		    $('.calendar-year').text(date.getFullYear());
	    });

		var d = document;
		var NN = d.layers ? true : (window.opera && !d.createComment) ? true : false

		function showTime() {

			var tmN = new Date();

			var dH = '' + tmN.getHours();
			dH = dH.length < 2 ? '0' + dH : dH;

			var dM = '' + tmN.getMinutes();
			dM = dM.length < 2 ? '0' + dM : dM;

			var dS = '' + tmN.getSeconds();
			dS = dS.length < 2 ? '0' + dS : dS;
			var tmp = dH + ':' + dM + ':' + dS;

			if (NN) d.F.chas.value = tmp; else d.getElementById('tm').innerHTML = tmp;

			var t = setTimeout('showTime()', 1000)

		}
    </script>
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><span class="text-semibold">Админ. панель</span>
                </h4>
            </div>
        </div>

    </div>
    <div class="">

        <div class="wrap-calendar-doc">
            <div class="calendar-wrap">
                <div class="time">
                    <div id=tm>
                        <form name="F"><input type="button" name="chas" value="XX:XX:XX"></form>
                    </div>
                </div>
                <div class="calendar">
                    <div class="calendar-month">Ноябрь</div>
                    <div class="calendar-date"></div>
                    <div class="calendar-year"></div>
                </div>
            </div>
            <div class="doc-wrap">
                <div class="doc-text">Возникли вопросы по заполнению админ.панели? Прочитайте
                                      нашу документацию!
                </div>
                <div class="doc-btn">
                    <div class="form-button">
                        <a href="http://compas.agency/cms/guide.php">
                            <button type="submit" class="btn bg-teal-400">Документация</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrap-order-chart-square">
            <div class="order">
                <div class="order-title">Заказы</div>
                <div class="order-table">
                    <div class="panel panel-white">
                        <table class="table tasks-list table-lg">
                            <table class="table tasks-list table-lg">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>ФИО</th>
                                    <th>Телефон</th>
                                    <th>Email</th>
                                    <th>Дата</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->phone_number}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                    </div>
                </div>
                <div class="form-button">
                    <a href="/admin/page/post">
                        <button type="submit" class="btn bg-teal-400">Больше</button>
                    </a>
                </div>
            </div>
            <div class="chart-square">
                <div class="chart-square-title">График заказов</div>
                <div class="chart-square-table">
                    <form role="form" method="get" action="{{ route('page_main') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <button type="submit" name="month" class="btn bg-teal-400">Месяц</button>
                    <button type="submit" name="3_months" class="btn bg-teal-400">3 Месяца</button>
                    <button type="submit" name="6_months" class="btn bg-teal-400">6 Месяцев</button>
                    <button type="submit" name="year" class="btn bg-teal-400">Год</button>
                    </form>
                    <div id="chartSquare" style="width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                </div>
                <div class="form-button">
                    <a href="#">
                        <button type="submit" class="btn bg-teal-400">Подробно</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="wrap-chart-line">
            <div class="chart-line-title">Посещаемость сайта</div>
            <div class="chart-line-table">
                <form role="form" method="get" action="{{ route('page_main') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <button type="submit" name="connection_month" class="btn bg-teal-400">Месяц</button>
                <button type="submit" name="connection_3_months" class="btn bg-teal-400">3 Месяца</button>
                <button type="submit" name="connection_6_months" class="btn bg-teal-400">6 Месяцев</button>
                <button type="submit" name="connection_year" class="btn bg-teal-400">Год</button>
                </form>
                <div id="chartLine" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
            </div>
        </div>
        <script type="text/javascript">showTime()</script>
    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
