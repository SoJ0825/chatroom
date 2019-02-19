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
use App\Task;
use App\Message;

Route::get('/', function () {
    return view('welcome');
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
    return view('redis');
});

Route::get('/chatroom', function () {
    return view('chatRoom');
});

Route::get('/messages', function () {
    return Message::all();
});

Route::post('/messages', function () {
    $message = Message::forceCreate(request(['body','user_id']));
    event(
        (new \App\Events\MessageCreated($message))->dontBroadcastToCurrentUser());
//        $task = 'hi';
//
//    event(
//        (new \App\Events\TaskCreated($task))->dontBroadcastToCurrentUser());
});
