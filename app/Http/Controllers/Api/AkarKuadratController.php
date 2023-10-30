<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AkarKuadrat;
use Illuminate\Http\Request;

class AkarKuadratController extends Controller
{
    public function hitungAkarKuadrat(Request $request)
    {
        if ($request->number < 0) {
            return response()->json(['error' => 'Angka Tidak Boleh Negatif'], 400);
        }

        if(!is_numeric($request->number)){
            return response()->json(['error' => 'Input Tidak Boleh String'], 400);
        }

        if ($request->number > 999999) {
            return response()->json(['error' => 'Angka Melebihi Batas Float'], 400);
        }

        $start = microtime(true);

        $result = sqrt($request->number);

        $end = microtime(true);
        $executionTime = round($end - $start, 2);

        AkarKuadrat::create([
            'user' => $request->user,
            'number' => $request->number,
            'akarkuadrat' => $result,
            'excecution' => $executionTime
        ]);

        return response()->json(['result' => $result]);
    }
}
