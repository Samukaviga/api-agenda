<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    function test() 
    {
        $agendas = Agenda::all();

        return response()->json($agendas);
    }

    function send(Request $request)
    {
        $validated = $request->validate([
            "email" => "required|email",        
            "password" => "required|min:6",
        ]);

        return response()->json(["ok" => true, $validated['email']]);
    }
}
