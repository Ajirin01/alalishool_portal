<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Cookie;

class AuthController extends Controller
{
    public function user(){
        return Auth::user();
    }

    public function register(Request $request){
        $created_users = [];
        foreach ($request->all() as $index => $user) {
            try {
                $create_user =  User::create(['name'=> $user['name'],
                                'email'=> $user['email'],
                                'phone'=> $user['phone'],
                                'role'=> $user['role'],
                                'password'=> Hash::make($user['password'])
                                ]);
                array_push($created_users, $create_user);
            } catch (\Throwable $th) {
                array_push($created_users, ['message'=> 'error', 'errorInfo'=> $th]);
            }
        }
        return response()->json(['message'=> 'Record successfully created!', 'data'=> $created_users], status:Response::HTTP_CREATED);
        
    }
    

    public function login(Request $request){
        // return $request->header('Api-Key');
        if(!Auth::attempt(['email'=> $request->input(key: 'email') , 'password'=> $request->input(key: 'password')])){
            return response()->json(['message'=> 'Invalid credentials', 'user'=> null], status:Response::HTTP_UNAUTHORIZED);
        }else{
            $user = Auth::user();

            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24); // 1 day

            return response()->json(['message'=> 'login successful', 'user'=> $user], status:Response::HTTP_OK)->withCookie($cookie);
        }
    }

    public function logout(Request $request){
        $cookie = Cookie::forget('jwt');
        return response()->json(['message'=> 'Logout successful'], status:Response::HTTP_OK)->withCookie($cookie);

    }

    public function updateUser(Request $request, $id){
        $user = User::find($id);

        $data = $request->all();

        if($request->has('password')){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);
        return response()->json(['message'=> 'Record successfully updated!', 'data'=> User::find($id)], status:Response::HTTP_OK);
    }
}
