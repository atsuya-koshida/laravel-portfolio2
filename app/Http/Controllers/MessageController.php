<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Message $message)
    {
        $message->fill($request->all());
        $group = $message->group_id;
        $message->save();
        return redirect()->route('group.show', ['group' => $group]);
    }
}