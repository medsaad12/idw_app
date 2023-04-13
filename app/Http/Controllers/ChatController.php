<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Events\MessageSent;
use App\Models\GroupMessage;
use Illuminate\Http\Request;
use App\Events\GroupMessageSent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->segment(2);
        if ($id == null) {
            $users = User::all();
            return view('chat.contact',['users'=>$users]);
        } ;
        $users = User::all();
        $receiver = User::find($id);
        $sender_id = Auth::user()->id ; 
        $receiver_id = $id ? $id : User::whereNotIn('id', [Auth::user()->id])->inRandomOrder()->first()->id ; 
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
        return view('chat.chat' , ["currentUser" => Auth::user()->id ,'users' => $users , 'receiver' => $receiver  , "messages"=>$messages]);
    }
    public function send(Request $request)
    {
        if ($request->message == null && $request->missing("file")) {
            return back()->with('err' ,  "quelque chose est incorrecte reessayer !!") ;
        }elseif($request->message == null && $request->has("file")){
            $message = new Message ;
            $message->sender_id = Auth::user()->id ;
            $message->receiver_id = $request->receiver ;
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $path = $filename;
            $message->document_path = $path ;  
            $message->save() ;
            broadcast(new MessageSent($message));
            return back() ;
        }elseif($request->missing('file') && $request->has('message')){
            $message = new Message ;
            $message->message = $request->message ;
            $message->sender_id = Auth::user()->id ;
            $message->receiver_id = $request->receiver ;
            $message->save() ;
            broadcast(new MessageSent($message));
            return back() ;
        }elseif($request->has('file') && $request->has('message')){
            $message = new Message ;
            $message->message = $request->message ;
            $message->sender_id = Auth::user()->id ;
            $message->receiver_id = $request->receiver ;
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $path = $filename;
            $message->document_path = $path ;  
            $message->save() ;
            broadcast(new MessageSent($message));
            return back() ;
        }else{
            return back()->with('err' ,  "quelque chose est incorrecte reessayer !!") ;
        }
    }
    
    public function sendtogroup(Request $request)
    {
        if ($request->message == null && $request->missing("file")) {
            return back()->with('err' ,  "quelque chose est incorrecte reessayer !!") ;
        }elseif($request->message == null && $request->has("file")){
            $message = new GroupMessage ;
            $message->sender_id = Auth::user()->id ;
            $message->sender_name = Auth::user()->name ;
            $message->group_id = $request->receivers_group ;
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $path = $filename;
            $message->document_path = $path ;  
            $message->save() ;
            broadcast(new GroupMessageSent($message));

            return back() ;
        }elseif($request->missing('file') && $request->has('message')){
            $message = new GroupMessage ;
            $message->message = $request->message ;
            $message->sender_id = Auth::user()->id ;
            $message->sender_name = Auth::user()->name ;
            $message->group_id = $request->receivers_group ;
            $message->save() ;
            broadcast(new GroupMessageSent($message));
            return back() ;
        }elseif($request->has('file') && $request->has('message')){
            $message = new GroupMessage ;
            $message->message = $request->message ;
            $message->sender_id = Auth::user()->id ;
            $message->sender_name = Auth::user()->name ;
            $message->group_id = $request->receivers_group ;
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('documents'), $filename);
            $path = $filename;
            $message->document_path = $path ;  
            $message->save() ;
            broadcast(new GroupMessageSent($message));
            return back() ;
        }else{
            return back()->with('err' ,  "quelque chose est incorrecte reessayer !!") ;
        }
        
    }
    public function download(Request $request)
    {
        $id = $request->segment(2);
        $message =  Message::find($id) ? Message::find($id): GroupMessage::find($id);
        return response()->download(public_path('documents/'.$message->document_path));
        
    }
}
