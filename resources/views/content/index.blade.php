@extends('main')

@section('content')
    <div class="main-div">
        <div class="row">
            <div class="col-xs-24">
                <div>
                    <h3>
                        Мы обучаем:
                    </h3>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="#"><img src="{{ asset('images/kitesurf.jpg') }}" alt=""></a>
                    <span>
                        Кайт-серфинг
                    </span>
                        <p>
                            Кайтсерфинг даст вам полную свободу! Скольжение по воде и высокие вылеты в небо!
                            Наши инструкторы помогут вам быстро и безопасно освоить этот потярсающий спорт. Ловите ветер вместе с нами!
                        </p>
                        <a class="btn btn-info" role="button" href="#">
                            Научиться
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <a href="#"><img src="{{ asset('images/surf.jpg') }}" alt=""></a>
                    <span class="article-title">
                        Серфинг
                    </span>
                        <p>
                            Серфинг начал развиваться во Владивостоке относительно недавно, но количество катающихся растет с каждым днем.
                            Мы поможем вам безопасно и быстро поймать свою первую волну!
                        </p>
                        <a class="btn btn-info" role="button" href="#">
                            Узнать больше
                        </a>
                    </div>
                    <div class="col-xs-8">
                        <a href="#"><img src="{{ asset('images/sup.jpg') }}" alt=""></a>
                    <span class="article-title">
                        SUP-серфинг
                    </span>
                        <p>
                            Это по-настоящему уникальный спорт, который подходит для всей семьи.
                            Вы можете серфить на волнах или грести по гладкой воде. Безопасно научиться катанию на SUP-досках можно в нашей школе.
                        </p>
                        <a class="btn btn-info" role="button" href="#">
                            Попробовать
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop