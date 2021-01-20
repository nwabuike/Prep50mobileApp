<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\UserSubject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
// use Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validation
       $validData = Validator::make($request->all(),[
        'firstname' => 'required|max:55',
        'lastname' => 'required|max:55',
        
        'phone' => 'required|max:11|unique:users',
        // 'dateReg' => 'required',
        'gender' => 'required',
        //'password' => 'required',
        // 'img' => 'required',
        // 'totalCoinsAccrued' => 'required',
        // 'totalCurrentCoin' => 'required',
        'email' => 'required|max:55|unique:users',
        'subj1' => 'required',
        'subj2' => 'required',
        'subj3' => 'required',
        'subj4' => 'required',
       ]);
       $suj4 = $request->subj1;
       $user_subject = [
        // 'user_id' => Auth::id(),
        'subj1' => $request->subject_id,
        'subj2' => $request->subject_id,
        'subj3' => $request->subject_id,
        'subj4' => $request->subject_id
    ];
       if($validData->fails())
       {
           return response()->json(['error' => $validData->errors()->all() ]);
       }else{
           $validData = $request->all();
        $user = User::create($validData);
        if($user){
            for($b = 1; $b <= 4; $b++){
                $subjId = $request->get('subj'.$b);
                $userSubj = new UserSubject;
                $userSubj->subject_id = $subjId;
                $userSubj->user_id = $user->id;
                $userSubj->save();
                // dump($userSubj);
            }
            $userToken= $user->createToken('accessToken')->accessToken;
            $user->accessToken = $userToken;
            $user->save();
            auth()->login($user,true);
            // return redirect ('');
            return response(['user' => $user, 'userSubj' => $user->subjects]);
        }
       }
       
    }
   
    public function login(Request $request)
    {
        $loginData = Validator::make($request->all(),[
            
            'phone' => 'required|max:11'
             ]);
           if($loginData->fails())
           {
               return response()->json(['error' => $loginData->errors()->all() ]);
           }else{
              
               $loginData = $request->all();
               $user = User::where($loginData)->with('activities')->first();
               if($user == null){
                   return response(['message' => 'Invalid Phone Number...']);
               }
               return response(['user' => $user, 'userSubj' => $user->subjects]);
           }
        //validation
        // $loginData = $request->validate([
        //     // 'regNum' => 'required|min:10|max:10'
        //     'phone' => 'required|min:11|max:11'
        // ]);

        // if(!auth()->attempt($loginData)){
        //     return response(['message' => 'Invalid credentials']);
        // }

        // $accessToken = auth()->user()->createToken('authToken')->accessToken;

        // return response(['user'=>auth()->user(), 'access_token'=>$accessToken]);
        // $user = User::where($loginData)->with('poly', 'uni', 'state', 'department', 'activities')->first();
        // $user = User::where($loginData)->with('activities')->first();
        // if($user == null){
        //     return response(['message' => 'Invalid credentials']);
        // }
        // $accessToken = $user->createToken('authToken')->accessToken;

        // return response(['user'=>$user, 'access_token'=>$accessToken]);


    }
    public function getDetails()
        {
            return response()->json(['success' => Auth::user()]);
        }
}
