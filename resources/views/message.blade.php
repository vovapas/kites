@if (session('message'))
    @if(session('type') == config('app.message_info'))
        <div class="alert alert-info">
            <span class="glyphicon glyphicon-info-sign"></span>
            {{ session('message') }}
        </div>
    @endif

    @if(session('type') == config('app.message_info'))
        <div class="alert alert-danger">
            <span class="glyphicon glyphicon-remove"></span>
            {{ session('message') }}
        </div>
    @endif

    @if(session('type') == config('app.message_warning'))
        <div class="alert alert-warning">
            <span class="glyphicon glyphicon-asterisk"></span>
            {{ session('message') }}
        </div>
    @endif

    @if(session('type') == config('app.message_success'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {{ session('message') }}
        </div>
    @endif
@endif