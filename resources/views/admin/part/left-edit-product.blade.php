<div id="cssmenu">
    @php( $i=0 )
    @if (count($listCategory) > 0)
        @if ($listCategory[$i]->depth == 0)
            <ul>
                @while(isset($listCategory[$i]) && ($listCategory[$i]->depth == 0))
                    @if(count($listCategory[$i]->getDescendants()) <> 0)
                        <li class="has-sub">
                            <a href="#">
                                {{ str_limit($listCategory[$i]->name, 25) }}
                            </a>
                    @else
                        <li>
                            <a id="{{ $listCategory[$i]->id }}" class="edit_category_product" href="{{ url('admin/product-edit/get-category') }}">
                                {{ str_limit($listCategory[$i]->name, 25) }}
                            </a>
                    @endif
                    @php($i++)
                    @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                        <ul>
                            @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                                @if(count($listCategory[$i]->getDescendants()) <> 0)
                                    <li class="has-sub">
                                        <a href="#">
                                            {{ str_limit($listCategory[$i]->name, 25) }}
                                        </a>
                                @else
                                    <li>
                                        <a  id="{{ $listCategory[$i]->id }}" class="edit_category_product" href="{{ url('admin/product-edit/get-category') }}">
                                            {{ str_limit($listCategory[$i]->name, 25) }}
                                        </a>
                                @endif
                                @php($i++)
                                @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                    <ul>
                                        @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                            <li>
                                                <a id="{{ $listCategory[$i]->id }}" class="edit_category_product" href="{{ url('admin/product-edit/get-category') }}">
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
