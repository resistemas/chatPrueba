<?php

namespace App\Http\Controllers;

use App\Events\chatTime;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'message' => 'required'
        ]);

        Chat::create([
            'usuario' => $validateData['name'],
            'message' => $validateData['message'],
        ]);

        // event(new chatTime('hello world'));
        event(new chatTime($request['name']));

        return response()->json([
            'status' => true,
            'message' => 'Mensaje guardado satisfactoriamente',
        ],200);
    }

    public function allMessage(Request $request){
        $chat = Chat::all();

        return response()->json([
            'status' => true,
            'data' => $chat
        ],200);
    }
}
