@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3 class="pull-left">Редактирование товара</h3></div>
    <div class="div-product-edit content">
        <form action="{{ url('admin/product/save') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="well clearfix">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col-xs-5">
                    @include('admin/part/left-edit-product')
                </div>
                <div class="col-xs-19">
                    <input class="hidden" name="id_product" type="text" value="{{ $product->id }}">
                    <div class="form-group">
                        <label for="category">Категория товара:</label>
                        <span id="name-category">{{ $product->category->name }}</span>
                        <input type="text" name="category" id="category" class="form-control hidden" value="{{ $product->id_category }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Наименование товара</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="manufacturer">Производитель</label>
                        <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $product->manufacturer }}">
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="price">Цена товара</label>
                                <input type="text" name="price" id="price" class="form-control numeric"  value="{{ $product->price }}">
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label for="currency">Выберите валюту</label>
                                <select class="form-control" name="currency" id="currency">
                                    @if ($product->currency == 1)
                                        <option selected value="1">тенге</option>
                                        <option value="2">рубли</option>
                                        <option value="3">доллары</option>
                                    @elseif($product->currency == 2)
                                        <option value="1">тенге</option>
                                        <option selected value="2">рубли</option>
                                        <option value="3">доллары</option>
                                    @else
                                        <option value="1">тенге</option>
                                        <option value="2">рубли</option>
                                        <option selected value="3">доллары</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="amount">Колличество</label>
                        <input type="text" name="amount" id="amount" class="form-control numeric" value="{{ $product->amount }}">
                    </div>
                    <div class="form-group">
                        <label for="size">Размер</label>
                        <input type="text" name="size" id="size" class="form-control" value="{{ $product->size }}">
                    </div>
                    <div class="form-group">
                        <label for="season">Сезон</label>
                        <input type="text" name="season" id="season" class="form-control" value="{{ $product->season }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание товара</label>
                        <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                    </div>
                    @if (isset($product->image->name))
                        <img src="{{ url('file/'.encrypt('product/'.$product->image->name)) }}" alt="">
                    @else
                        <img src="{{ url('file/'.encrypt('product/nophoto.jpg')) }}" alt="">
                    @endif
                    <div class="form-group">
                        <label>Изображение</label>
                        <input name="picture" type="file">
                    </div>
                </div>
            </div>

            <button class="btn btn-primary pull-right">
                Сохранить
            </button>
        </form>
    </div>
@stop