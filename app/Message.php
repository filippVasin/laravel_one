<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Message extends Model
{

    /**
     * @return array -  список всех сообщений и имён авторов
     */
    public static function all_massages(){

        $messages = Message::orderBy('id','desc')->get();
        $res = array();
        if ($messages) {
            foreach ($messages as $key => $message) {
                $res[$key]['name'] = User::find($message->user_id)->name;
                $res[$key]['text'] = $message->text;
            }
        }
        return $res;
    }

}