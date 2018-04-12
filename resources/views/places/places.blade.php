@extends('main')

@section('content')
    <h2>
        Карта кайт и серф спотов и окрестностей:
    </h2>
    <div>
        <iframe src="https://www.google.com/maps/d/embed?mid=1L58e2iwFiIZgInkal63ygxrZ9QU&z=8" width="100%" height="480"></iframe>
    </div>

    <div class="div-places content">
        <div class="row">
            <div class="col-xs-24">
                @foreach($listPlaces as $places)
                    <div class="places">
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