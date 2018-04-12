@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3 class="pull-left">Добавление места</h3>
    </div>
    <div class="div-places-add content">
        <form action="{{ URL::to('admin/places/add') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="well clearfix">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Наименование места</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Описание места</label>
                <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="wind">Ветер</label>
                <textarea class="form-control" name="wind" id="wind" rows="1" required></textarea>
            </div>
            <div class="form-group">
                <label for="level">Уровень</label>
                <textarea class="form-control" name="level" id="level" rows="1" required></textarea>
            </div>
            <div class="form-group">
                <label for="minuses">Минусы</label>
                <textarea class="form-control" name="minuses" id="minuses" rows="1" required></textarea>
            </div>
            <div class="form-group">
                <label>Изображение1</label>
                <input name="picture1" type="file">
            </div>
            <div class="form-group">
                <label>Изображение2</label>
                <input name="picture2" type="file">
            </div>
            <div class="form-group">
                <label>Изображение3</label>
                <input name="picture3" type="file">
            </div>
            <button class="btn btn-primary pull-right">
                Добавить
            </button>
        </form>
    </div>
@stop