@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-info">
                <span>{{ Session::get('status') }}</span>
            </div>
        @endif
        <form action="{{ route('setting.store') }}" method="post">
            @csrf
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#" onclick="document.getElementById('url_callback_bot').value = '{{ url('') }}'">Action</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('setwebhook').submit()">Set WebHook</a>
                    <a class="dropdown-item" href="#" onclick="document.getElementById('getwebhook').submit()">Get WebHook</a>
                </div>
            </div>
            <div class="form-group">
                <input id="url_callback_bot" type="text" class="form-control" name="url_callback_bot"  value="{{ $url_callback_bot or '' }}">
            </div>
            <button class="btn" type="submit">Send</button>
        </form>
            <form id="setwebhook" action="{{ route('setting.setwebhook') }}" method="post" style="display: hidden">
                @csrf
                <input type="hidden" name="url" value="{{ $url_callback_bot or '' }}">
            </form>
            <form id="getwebhook" action="{{ route('setting.getwebhook') }}" method="post" style="display: hidden">
                @csrf
            </form>
    </div>
@endsection
