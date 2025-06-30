<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AgendaController extends Controller
{
    function test()
    {
        $agendas = Agenda::all()->map(function ($agenda) {

            return [
                "data" => Carbon::parse($agenda->date)->format('d-m-Y'),
                "hora" => $agenda->hour,
                "vagas" => $agenda->vacancy,
                "vagas_preenchidas" => $agenda->filled,
            ];

            /*  */
        });

        return response()->json($agendas);
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            "data" => "required",
            "hora" => "required",
        ]);

        $dateRaw = $request->data;

        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dateRaw)) {
            $carbonDate = Carbon::createFromFormat('d/m/Y', $dateRaw);
        } elseif (preg_match('/^\d{4}-\d{2}-\d{2}$/', $dateRaw)) {
            $carbonDate = Carbon::createFromFormat('Y-m-d', $dateRaw);
        } elseif (preg_match('/^\d{4}\/\d{2}\/\d{2}$/', $dateRaw)) {
            $carbonDate = Carbon::createFromFormat('Y/m/d', $dateRaw);
        } elseif (preg_match('/^\d{2}-\d{2}-\d{4}$/', $dateRaw)) {
            $carbonDate = Carbon::createFromFormat('d-m-Y', $dateRaw);
        } else {
            return response()->json(["error" => "Formato de data inválido."], 422);
        }

        $dateForQuery = $carbonDate->format('d-m-Y');

        $agenda = Agenda::where('date', $dateForQuery)
            ->where('hour', $request->hora)
            ->first();

        if (!$agenda) {
            return response()->json(["error" => "Horário não encontrado."], 404);
        }

        if ($agenda->vacancy <= $agenda->filled) {
            return response()->json(["error" => "Sem vagas para esse horário."], 400);
        }

        $agenda->filled += 1;
        $agenda->save();

        return response()->json(["agenda", $agenda], 200);
    }
}
