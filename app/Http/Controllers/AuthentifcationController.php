<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use JWTAuth;
use Illuminate\Http\Request;

class AuthentifcationController extends Controller
{
    public function login(Request $request){
       $validator=Validator::make($request->all(),
       [
           'email'=>'required|email',
           'password'=>'required'
       ]);
       if($validator->fails()){
           return response()->json($validator->errors(),422);
       }
       if(! $token=JWTAuth::attempt($validator->validated())){
           return response()->json(['error'=>'unhautorized'],401);
       }
       return $this->createNewToken($token);
    }
public function register(Request $request){
    $validator=Validator::make($request->all(),[
        'email'=>'required|string|email|max:100|unique:users',
        'name'=>'required|string|between:2,100',
        'password'=>'required|confirmed',
    ]);
    if($validator->fails()){
        return response()->json(['error'=>$validator->errors()->toJson()],400);
    }
    $user=User::create(array_merge(
        $validator->validated(),
        ['password'=>bcrypt($request->password)]

    ));
    if(! $token=JWTAuth::attempt($request->only('email','password'))){
        return response()->json(['error'=>'unhautorized',401]);
    }
    return $this->createNewToken($token);

}

    protected function createNewToken($token){
return response()->json([
    'access_token'=>$token,
    'token_type'=>'bearer',
    'user'=>auth()->user()
]);
    }
    public function getUser(Request $request){
        return response()->json($request->user());
    }
    public function refresh(){
        return $this->createNewToken(auth()->refresh());
    }

}
