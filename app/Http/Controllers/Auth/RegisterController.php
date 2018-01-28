<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @params  массив входящих данныхс формы регистрации
     * @return true|error
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'unique:users|required|regex:/^[a-zA-Z0-9]+$/|min:8',
            'password' => ['required', 'regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/','min:6','confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  массив входящих данныхс формы регистрации после валидации
     * @return Создаём пользователя
     */
    protected function create(array $data)
    {
            return User::create([
                'name' => $data['name'],
                'password' => bcrypt($data['password']),
            ]);
    }
}
