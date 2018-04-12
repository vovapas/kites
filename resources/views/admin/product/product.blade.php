@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3>Товары</h3>

        <a class="btn btn-primary pull-right" href="{{ url('admin/product/product-add') }}">
            <span class="fa fa-plus"></span>
            Добавить товар
        </a>
    </div>

    <div class="div-product content">
        @include('message')
        <div class="row">
            <div class="col-xs-5">
                @include('admin/part/left')
            </div>
            <div class="col-xs-19">
                <table class="table table-striped table-common">
                    <thead>
                    <tr>
                        <td>
                            Фото
                        </td>
                        <td>
                            Название
                        </td>
                        <td>
                            Колличество
                        </td>
                        <td>
                            Стоимость
                        </td>
                        <td>
                            Действие
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($listProduct as $product)
                            <tr>
                                <td>
                                    <a href="{{ url('admin/product-image/'.$product->id) }}">
                                        @if (isset($product->image->name))
                                            <img src="{{ url('file/'.encrypt('product/'.$product->image->name)) }}" alt="">
                                        @else
                                            <img src="{{ url('file/'.encrypt('product/nophoto.jpg')) }}" alt="">
                                        @endif
                                    </a>
                                </td>
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->amount }}
                                </td>
                                <td>
                                    {{ $product->price }}
                                    @if ($product->currency == 1)
                                        ₸
                                    @elseif ($product->currency == 2)
                                        Ք
                                    @else
                                        $
                                    @endif
                                </td>
                                <td>
                                    <a type="button" class="btn btn-sm btn-warning" href="{{ url('admin/product-edit/'.$product->id) }}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a type="button" class="btn btn-sm btn-danger" href="{{ url('admin/product-destroy/'.$product->id) }}">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop