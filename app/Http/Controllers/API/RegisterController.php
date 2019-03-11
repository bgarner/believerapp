<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Follower;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));
    }

    public function registerWithBrand(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'first_name' => 'required',
            'last_name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'post_code' => 'required',
            'city' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'first' => $request->get('first_name'),
            'last' => $request->get('last_name'),
            'email' => $request->get('email'),
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'city' => $request->get('city'),
            'province' => $request->get('province'),
            'post_code' => $request->get('post_code'),
            'password' => bcrypt($request->get('password')),
        ]);
        $token = JWTAuth::fromUser($user);

        $brandFollow = Follower::create([
            'brand_id' => $request->get('brand_id'),
            'user_id' => $user->id;
        ]);
        \Log::info("new user...");
        \Log::info($user)

        return Response::json(compact('token'));
    }

    public function showRegistrationForm()
    {
        return "this is the registrationf form, I guess";
    }
}
