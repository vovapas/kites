@extends('main')

@section('content')
    <div class="product-div">
        <div class="row">
            <div class="col-xs-5">
                @include('part/left')
            </div>
            <div class="col-xs-19">
                <div class="row">
                    @if (isset($listAncestors))
                        <ol class="breadcrumb">
                            @for($i = 0; $i < $listAncestors->count(); $i++)
                                @if($i < $listAncestors->count() - 1)
                                    <li>
                                        <a href="{{ url('shop/'.$listAncestors[$i]->id) }}">
                                            {{ $listAncestors[$i]->name }}
                                        </a>
                                    </li>
                                @else
                                    <li> {{ $listAncestors[$i]->name }} </li>
                                @endif
                            @endfor
                        </ol>
                    @endif
                    @foreach($listProduct as $product)
                        <div class="col-xs-8">
                            <div class="item-div">
                                <a href="{{ url('shop/item/'.$product->id) }}">
                                    <div class="image-align">
                                        @if (isset($product->image->name))
                                            <img src="{{ url('file/'.encrypt('product/'.$product->image->name)) }}" alt="">
                                        @else
                                            <img src="{{ url('file/'.encrypt('product/nophoto.jpg')) }}" alt="">
                                        @endif
                                    </div>
                                    <p>
                                        {{ $product->name }}
                                    </p>
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
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop