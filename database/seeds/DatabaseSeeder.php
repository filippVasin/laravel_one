<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Message;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $this->call('UsersTableSeeder');
        $this->call('MessagesTableSeeder');
    }
}


class UsersTableSeeder extends Seeder
{
    public function run(){
        DB::table('users')->delete();

        User::create([
            'name' => 'Root2000',
            'password' => Hash::make('Root1999'),
        ]);

        User::create([
            'name' => 'User2000',
            'password' => Hash::make('User1999'),
        ]);
    }
}

class MessagesTableSeeder extends Seeder
{
    public function run(){
        DB::table('messages')->delete();

        Message::create([
            'user_id' => 1,
            'text' => 'Тестовый текст',
        ]);

        Message::create([
            'user_id' => 2,
            'text' => 'Тестовый текст 2',
        ]);
    }
}