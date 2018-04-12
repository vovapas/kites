@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3 class="pull-left">Добавление товара</h3></div>
    <div class="div-product-add content">
        <form action="{{ URL::to('admin/product/add') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="well clearfix">
            {!! csrf_field() !!}
            <div class="col-xs-6 sel-div">
                <div>
                    <div>
                        <label for="listCategory">Выберите категорию</label>
                    </div>
                    <select class="sel-cat form-control" data-link="{{ URL::to('admin/product/product-add/sel-cat') }}" size="1" name="listCategory" id="listCategory">
                        <option selected value="0">
                            ...
                        </option>
                        @foreach($listCategory as $category)
                            @if ($category->depth == 0)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <div>
                        <label class="label-sel-1 hidden" for="listCategory1">Выберите подкатегорию 1</label>
                    </div>
                    <select class="sel-cat-1 hidden form-control" data-link="{{ URL::to('admin/product/product-add/sel-cat') }}" name="listCategory1" id="listCategory1">
                    </select>
                </div>
                <div>
                    <div>
                        <label class="label-sel-2 hidden" for="listCategory2">Выберите подкатегорию 2</label>
                    </div>
                    <select class="sel-cat-2 hidden form-control" name="listCategory2" id="listCategory2">
                    </select>
                </div>
                <div class="alert-danger">
                    @if(session('error'))
                        {{ session('error') }}
                    @endif
                </div>
            </div>
            <div class="col-xs-18 add-product">
                <div class="form-group">
                    <label for="name">Наименование товара</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="manufacturer">Производитель</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="form-control">
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="price">Цена товара</label>
                            <input type="text" name="price" id="price" class="form-control numeric">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="currency">Выберите валюту</label>
                            <select class="form-control" name="currency" id="currency">
                                <option value="1">тенге</option>
                                <option value="2">рубли</option>
                                <option value="3">доллары</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Описание товара</label>
                    <textarea class="form-control edit-element" name="description" id="description" rows="3"></textarea>                 
                </div>
                <div class="form-group">
                    <label for="amount">Колличество</label>
                    <input type="text" name="amount" id="amount" class="form-control numeric">
                </div>
                <div class="form-group">
                    <label for="size">Размер</label>
                    <input type="text" name="size" id="size" class="form-control">
                </div>
                <div class="form-group">
                    <label for="season">Сезон</label>
                    <input type="text" name="season" id="season" class="form-control">
                </div>
                <div class="form-group">
                    <label>Изображение</label>
                    <input name="images[]" type="file" multiple>
                </div>
                <button class="btn btn-primary pull-right">
                    Добавить
                </button>
            </div>
        </form>
    </div>
@stop