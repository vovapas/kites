@extends('admin/admin')

@section('content')
    <div class='header-panel'>
        <h3>Курс</h3>
    </div>
    <div class="div-rate content">
        <div class="row">
            <div class="col-xs-24">
                <form action="{{ url('admin/rateSave') }}" method="post" accept-charset="utf-8" role="form" enctype="multipart/form-data" class="well clearfix">
                    {!! csrf_field() !!}
                    @foreach($listRate as $rate)
                    <div class="item-rate">
                        <span>1 {{ $rate->name }} = </span>
                        <input name="{{ $rate->name }}" type="text" value="{{ $rate->rate }}">
                        <span> тенге</span>
                    </div>
                    @endforeach
                    <button class="btn btn-primary pull-right">
                        Сохранить
                    </button>
                </form>
            </div>
        </div>
    </div>
@stop