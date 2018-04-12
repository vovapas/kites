@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3>Места катания</h3>

        <a class="btn btn-primary pull-right" href="{{ url('admin/places/places-add') }}">
            <span class="fa fa-plus"></span>
            Добавить место
        </a>
    </div>
    <div class="div-places content">
        @include('message')
        <div class="row">
            <div class="col-xs-24">
                @foreach($listPlaces as $places)
                    <div class="places">
                        <div class="places-change">
                            <a class="places-edit" href="{{ url('admin/places/edit/' . $places->id) }}">
                                <i class="fa fa-edit" aria-hidden="true"></i>
                            </a>
                            <a class="places-del" href="{{ url('admin/places/del/' . $places->id) }}">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="name">
                            <span>{{ $places->name }}</span>
                        </div>
                        <p>{{ $places->description }}</p>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="param-places">Ветер</span>
                            </div>
                            <div class="col-xs-18">
                                <span>{{ $places->wind }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="param-places">Уровень</span>
                            </div>
                            <div class="col-xs-18">
                                <span>{{ $places->level }}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="param-places">Минусы</span>
                            </div>
                            <div class="col-xs-18">
                                <span>{{ $places->minuses }}</span>
                            </div>
                        </div>
                        <div class="row div-img">
                            <div class="col-xs-8">
                                @if ($places->picture1 != '')
                                    <img src="{{ url('file/'.encrypt('places/'.$places->picture1)) }}" alt="">
                                @endif
                            </div>
                            <div class="col-xs-8">
                                @if ($places->picture2 != '')
                                    <img src="{{ url('file/'.encrypt('places/'.$places->picture2)) }}" alt="">
                                @endif
                            </div>
                            <div class="col-xs-8">
                                @if ($places->picture3 != '')
                                    <img src="{{ url('file/'.encrypt('places/'.$places->picture3)) }}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop