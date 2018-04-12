<div class="row">
    <div class="col-xs-24">
        <ul class="menu-left">
            <li>
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/surfbro_logo.jpg') }}" alt="">
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Обучение <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Обучение кайт-серфингу</a></li>
                    <li><a href="#">Обучение серфингу</a></li>
                    <li><a href="#">Обучение SUP серфингу</a></li>
                </ul>
            </li>
            <li><a href="{{ url('shop') }}">Магазин</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="{{ url('places') }}">Места катания</a></li>
            <li><a href="{{ url('prognosis') }}">Прогнозы</a></li>
            <li><a href="{{ url('second-hand') }}">Барахолка</a></li>
        </ul>
        <ul class="menu-right">
            <li><a href="#">О нас</a></li>
            <li><a href="{{ url('contacts') }}">Контакты</a></li>
        </ul>
    </div>
</div>



