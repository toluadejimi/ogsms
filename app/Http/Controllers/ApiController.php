<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function get_balance(request $request)
    {

        $bal = User::where('api_key', $request->api_key)->first()->wallet ?? null;


        if($request->api_key == null){

            return response()->json([
                'status' => false,
                'message' => "Api key is missing"
            ], 422);

        }

        if($request->action == null){

            return response()->json([
                'status' => false,
                'message' => "state can not be null"
            ], 422);

        }


        if($bal != null && $request->action == "balance"){

            return response()->json([
                'status' => true,
                'main_balance' => $bal
            ], 200);

        }

        return response()->json([
            'status' => false,
            'message' => "Wrong or incorrect api key"
        ], 422);


    }


}
