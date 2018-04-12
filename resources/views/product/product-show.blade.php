@extends('main')

@section('content')
    <div class="product-show-div">
        <div class="row">
            <div class="col-xs-5">
                @include('part/left')
            </div>
            <div class="col-xs-19">
                <div class="row">
                    <div>
                        @if (isset($listAncestors))
                            <ol class="breadcrumb">
                                @for($i = 0; $i < $listAncestors->count(); $i++)
                                    <li>
                                        <a href="{{ url('shop/'.$listAncestors[$i]->id) }}">
                                            {{ $listAncestors[$i]->name }}
                                        </a>
                                    </li>
                                @endfor
                                <li>
                                    {{ $product->name }}
                                </li>
                            </ol>
                        @endif
                    </div>
                    <div class="col-xs-12">
                        @if (isset($product->image->name))
                            <div id="carousel-poster" class="carousel slide" data-ride="carousel">
                                @php($i=1)
                                <div class="carousel-inner" role="listbox">
                                    @foreach($listImage as $image)
                                        @if($i == 1)
                                            <div class="item active" id="{{ 'carousel'.$i }}">
                                                <div class="image-align">
                                                    <img src="{{ url('file/'.encrypt('product/'.$image->name)) }}" alt="...">
                                                </div>
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                        @else
                                            <div class="item" id="{{ 'carousel'.$i }}">
                                                <div class="image-align">
                                                    <img src="{{ url('file/'.encrypt('product/'.$image->name)) }}" alt="...">
                                                </div>
                                                <div class="carousel-caption">
                                                </div>
                                            </div>
                                        @endif
                                        @php($i++)
                                    @endforeach
                                </div>
                                @php($i=1)
                                <a class="left carousel-control" href="#carousel-poster" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-poster" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>

                                <ul class="carousel-tab">
                                    @foreach($listImage as $image)
                                        @if($i == 1)
                                            <li data-target="#carousel-poster" id="{{ 'indicator'.$i }}" data-slide-to="{{ $i-1 }}" class="active">
                                                <img src="{{ url('file/'.encrypt('product/'.$image->name)) }}" alt="...">
                                            </li>
                                        @else
                                            <li data-target="#carousel-poster" id="{{ 'indicator'.$i }}" data-slide-to="{{ $i-1 }}">
                                                <img src="{{ url('file/'.encrypt('product/'.$image->name)) }}" alt="...">
                                            </li>
                                        @endif
                                        @php($i++)
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <img src="{{ url('file/'.encrypt('product/nophoto.jpg')) }}" alt="">
                        @endif
                    </div>
                    <div class="col-xs-12">
                        <div class="name-product">
                            <span>
                                {{ $product->name }}
                            </span>
                        </div>
                        @if(!empty($product->season))
                            <div class="season-product">
                                <span>
                                    Сезон {{ $product->season }}
                                </span>
                            </div>
                        @endif
                        <div class="price-product">
                            @if ($product->currency == 1)
                                <span>
                                            {{ $product->price }} тенге
                                        </span>
                            @elseif($product->currency == 2)
                                <span>
                                            {{ $product->price * $rate[0]->rate }} тенге
                                        </span>
                            @else
                                <span>
                                            {{ $product->price * $rate[1]->rate }} тенге
                                        </span>
                            @endif
                            <a class="btn btn-info" role="button" href="{{ url('contacts') }}">
                                Купить
                            </a>
                        </div>
                        <div class="about-product">
                            {!! $product->description !!}
                        </div>
                        @if(!empty($product->size))
                            <div class="size-product">
                                <span>
                                    Размеры: {{ $product->size }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop