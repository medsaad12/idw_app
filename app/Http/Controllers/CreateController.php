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
  public function craeteu_user(Request $request){
    return $request->all();
  }
}
