@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3 class="pull-left">Редактирование места</h3>
    </div>
    <div class="div-places-edit content">
        <form action="{{ url('admin/places/save') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="well clearfix">
            {!! csrf_field() !!}
            <div class="row">
                <input class="hidden" name="id" type="text" value="{{ $places->id }}">
                <div class="form-group">
                    <label for="name">Наименование места</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ $places->name }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание места</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required>{{ $places->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="wind">Ветер</label>
                    <textarea class="form-control" name="wind" id="wind" rows="1" required>{{ $places->wind }}</textarea>
                </div>
                <div class="form-group">
                    <label for="level">Уровень</label>
                    <textarea class="form-control" name="level" id="level" rows="1" required>{{ $places->level }}</textarea>
                </div>
                <div class="form-group">
                    <label for="minuses">Минусы</label>
                    <textarea class="form-control" name="minuses" id="minuses" rows="1" required>{{ $places->minuses }}</textarea>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label>Изображение1</label>
                            @if ($places->picture1 != '')
                                <img src="{{ url('file/'.encrypt('places/'.$places->picture1)) }}" alt="">
                            @endif
                            <input name="picture1" type="file">
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label>Изображение2</label>
                            @if ($places->picture2 != '')
                                <img src="{{ url('file/'.encrypt('places/'.$places->picture2)) }}" alt="">
                            @endif
                            <input name="picture2" type="file">
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <div class="form-group">
                            <label>Изображение3</label>
                            @if ($places->picture3 != '')
                                <img src="{{ url('file/'.encrypt('places/'.$places->picture3)) }}" alt="">
                            @endif
                            <input name="picture3" type="file">
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary pull-right">
                    Сохранить
                </button>
            </div>
        </form>
    </div>
@stop