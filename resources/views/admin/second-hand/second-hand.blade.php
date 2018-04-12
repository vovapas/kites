@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3>Барахолка</h3>
    </div>

    <div class="div-second-hand content">
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
                    Цена
                </td>
                <td>
                    Информация о заявителе
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
                        @if (isset($product->picture))
                            <img src="{{ url('file/'.encrypt('secondHand/'.$product->picture)) }}" alt="">
                        @else
                            <img src="{{ url('file/'.encrypt('product/nophoto.jpg')) }}" alt="">
                        @endif
                    </td>
                    <td>
                        <p>
                            @if ($product->id_categoru == 0)
                                {{ 'разное: '.$product->name }}
                            @else
                                {{ $product->status->name.': '.$product->name }}
                            @endif
                            
                        </p>
                        <p>
                            Описание товара: {{ $product->description }}
                        </p>
                    </td>
                    <td>
                        <p>
                            {{ $product->price }} ₸
                        </p>
                    </td>
                    <td>
                        <p>Имя: {{ $product->user_name }}</p>
                        <p>Город: {{ $product->user_town }}</p>
                        <p>Телефон: {{ $product->user_phone }}</p>
                    </td>
                    <td>
                        <a type="button" class="btn btn-sm btn-danger" href="{{ url('admin/second-hand-destroy/'.$product->id) }}">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@stop