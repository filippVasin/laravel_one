@extends('layouts.app')

@section('content')

    <div class="row-fluid">
        <div class="span4"></div>
        <div class="span8">

            <form action="" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="control-group">
                    <b>Регистрация</b>
                </div>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    @if ($errors->has('name'))
                                        <div class="control-group error">
                                     @else
                                        <div class="control-group">
                                    @endif

                                    <input type="text" id="name" name="name" placeholder="Логин"
                                           data-cip-id="inputLogin" autocomplete="off" value="{{ old('name') }}">
                                    @if($errors->has('name') == "The name has already been taken.")
                                        <span class="help-inline">
                                            Логин уже занят.
                                        </span>
                                    @elseif($errors->has('name'))
                                        <span class="help-inline">
                                            Логин может содержать только - символы (a-Z) + цифры (0-9), от 8ми символов.
                                        </span>
                                    @endif
                                </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        @if ($errors->has('password'))
                            <div class="control-group error">
                        @else
                            <div class="control-group">
                        @endif
                                <input type="password" id="password" name="password" placeholder="Пароль">
                                @if ($errors->has('password'))
                                    <span class="help-inline">
                                        Пароль должен содержать символы (a-Z) в верхнем и нижнем регистрах + цифры, от 6ти символов.
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if ($errors->has('password'))
                            <div class="control-group error">
                        @else
                            <div class="control-group">

                        @endif
                            <input type="password" id="password-confirm" name="password_confirmation"
                                   placeholder="Повторите пароль">
                                @if ($errors->has('password'))
                                    <span class="help-inline">
                                        {{$errors->first('password')}}
                                    </span>
                                @endif
                        </div>
                        <div class="control-group">
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
            </form>
        </div>
    </div>

@endsection
