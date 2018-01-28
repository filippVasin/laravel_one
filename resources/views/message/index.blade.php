@extends('layouts.app')

@section('content')
    <div class="row-fluid">
        <div class="span2"></div>
        <div class="span8">

            <div class="alert alert-error none">
                Сообщение не может быть пустым
            </div>

            @guest
            @else
            <form id="sendForm" method="POST">
                {{ csrf_field() }}
                <div class="control-group">
                    <textarea style="width: 100%; height: 50px;" type="password" name="description" id="description_id" placeholder="Ваше сообщение..."
                              data-cip-id="inputText"></textarea>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                </div>
            </form>
            @endguest
            <div id="list">
                @if($messages)
                    @foreach($messages as $message)
                         <div class="well">
                         <h5>{{ $message['name']}}</h5>
                              {{ $message['text']}}
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection()