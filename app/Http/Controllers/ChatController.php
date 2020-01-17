<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Chat;
use App\User;
use Auth;

class ChatController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create($id)
    {
            $user = User::where('id', $id)->first();

            $new_chat = new Chat();
            $new_chat->user_id = $user->id;
            $new_chat->save();

            $chat = $new_chat;

            return $chat;
    }

    public function fireAnEventWhenMessage(Request $request)
    {
        $params = [
            'message' => $request->get('name')
        ];

        event(new SeeMessage($params, 'message'));
    }

    public function store(Request $request, $chat_id)
    {
        $chat = Chat::where('id', $chat_id)->first();

        $message = $request->message;

        $new_message          = new Message();
        $new_message->message = $message;
        $new_message->chat_id = $chat->id;
        $new_message->user_id = $chat->user_id;

        $new_message->is_dest_agent = 'S';
        $new_message->dest_agent_id = Auth::user()->id;

        $new_message->save();

    }


    public function historic($id)
    {
        $chat = Chat::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();

        if(!$chat)
        {
            $chat = ChatController::create($id);

            $messages = Message::where('chat_id', $chat->id)->get();
            $chat_id =  $chat->id;

            return view('chat.historic', compact('chat_id', 'messages', 'user'));
        }
        else
        {
            $messages = Message::where('chat_id', $chat->id)->get();
            $chat_id =  $chat->id;
            return view('chat.historic', compact('chat_id', 'messages', 'user'));
        }
    }

    public function show($id)
    {
        $chat = Chat::where('user_id', $id)->first();
        $user = User::where('id', $id)->first();

        if(!$chat)
        {
            $chat = ChatController::create($id);

            $messages = Message::where('chat_id', $chat->id)->get();
            $chat_id =  $chat->id;

            return view('chat.show', compact('chat_id', 'messages', 'user'));
        }
        else
        {
            $messages = Message::where('chat_id', $chat->id)->get();
            $chat_id =  $chat->id;
            return view('chat.show', compact('chat_id', 'messages', 'user'));
        }
    }
}
