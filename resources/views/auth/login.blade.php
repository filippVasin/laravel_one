@extends('layouts.app')

@section('content')

<div class="row-fluid">
    <div class="span4"></div>
    <div class="span3">


        @if ($errors->has('name'))
            <div class="alert alert-error">
                {{ $errors->first('name') }}
            </div>
        @endif

        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                <div class="control-group">
                    <b>Авторизация</b>
                </div>
                    @if ($errors->has('name'))
                         <div class="control-group error">
                    @else
                        <div class="control-group">
                    @endif

                    <input type="text" id="name" type="name" name="name" placeholder="Логин" data-cip-id="inputLogin"
                           required autofocus value="{{ old('name') }}">
                    </div>


                    @if ($errors->has('name'))
                        <div class="control-group error">
                    @else
                        <div class="control-group">
                    @endif
                    <input type="password" id="password" name="password" placeholder="Пароль"
                           data-cip-id="inputPassword" required>
                    </div>

            </div>

            <div class="control-group">
                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить меня
                </label>
                <button type="submit" class="btn btn-primary">Вход</button>
            </div>
        </form>
    </div>
</div>

@endsection
