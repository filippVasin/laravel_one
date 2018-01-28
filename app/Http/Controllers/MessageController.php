<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\createMessageRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;

class MessageController extends Controller
{
    use ValidatesRequests;

    /**
     * @return отдаём представление и массив всех сообщений с именами авторов
     */
    public function index()
    {
        return view('message.index',['messages' => Message::all_massages()]);
    }

    /**
     * @param request - масссив параметров с формы отправки сообщения
     * @return result - имя текшего пользователя и текст сохраннённого сообщения
     */
    public  function  store(createMessageRequest $request)
    {
        $message = new Message;
        $message->user_id = Auth::user()->id;
        $message->text = $request->get('description');
        $message->save();
        $result['status'] = "ok";
        $result['text'] = $message->text;
        $result['name'] = Auth::user()->name;
        return json_encode($result);
    }
}
