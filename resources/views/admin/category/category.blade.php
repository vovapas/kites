@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3 class="pull-left">Редактирование категорий</h3>
        <a class="btn btn-primary pull-right node-add" href="#" id="node-0" data-toggle="modal" data-target=".bs-example-modal-sm">
            <span id="node-name-0">
                Добавить корневой раздел
            </span>
        </a>
    </div>
    <div class="div-product-add content">
        <div class="admin-category">
            <span class="hidden" >{{ $i=0 }}</span>
            @if (count($listCategory) > 0)
                @if ($listCategory[$i]->depth == 0)
                    <ul>
                        @while(isset($listCategory[$i]) && ($listCategory[$i]->depth == 0))
                            <li>
                                @if(count($listCategory[$i]->getDescendants()) <> 0)
                                    <a class="menu-click" href="#" id="node-name-{{ $listCategory[$i]->id }}">
                                        {{ $listCategory[$i]->name }}
                                    </a>
                                    <i class="fa fa-arrow-down item-fa" aria-hidden="true"></i>
                                @else
                                    <a class="menu-click" href="#" id="node-name-{{ $listCategory[$i]->id }}">
                                        {{ $listCategory[$i]->name }}
                                    </a>
                                @endif
                                <div class="button-div">
                                    <button class="node-add" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" id="node-{{ $listCategory[$i]->id }}">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                    <button class="node-edit" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" id="node-{{ $listCategory[$i]->id }}">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </button>
                                    <a class="node-del" href="{{ url('admin/category/del/'.$listCategory[$i]->id) }}">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <span class="hidden" >{{ $i++ }}</span>
                                @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                                    <ul class="item-ul">
                                        @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 1)
                                            <li>
                                                @if(count($listCategory[$i]->getDescendants()) <> 0)
                                                    <a class="menu-click" href="#" id="node-name-{{ $listCategory[$i]->id }}">
                                                    {{ $listCategory[$i]->name }}
                                                    </a>
                                                    <i class="fa fa-arrow-down item-fa" aria-hidden="true"></i>
                                                @else
                                                    <a class="menu-click" href="#" id="node-name-{{ $listCategory[$i]->id }}">
                                                        {{ $listCategory[$i]->name }}
                                                    </a>
                                                @endif
                                                <div class="button-div">
                                                    <button class="node-add" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" id="node-{{ $listCategory[$i]->id }}">
                                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                                    </button>
                                                    <button class="node-edit" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" id="node-{{ $listCategory[$i]->id }}">
                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                    </button>
                                                    <a class="node-del" href="{{ url('admin/category/del/'.$listCategory[$i]->id) }}">
                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <span class="hidden" >{{ $i++ }}</span>
                                                @if (isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                                    <ul class="item-ul">
                                                        @while(isset($listCategory[$i]) && $listCategory[$i]->depth == 2)
                                                            <li>
                                                                <a href="#" id="node-name-{{ $listCategory[$i]->id }}">
                                                                    {{ $listCategory[$i]->name }}
                                                                </a>
                                                                <div class="button-div">
                                                                    <button class="node-edit" type="button" data-toggle="modal" data-target=".bs-example-modal-sm" id="node-{{ $listCategory[$i]->id }}">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </button>
                                                                    <a class="node-del" href="{{ url('admin/category/del/'.$listCategory[$i]->id) }}">
                                                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                                <span class="hidden" >{{ $i++ }}</span>
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

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <form id="form-node" action="{{ url('admin/category/newChild') }}">
                            <div id="category-name">
                            </div>
                            <input name="id-parent" id="id-parent" type="text" hidden>
                            <input name="type-modal" id="type-modal" type="text" hidden>
                            <input name="node-name" id="node-name" type="text">
                            <button id="new-child">Сохранить</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop