@extends('main')

@section('content')
    <div class="second-hand-div">
        <div class="row">
            <div class="col-xs-24">
                <span>
                    Доска частных объявлении
                </span>
                <button class="btn btn-info pull-right" type="button" data-toggle="modal" data-target=".bs-example-modal-lg">
                    Добавить объявление
                </button>
            </div>
        </div>

        <ul>
            @foreach($listProduct as $product)
                <li>
                    <div class="lost-img lost-height">
                        <img class="image" src="{{ url('file/'.encrypt('secondHand/'.$product->picture)) }}" alt="" data-zoom-image="{{ url('file/'.encrypt('secondHand/'.$product->picture)) }}" />
                    </div>
                    <div class="lost-product lost-height">
                        <div>
                            @if($product->id_category == 0)
                                <p>Разное: {{ $product->name }}</p>
                            @else
                                <p>
                                    {{ $product->status->name.': '.$product->name }}
                                </p>
                            @endif

                        <p>
                            Описание товара: {{ $product->description }}
                        </p>
                        </div>
                    </div>
                    <div class="lost-price lost-height">
                        <div>
                            <p>
                                {{ $product->price }} ₸
                            </p>
                        </div>
                    </div>
                    <div class="lost-user lost-height">
                        <div>
                            <p>Информация о заявителе</p>
                            <p>Имя: {{ $product->user_name }}</p>
                            <p>Город: {{ $product->user_town }}</p>
                            <p>Телефон: {{ $product->user_phone }}</p>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Форма добавления товара</h4>
                    </div>
                    <form id="form-second-hand" action="{{ url('second-hand/create') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="listCategory">Выберите категорию</label>
                                    <select class="form-control" size="1" name="listCategory" id="listCategory">
                                        <option selected value="0">
                                            разное
                                        </option>
                                        @foreach($listCategory as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Наименование товара</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="price">Цена товара</label>
                                    <input type="text" name="price" id="price" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание товара</label>
                                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Изображение</label>
                                    <input name="picture" type="file">
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="town">Ваш город</label>
                                    <input type="text" name="town" id="town" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="user-name">Имя</label>
                                    <input type="text" name="user-name" id="user-name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Номер телефона</label>
                                    <input type="text" name="phone" id="phone" class="form-control" required>                                   
                                </div>
                            </div>
                        </div>
                        <button id="new-second-hand" class="btn btn-info pull-right">Сохранить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop