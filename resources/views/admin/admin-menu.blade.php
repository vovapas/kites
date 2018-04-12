<div class="container">
    <ul class="nav nav-pills" role="navigation">
        <li>
            <a href="{{ url('/') }}">
                <i class="fa fa-desktop" aria-hidden="true"></i>
                kites.kz
            </a>
        </li>

        <li>
            <a href="{{ url('admin/category') }}">
                <i class="fa fa-list" aria-hidden="true"></i>
                Категории товара
            </a>
        </li>

        <li>
            <a href="{{ url('admin/product') }}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Товары
            </a>
        </li>

        <li>
            <a href="{{ url('admin/second-hand') }}">
                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                Барахолка
            </a>
        </li>

        <li>
            <a href="{{ url('admin/places') }}">
                <i class="fa fa-globe" aria-hidden="true"></i>
                Места катания
            </a>
        </li>

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-pencil" aria-hidden="true"></i> Редактирование <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ url('admin/rate') }}">Курс валют</a></li>
            </ul>
        </li>

        <li>
            <a href="{{ url('logout') }}" >
                <i class="fa fa-sign-out "></i>
                Выход
            </a>
        </li>
    </ul>
</div>