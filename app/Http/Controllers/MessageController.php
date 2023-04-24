<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(Request $request)
    {
        $messages = new Message;
        $user = auth()->user();

        $messages->message = $request->message;
        $messages->user_id = $user->id;
        $messages->compliance_id = $request->compliance_id;

        $messages->save();

        return response()->json([
            'mensagem' => '<div class="chat-r">
            <div class="sp"></div>
            <div class="mess mess-r">
              <p>' . $messages->message . '</p>
              <div class="check">
                <span>' . $messages->user->name . '</span>
                <span>' .  date('d/m/Y', strtotime($messages->created_at)) . '</span>
              </div>
            </div>
          </div>'
        ]);
    }
}
