<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    function test() 
    {
        $agendas = Agenda::all()->map(function ($agenda){

            return [
                "data" => $agenda->date,
                "hora" => $agenda->hour,
                "vagas" => $agenda->vacancy,
                "preenchido" => $agenda->filled,
            ];

        });

        return response()->json($agendas);
    }

    function send(Request $request)
    {
        $validated = $request->validate([
            "id" => "required",        
        ]);

        $agenda = Agenda::find($request->id);

        $agenda->filled += 1;
        $agenda->save();

        if($agenda == null){
            return response()->json(["error" => "Horario não encontrado"], 400);
        }

        return response()->json([$agenda]);

    }
}
