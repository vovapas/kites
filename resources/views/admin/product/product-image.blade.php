@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3>Изображения товара: {{ $product->name }}</h3>
    </div>

    <div class="div-product-image content">
        <div class="row">
            <div class="col-xs-24">
                @foreach($listImage as $image)
                    <img src="{{ url('file/'.encrypt('product/'.$image->name)) }}" alt="">
                    <a href="{{ url('admin/product-image-remove/'.$image->id) }}">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </a>
                @endforeach
                <form action="{{ url('admin/product-image/add') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="row">
                        <div class="col-xs-12">
                            <label>Изображение</label>
                            <input name="image" type="file">
                            <input name="product_id" class="hidden" type="text" value="{{ $product->id }}">
                        </div>
                        <div class="col-xs-12">
                            <button class="btn btn-primary pull-right">
                                Добавить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop