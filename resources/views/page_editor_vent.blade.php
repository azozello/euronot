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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Создание страниц</span>
                </h4>
            </div>
        </div>

    </div>
    <div class="content">
        <h5 class="panel-title">Редактор</h5>
        <!-- CKEditor default -->
        <div class="panel panel-flat">
            <div>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="ru">

                        <form method="post" action="" enctype="multipart/form-data">
                            <input name="_token" type="hidden" value="">
                            <input name="id" type="hidden" value="">
                            <input name="number" type="hidden" value="">
                            <div class="panel-heading">
                                <div class="form-inline">
                                    <div class="select-nesting">
                                        <div class="form-group">
                                            <span>Выберите категорию:</span>
                                            <select class="selectpicker">
                                                <optgroup>
                                                    <option>Picnic</option>
                                                    <option>a</option>
                                                    <option>b</option>
                                                    <option>c</option>
                                                </optgroup>
                                                <optgroup >
                                                    <option>Camping</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>

                                                </optgroup>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-button">
                                        <button type="submit" class="btn bg-teal-400">Обновить</button>
                                    </div>
                                    <div class="form-group">
                                        <label>Название*</label>
                                        <input name="name" type="text" id="name" placeholder="Введите назву*">
                                    </div>
                                    <div class="form-group ">
                                        <label>URL*</label>
                                        <input name="url" type="text" id="url" placeholder="Введите url*">
                                    </div>
                                    <div class="form-group">
                                        <label>Title*</label>
                                        <input name="title" type="text" id="title" placeholder="Введите title*">
                                    </div>
                                    <div class="form-group">
                                        <label>Description*</label>
                                        <input name="description" type="text" id="description"
                                               placeholder="Введите description*">
                                    </div>
                                    <textarea name="editor1" id="editor1">

                           </textarea>

                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>


        <!-- /CKEditor default -->

        <!-- Footer -->
        <div class="footer text-muted">
            &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                     target="_blank">Eugene Kopyov</a>
        </div>
        <!-- /footer -->
        <script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace('editor1');
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
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
