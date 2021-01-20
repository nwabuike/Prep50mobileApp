<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\TokenGenerator;

class TokenGeneController extends Controller
{
    //
    public function store(Request $request)
    {
        //validation
       $validData = Validator::make($request->all(),[
        'token' => 'required',
        'status' => 'required',
       ]);
       if($validData->fails())
       {
           return response()->json(['error' => $validData->errors()->all() ]);
       }else{
           $validData = $request->all();
        $token = TokenGenerator::create($validData);
        $token->save();
        return response(['token' => $token]);
       }
       
    }
}
