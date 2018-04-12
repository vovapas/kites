<div class="left-menu">
    @php( $i=0 )
    <div class="menu-title">Каталог товаров</div>
    @if (count($listCategory) > 0)
        @if ($listCategory[$i]->depth == 0)
            <ul>
                @while(isset($listCategory[$i]) && ($listCategory[$i]->depth == 0))
                    <li>
                        @if(count($listCategory[$i]->getDescendants()) <> 0)
                            <a class="menu-click" href="#">
                                {{ str_limit($listCategory[$i]->name, 25) }}
                            </a>
                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                        @else
                            <a href="{{ url('shop/' . $listCategory[$i]->id) }}">
                                {{ str_limit($listCategory[$i]->name, 25) }}
                            </a>
                        @endif
                        @php($i++)
                        @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                            <ul>
                                @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                                    <li>
                                        @if(count($listCategory[$i]->getDescendants()) <> 0)
                                            <a class="menu-click" href="#">
                                                {{ str_limit($listCategory[$i]->name, 25) }}
                                            </a>
                                            <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                        @else
                                            <a href="{{ url('shop/' . $listCategory[$i]->id) }}">
                                                {{ str_limit($listCategory[$i]->name, 25) }}
                                            </a>
                                        @endif
                                        @php($i++)
                                        @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                            <ul>
                                                @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                                    <li>
                                                        <a href="{{ url('shop/' . $listCategory[$i]->id) }}">
                                                            {{ str_limit($listCategory[$i]->name, 25) }}
                                                        </a>
                                                        @php($i++)
                                                    </li>
                                                @endwhile
                                            </ul>
                                        @endif
                                    </li>
                                @endwhile
                            </ul>
                        @endif
                    </li>
                @endwhile
            </ul>
        @endif
    @endif
</div>
