<?php

namespace App\Http\Controllers;

use App\Events\MessageSend;
use App\Http\Requests\MessageFormRequest;
use App\Models\Message;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getChat(): Factory|View|Application
    {

        return view('users.chat');
    }

    public function messages(): Collection|array
    {
        return Message::query()
            ->with('user')
            ->get();
    }

    public function send(MessageFormRequest $request)
    {
        $message = $request->user()
            ->messages()
            ->create($request->validated());

        broadcast(new MessageSend($request->user(), $message));

        return $message;
    }
}
