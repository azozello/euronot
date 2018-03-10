<!DOCTYPE html>
<html lang="en">
<head>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    @include('layouts.styles')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Карта товара</span>
                </h4>
            </div>
            <button type="" class="btn bg-teal-400" style="margin-left: 30px">Посмотреть страницу</button>

        </div>

    </div>
    <div class="content">


        <form role="form" method="post" action="{{route('edit_product')}}" enctype="multipart/form-data">
            <input name="_token" type="hidden" value="{{ csrf_token() }}">
            <input name="product_id" type="hidden" value="{{ $product[0]->product_id }}">
            <div class="form-button">
                <button type="submit" class="btn bg-teal-400">Обновить</button>
            </div>
            <!-- CKEditor default -->
            <ul class="nav nav-tabs nav-tabs-product" role="tablist">
                <li role="presentation"><a href="#common" aria-controls="common" role="tab"
                                           data-toggle="tab">Общее</a></li>
                <li role="presentation"><a href="#communications" aria-controls="" role="tab"
                                           data-toggle="tab">Связи</a></li>
                <li role="presentation" class="active"><a href="#characteristics" aria-controls="" role="tab"
                                                          data-toggle="tab">Характеристики</a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="common tab-pane fade " id="common">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>{{$errors->first()}}</strong>
                        </div>
                    @endif
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">

                                @if(isset($languages[0]))
                                    <li role="presentation" class="active"><a href="#{{$languages[0]->language_url}}" aria-controls="{{$languages[0]->language_url}}" role="tab"
                                                                              data-toggle="tab">{{$languages[0]->language_name}}</a></li>
                                @endif
                                @if(isset($languages[1]))
                                    <li role="presentation"><a href="#{{$languages[1]->language_url}}" aria-controls="{{$languages[1]->language_url}}" role="tab"
                                                               data-toggle="tab">{{$languages[1]->language_name}}</a></li>
                                @endif
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                @if(isset($languages[0]))
                                    <div role="tabpanel" class="tab-pane fade in active " id="{{$languages[0]->language_url}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-content" style="padding-left: 50px;">
                                                    <input name="language_id[0]" type="hidden" value="{{$languages[0]->id}}">
                                                    <h5 class="content-group text-semibold">
                                                        <label>Название*</label>
                                                        <input type="text" name="name[0]"
                                                               value="@if(isset($product[0]->name)){{$product[0]->name}}@endif"
                                                               placeholder="{{$languages[0]->name_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Артикул*</label>
                                                        <input type="text" name="article[0]"
                                                               value="@if(isset($product[0]->article)){{$product[0]->article}}@endif"
                                                               placeholder="{{$languages[0]->article_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>URL*</label>
                                                        <input type="text" name="url[0]"
                                                               value="@if(isset($product[0]->url)){{$product[0]->url}}@endif"
                                                               placeholder="{{$languages[0]->url_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Title*</label>
                                                        <input type="text" name="title[0]"
                                                               value="@if(isset($product[0]->title)){{$product[0]->title}}@endif"
                                                               placeholder="{{$languages[0]->title_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Description*</label>
                                                        <textarea placeholder="{{$languages[0]->description_placeholder}}" name="description[0]"
                                                                  id="">@if(isset($product[0]->description)){!! $product[0]->description !!}@endif</textarea>
                                                    </h5>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-12">
                                                <label>Краткое описание</label>
                                                <div class="row">
                                                    <textarea name="short_description" id="editor31">@if(isset($product[0]->short_description)){!! $product[0]->short_description !!}@endif</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[0]" id="editor3">@if(isset($product_text[0]->first_text)){!! $product_text[0]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[0]" id="editor4">@if(isset($product_text[0]->second_text)){!! $product_text[0]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[1]" id="editor5">@if(isset($product_text[1]->first_text)){!! $product_text[1]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[1]" id="editor6">@if(isset($product_text[1]->second_text)){!! $product_text[1]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[2]" id="editor7">@if(isset($product_text[2]->first_text)){!! $product_text[2]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[2]" id="editor8">@if(isset($product_text[2]->second_text)){!! $product_text[2]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[3]" id="editor9">@if(isset($product_text[3]->first_text)){!! $product_text[3]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[3]" id="editor10">@if(isset($product_text[3]->second_text)){!! $product_text[3]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[4]" id="editor11">@if(isset($product_text[4]->first_text)){!! $product_text[4]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[4]" id="editor12">@if(isset($product_text[4]->second_text)){!! $product_text[4]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[5]" id="editor13">@if(isset($product_text[5]->first_text)){!! $product_text[5]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[5]" id="editor14">@if(isset($product_text[5]->second_text)){!! $product_text[5]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[6]" id="editor15">@if(isset($product_text[6]->first_text)){!! $product_text[6]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[6]" id="editor16">@if(isset($product_text[6]->second_text)){!! $product_text[6]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[7]" id="editor17">@if(isset($product_text[7]->first_text)){!! $product_text[7]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[7]" id="editor18">@if(isset($product_text[7]->second_text)){!! $product_text[7]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[8]" id="editor19">@if(isset($product_text[8]->first_text)){!! $product_text[8]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[8]" id="editor20">@if(isset($product_text[8]->second_text)){!! $product_text[8]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[9]" id="editor21">@if(isset($product_text[9]->first_text)){!! $product_text[9]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[9]" id="editor22">@if(isset($product_text[9]->second_text)){!! $product_text[9]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[10]" id="editor23">@if(isset($product_text[10]->first_text)){!! $product_text[10]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[10]" id="editor24">@if(isset($product_text[10]->second_text)){!! $product_text[10]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[11]" id="editor25">@if(isset($product_text[11]->first_text)){!! $product_text[11]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[11]" id="editor26">@if(isset($product_text[11]->second_text)){!! $product_text[11]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[12]" id="editor27">@if(isset($product_text[12]->first_text)){!! $product_text[12]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[12]" id="editor28">@if(isset($product_text[12]->second_text)){!! $product_text[12]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[13]" id="editor29">@if(isset($product_text[13]->first_text)){!! $product_text[13]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[13]" id="editor30">@if(isset($product_text[13]->second_text)){!! $product_text[13]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <textarea name="editor1[14]" id="editor1">@if(isset($product_text[14]->first_text)){!! $product_text[14]->first_text !!}@endif</textarea>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <textarea name="editor2[14]" id="editor2">@if(isset($product_text[14]->second_text)){!! $product_text[14]->second_text !!}@endif</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                @endif
                                @if(isset($languages[1]))
                                    <div role="tabpanel" class="tab-pane fade" id="{{$languages[1]->language_url}}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-content" style="padding-left: 50px;">
                                                    <input name="language_id[1]" type="hidden" value="{{$languages[1]->id}}">
                                                    <h5 class="content-group text-semibold">
                                                        <label>Название*</label>
                                                        <input type="text" name="name[1]"
                                                               value="@if(isset($product[1]->name)){{$product[1]->name}}@endif"
                                                               placeholder="{{$languages[1]->name_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Артикул*</label>
                                                        <input type="text" name="article[1]"
                                                               value="@if(isset($product[1]->article)){{$product[1]->article}}@endif"
                                                               placeholder="{{$languages[1]->article_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>URL*</label>
                                                        <input type="text" name="url[1]"
                                                               value="@if(isset($product[1]->url)){{$product[1]->url}}@endif"
                                                               placeholder="{{$languages[1]->url_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Title*</label>
                                                        <input type="text" name="title[1]"
                                                               value="@if(isset($product[1]->title)){{$product[1]->title}}@endif"
                                                               placeholder="{{$languages[1]->title_placeholder}}">
                                                    </h5>
                                                    <h5 class="content-group text-semibold">
                                                        <label>Description*</label>
                                                        <textarea placeholder="{{$languages[1]->description_placeholder}}" name="description[1]"
                                                                  id="">@if(isset($product[1]->description)){!! $product[1]->description !!}@endif</textarea>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            </div>
                                            <div class="col-md-12">
                                                <textarea name="editor[1]" id="editor2">@if(isset($product[1]->text)){!! $product[1]->text !!}@endif</textarea>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                        <div class="common-right">
                                            <h5 class="content-group text-semibold">
                                                <label>Таймер Акции</label>
                                                <input min="0" value="@if(isset($timer_days)){{$timer_days}}@endif" max="1000" id="number" style="width: 2em;" name="timer_days" type="number">
                                                <input min="0" value="@if(isset($timer_hours)){{$timer_hours}}@endif" max="24" id="number" style="width: 2em;" name="timer_hours" type="number">
                                                <input min="0" value="@if(isset($timer_minutes)){{$timer_minutes}}@endif" max="60" id="number" style="width: 2em;" name="timer_minutes" type="number">
                                                <input min="0" value="@if(isset($timer_seconds)){{$timer_seconds}}@endif" max="60" id="number" style="width: 2em;" name="timer_seconds" type="number">
                                            </h5>
                                            <div class="form-content" style="padding-left: 50px;">
                                                <h5>Статус товара</h5>
                                                <select class="selectpicker" name="product_status">
                                                    <option>@if(isset($product[0]->product_status)){{$product[0]->product_status}}@endif
                                                    </option>
                                                    <option>Супер цена
                                                    </option>
                                                    <option>Акция
                                                    </option>
                                                    <option>Хит продаж
                                                    </option>
                                                    <option>Продано
                                                    </option>
                                                </select>
                                                <h5>Наличие</h5>
                                                <select class="selectpicker" name="product_isset">
                                                    <option>@if(isset($product[0]->product_isset)){{$product[0]->product_isset}}@endif
                                                    </option>
                                                    <option>В наличии
                                                    </option>
                                                    <option>Нет в наличии
                                                    </option>
                                                </select>
                                                <h5>Гарантия</h5>
                                                <select class="selectpicker" name="product_garanty">
                                                    <option>@if(isset($product[0]->product_garanty)){{$product[0]->product_garanty}}@endif
                                                    </option>
                                                    <option>3 месяца
                                                    </option>
                                                    <option>6 месяцев
                                                    </option>
                                                    <option>12 месяцев
                                                    </option>
                                                    <option>24 месяца
                                                    </option>
                                                </select>
                                                <h5>Оценка пользователя</h5>
                                                <select class="selectpicker" name="product_stars">
                                                    <option>@if(isset($product[0]->product_stars)){{$product[0]->product_stars}}@endif
                                                    </option>
                                                    <option>5 звезд
                                                    </option>
                                                    <option>4 звезды
                                                    </option>
                                                    <option>3 звезды
                                                    </option>
                                                    <option>2 звезды
                                                    </option>
                                                    <option>1 звезда
                                                    </option>
                                                </select>
                                                @if(isset($products))
                                                    <h5>Подарочный товар</h5>
                                                    <select class="selectpicker" name="product_gift">
                                                        <option>@if(isset($product[0]->product_gift)){{$product[0]->product_gift}}@endif
                                                        </option>
                                                        @foreach($products as $product)
                                                            <option>{{$product->name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @endif
                                                <h5 class="content-group text-semibold">
                                                    <label>Цена*</label>
                                                    <input type="text" name="price"
                                                           value="@if(isset($product[0]->price)){{$product[0]->price}}@endif"
                                                           placeholder="Введите цену*">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Процессор*</label>
                                                    <input type="text" name="proc"
                                                           value="@if(isset($product[0]->proc)){{$product[0]->proc}}@endif"
                                                           placeholder="">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Оперативная память*</label>
                                                    <input type="text" name="op_memory_p"
                                                           value="@if(isset($product[0]->op_memory)){{$product[0]->op_memory}}@endif"
                                                           placeholder="">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Жесткий диск*</label>
                                                    <select class="selectpicker" name="type_memory">
                                                        @if($product[0]->type_memory == 'HDD')
                                                            <option selected>HDD
                                                            </option>
                                                            <option>SSD
                                                            </option>
                                                            @endif
                                                            @if($product[0]->type_memory == 'SSD')
                                                                <option selected>SSD
                                                                </option>
                                                                <option>HDD
                                                                </option>
                                                            @endif
                                                            @if($product[0]->type_memory == NULL)
                                                                <option selected>SSD
                                                                </option>
                                                                <option>HDD
                                                                </option>
                                                            @endif

                                                    </select>
                                                    <input type="text" name="hard_memory"
                                                           value="@if(isset($product[0]->hard_memory)){{$product[0]->hard_memory}}@endif"
                                                           placeholder="">
                                                </h5>
                                                <h5 class="content-group text-semibold">
                                                    <label>Операционная система*</label>
                                                    <input type="text" name="op_system"
                                                           value="@if(isset($product[0]->op_system)){{$product[0]->op_system}}@endif"
                                                           placeholder="">
                                                </h5>


                                                <div class="upload-photos">
                                                    <div class="input-file-row-1">

                                                        <div class="upload-file-container">
                                                            <img id="image" src="#" alt=""/>
                                                            <div class="upload-file-container-text">
                                                                <button type="" class="upload-single-photo btn bg-teal-400">
                                                                    Обновить
                                                                </button>
                                                                <input type="file" name="pic[]" class="photo"
                                                                       id="imgInput"/>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="demo-section k-content">
                                                        <input name="files[]" id="files" type="file"/>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                <!-- Связи  -->
                <div role="tabpanel" class="communications tab-pane fade  " id="communications">
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->

                            <!-- Tab panes -->
                            <div role="tabpanel" class="tab-pane fade in active" id="ru2">
                                <label>Процессор</label>
                                <table style="width:20%">
                                    <tr>
                                        <th><input type="text" name="proc_conf[0]" value="{{$products_configurations[0]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="proc_conf_price[0]" value="{{$products_configurations[0]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="proc_conf[1]" value="{{$products_configurations[1]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="proc_conf_price[1]" value="{{$products_configurations[1]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="proc_conf[2]" value="{{$products_configurations[2]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="proc_conf_price[2]" value="{{$products_configurations[2]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="proc_conf[3]" value="{{$products_configurations[3]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="proc_conf_price[3]" value="{{$products_configurations[3]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="proc_conf[4]" value="{{$products_configurations[4]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="proc_conf_price[4]" value="{{$products_configurations[4]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="proc_conf[5]" value="{{$products_configurations[5]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="proc_conf_price[5]" value="{{$products_configurations[5]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="proc_conf[6]" value="{{$products_configurations[6]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="proc_conf_price[6]" value="{{$products_configurations[6]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="proc_conf[7]" value="{{$products_configurations[7]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="proc_conf_price[7]" value="{{$products_configurations[7]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="proc_conf[8]" value="{{$products_configurations[8]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="proc_conf_price[8]" value="{{$products_configurations[8]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="proc_conf[9]" value="{{$products_configurations[9]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="proc_conf_price[9]" value="{{$products_configurations[9]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                </table>
                                <label>Оперативная память</label>
                                <table style="width:20%">
                                    <tr>
                                        <th><input type="text" name="op_memory[0]" value="{{$products_configurations[10]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="op_memory_price[0]" value="{{$products_configurations[10]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="op_memory[1]" value="{{$products_configurations[11]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="op_memory_price[1]" value="{{$products_configurations[11]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="op_memory[2]" value="{{$products_configurations[12]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="op_memory_price[2]" value="{{$products_configurations[12]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="op_memory[3]" value="{{$products_configurations[13]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="op_memory_price[3]" value="{{$products_configurations[13]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="op_memory[4]" value="{{$products_configurations[14]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="op_memory_price[4]" value="{{$products_configurations[14]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="op_memory[5]" value="{{$products_configurations[15]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="op_memory_price[5]" value="{{$products_configurations[15]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="op_memory[6]" value="{{$products_configurations[16]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="op_memory_price[6]" value="{{$products_configurations[16]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="op_memory[7]" value="{{$products_configurations[17]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="op_memory_price[7]" value="{{$products_configurations[17]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="op_memory[8]" value="{{$products_configurations[18]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="op_memory_price[8]" value="{{$products_configurations[18]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="op_memory[9]" value="{{$products_configurations[19]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="op_memory_price[9]" value="{{$products_configurations[19]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                </table>
                                <label>Жесткий диск</label>
                                <table style="width:20%">
                                    <tr>
                                        <th><input type="text" name="hard[0]" value="{{$products_configurations[20]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="hard_price[0]" value="{{$products_configurations[20]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="hard[1]" value="{{$products_configurations[21]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="hard_price[1]" value="{{$products_configurations[21]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="hard[2]" value="{{$products_configurations[22]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="hard_price[2]" value="{{$products_configurations[22]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="hard[3]" value="{{$products_configurations[23]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="hard_price[3]" value="{{$products_configurations[23]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="hard[4]" value="{{$products_configurations[24]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="hard_price[4]" value="{{$products_configurations[24]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="hard[5]" value="{{$products_configurations[25]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="hard_price[5]" value="{{$products_configurations[25]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="hard[6]" value="{{$products_configurations[26]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="hard_price[6]" value="{{$products_configurations[26]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="hard[7]" value="{{$products_configurations[27]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="hard_price[7]" value="{{$products_configurations[27]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                    <tr>
                                        <th><input type="text" name="hard[8]" value="{{$products_configurations[28]->configuration}}" placeholder=""></th>
                                        <th><input type="text" name="hard_price[8]" value="{{$products_configurations[28]->configuration_price}}" placeholder=""></th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="hard[9]" value="{{$products_configurations[29]->configuration}}" placeholder=""></td>
                                        <td><input type="text" name="hard_price[9]" value="{{$products_configurations[29]->configuration_price}}" placeholder=""></td>
                                    </tr>
                                </table>
                                <table class=" products-table-list no-chess table-lang table-lg table-striped"
                                       id="table-collapsed_55">
                                    <thead>
                                    <tr>
                                        <th><span class="checkall"></span></th>
                                        <th>Категории</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                        @if(!is_null($category->parent_category_id))
                                            <tr data-node="treetable-{{$category->category_id}}" data-pnode="treetable-parent-{{$category->parent_category_id}}">
                                        @else
                                            <tr data-node="treetable-{{$category->category_id}}" data-pnode="">
                                                @endif
                                                <th>
                                                    <input name="category[{{$category->category_id}}]"
                                                           @foreach($categories_list as $list)
                                                                   @if($category->name == $list) checked @endif
                                                           @endforeach
                                                           type="checkbox">
                                                </th>
                                                <td>{{$category->name}}</td>

                                            </tr>
                                            @endforeach
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                </div>
                <div role="tabpanel" class="characteristics tab-pane fade " id="characteristics">
                    <div class="panel panel-flat">
                        <div class="product-content">

                            <!-- Nav tabs -->

                            <div class="tab-content tab-flex">
                                <div role="tabpanel" class="tab-pane fade in active" id="ru3">
                                    <table class="no-chess table-lang table-lg table-striped"
                                           style="" id="table-collapsed_5">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th>Фильтры</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($filters as $k=>$filter)
                                                <tr data-node="treetable-{{$filter->filter_id}}" data-pnode="">

                                                    <th></th>
                                                    <td>{{$filter->name}}</td>
                                                </tr>
                                        @endforeach
                                        @foreach($attributes as $k=>$attribute)
                                                <tr data-node="treetable_а-{{$attribute->attributes_id}}" data-pnode="treetable-parent-{{$attribute->attributes_parent_filter}}">

                                                    <th>
                                                        <input type="checkbox"
                                                        @foreach($product_attributes as $attributes)
                                                            @if($attributes == $attribute->attributes_id)
                                                                checked
                                                            @endif
                                                        @endforeach
                                                        id="filter-{{$k}}" name="attribute[{{$attribute->attributes_id}}]">
                                                    </th>
                                                    <td>{{$attribute->attributes_name}}</td>
                                                </tr>
                                                @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2017. by <a href="https://github.com/sayron97" target="_blank">Oleksandr Yefremov</a>
        </div>
        <!-- /footer -->
        <script type="text/javascript">
            var ckeditor1 = CKEDITOR.replace('editor1');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor1
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor2');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor3');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor4');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor5');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor6');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor7');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor8');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor9');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor10');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor11');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor12');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor13');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor14');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script><script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor15');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor16');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor17');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor18');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor19');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor20');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor21');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor22');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor23');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor24');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor25');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor26');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor27');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor28');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor29');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>
        <script type="text/javascript">
            var ckeditor2 = CKEDITOR.replace('editor30');
            AjexFileManager.init({
                returnTo: 'ckeditor',
                editor: ckeditor2
            });
        </script>

        <script>
			jQuery(document).ready(function () {
				jQuery("#files").kendoUpload({
					async: {
						saveUrl: "save",
						removeUrl: "remove",
						autoUpload: true
					}
				});
				jQuery("#table-collapsed_1").treeFy({
					treeColumn: 0
				});
				jQuery("#table-collapsed_2").treeFy({
					treeColumn: 0
				});
				jQuery("#table-collapsed_3").treeFy({
					treeColumn: 0
				});
				jQuery("#table-collapsed_4").treeFy({
					treeColumn: 0
				});
				jQuery("#table-collapsed_5").treeFy({
					treeColumn: 0
				});
                jQuery("#table-collapsed_6").treeFy({
                    treeColumn: 0
                });

                jQuery("#table-collapsed_55").treeFy({
                    treeColumn: 0
                });

                $('#addTr').click(function () {
                    var a = $('#small-dialog input[type="checkbox"]:checked');
                    $('.mfp-close').click();

                    $.ajax({
                        url: "/product_card_filters_add",
                        contentType: 'application/json',
                        data: a,
                        type: 'POST',
                        success: function (data) {
                            alert(data[0])
                        },
                        error: function (xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseText);
                        }
                    });
                });
			});


        </script>


    </div>
    <!-- /content area -->

    </div>
    <!-- /main content -->

    </div>
    <!-- /page content -->

    </div>
    <!-- /page container -->
