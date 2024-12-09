<?php

namespace App\Http\Controllers;
use App\Models\User; 
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{
// public function register(Request $request){
//    $validator= Validator::make($request->all(),
//     [
//         // "name"=>"required",
//         // "email"=>"required|email",
//         // "password"=>"required"
//     'username' => 'required',
//     'email' => 'required|email|unique:users,email',
//     'password' => 'required'
//     ]
// );
// if($validator->fails()){
//     return response()->json(["message"=>"validator error"],400);
// }
// $data=$request->all();
// $data["password"]=Hash::make($data["password"]);
//  $user=User::create($data);

//  $response['token']=$user->createToken('Auth Token')->plainTextToken;
//  $response['username']=$user->name;
//  return response()->json($response,200);
// }
public function register(Request $request){
   // Validate the incoming request data
   $validator = Validator::make($request->all(), [
        'username' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required'
    ]);

   // If validation fails, return a 400 error with a message
   if ($validator->fails()) {
       return response()->json(["message" => "Validation error", "errors" => $validator->errors()], 400);
   }

   // Retrieve all input data from the request
   $data = $request->all();

   // Map 'username' to 'name' for the User model
   $data['name'] = $data['username'];  // Mapping 'username' to 'name'
   
   // Hash the password before storing it
   $data['password'] = Hash::make($data['password']);

   // Create the new user
   $user = User::create($data);

   // Generate a token for the user
   $response['token'] = $user->createToken('Auth Token')->plainTextToken;
   $response['username'] = $user->name;  // Return the 'name' field which was set from 'username'

   // Return a successful response with the token and username
   return response()->json($response, 200);
}

public function login(Request $request)
{
    // Validate request data first (optional but recommended)
    $credentials = $request->only('email', 'password');

    // Attempt login with credentials (email and password)
    if (Auth::attempt($credentials)) {
        // Login successful, you can return a response or redirect
        return response()->json(['message' => 'Login successful'], 200);
    }

    // Login failed
    return response()->json(['message' => 'Invalid credentials'], 401);
}




public function detail(){
    $user=Auth::user();
    $response['user']=$user;
    return response()->json($response,200);
}
}