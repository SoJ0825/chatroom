<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\User;
use App\Task;
use App\Message;
use Illuminate\Http\Request;

Route::get('/', function () {
//    return view('welcome');
    return view('login');
});

Route::get('/tasks', function () {
    return Task::all()->pluck('body');
});

Route::post('/tasks', function () {
    $task = Task::forceCreate(request(['body']));

    event(
        (new \App\Events\TaskCreated($task))->dontBroadcastToCurrentUser());
});

Route::get('/redis', function () {

    $data = [
        'event' => 'testEvent',
        'data' => [
            'username' => 'SoJ',
        ],
    ];

    Redis::publish('messages', json_encode($data));

    return view('redis');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/chatroom', function () {
    return view('chatRoom');
});

Route::get('/messages', function () {
//    return Message::all();
    $messages = Message::all();
    foreach($messages as $message){
        $message->user;
    }
    return $messages;
});

Route::post('/messages', function () {
    $message = Message::forceCreate(request(['body','user_id']));
    $message->user;

    $data = ['data' => $message, 'event' => 'messages'];

    Redis::publish('chatRoom', json_encode($data));

});

Route::get('/getuserid', function (Request $request) {

    if(!$user = User::where('name', $request->user)->first()){
        $user = User::forceCreate(
            ['name' => $request->user
            ]);
    }

    return $user->id;
});
