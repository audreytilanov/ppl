<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Models\AkarKuadrat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AkarKuadratGolang;
use App\Models\AkarKuadratSql;
use Illuminate\Support\Facades\Auth;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->json([
                'success' => false,
                'message' => "Invalid Credentials"
            ], 400);
        }else{
            $token = JWTAuth::attempt($credentials);

            return response()->json([
                'success' => true,
                'tokens' => $token,
            ]);
        }
    }

    public function getMe(Request $request)
    {
        if(Auth::user()){
            return response()->json([
                'success' => true,
                'message' => "Data User",
                'data' => User::find(Auth::id()),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Not Authorized',
            ], 400);
        }
    }

    public function getPlSql(){
        try{
            $record =  AkarKuadratSql::orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => "Data Perhitungan PL SQL",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function getGolang(){
        try{
            $record =  AkarKuadratGolang::orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => "Data Perhitungan Golang",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function getPlSqlByNim(){
        try{
            $record =  AkarKuadratSql::where('user', Auth::user()->name)->orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => "Data Perhitungan Berdasarkan NIM PL SQL",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function getGolangByNim(){
        try{
            $record =  AkarKuadratGolang::where('user', Auth::user()->name)->orderBy('id', 'DESC')->get();

            return response()->json([
                'success' => true,
                'message' => "Data Perhitungan Berdasarkan NIM Golang",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function aggregatePlSqlByNim(){
        try{
            $record =  AkarKuadratGolang::where('user', Auth::user()->name)->selectRaw('COUNT(*) as count, AVG(excecution) as avg, MAX(excecution) as max, MIN(excecution) as min')
            ->first();

            return response()->json([
                'success' => true,
                'message' => "Data Aggregate Berdasarkan NIM PL SQL",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function aggregateGolangByNim(){
        try{
            $record =  AkarKuadratGolang::where('user', Auth::user()->name)->selectRaw('COUNT(*) as count, AVG(excecution) as avg, MAX(excecution) as max, MIN(excecution) as min')
            ->first();

            return response()->json([
                'success' => true,
                'message' => "Data Aggregate Berdasarkan NIM Golang",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function aggregatePlSql(){
        try{
            $record =  AkarKuadratSql::selectRaw('COUNT(*) as count, AVG(excecution) as avg, MAX(excecution) as max, MIN(excecution) as min')
            ->first();

            return response()->json([
                'success' => true,
                'message' => "Data Aggregate Berdasarkan NIM PL SQL",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

    public function aggregateGolang(){
        try{
            $record =  AkarKuadratGolang::selectRaw('COUNT(*) as count, AVG(excecution) as avg, MAX(excecution) as max, MIN(excecution) as min')
            ->first();

            return response()->json([
                'success' => true,
                'message' => "Data Aggregate Berdasarkan NIM Golang",
                'data' => $record

            ]);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => $e
            ], 400);
        }
    }

}
