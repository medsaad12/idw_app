<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->segment(2);
        $users = User::all();
        $receiver = User::find($id);
        $sender_id = Auth::user()->id ; 
        $receiver_id = $id; 
        $messages = Message::where(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $sender_id)
                  ->where('receiver_id', $receiver_id);
        })
        ->orWhere(function ($query) use ($sender_id, $receiver_id) {
            $query->where('sender_id', $receiver_id)
                  ->where('receiver_id', $sender_id);
        })
        ->orderBy('created_at', 'asc')
        ->get();
        return view('chat.chat' , ['users' => $users , 'receiver' => $receiver ? $receiver : User::whereNotIn('id', [Auth::user()->id])->inRandomOrder()->first()  , "messages"=>$messages]);
    }
    public function send(Request $request)
    {
        $message = new Message ;
        $message->message = $request->message ;
        $message->sender_id = Auth::user()->id ;
        $message->receiver_id = $request->receiver ;
        $message->save() ;
        return back() ;
    }
}
