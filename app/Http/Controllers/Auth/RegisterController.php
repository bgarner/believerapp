<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Follower;
use Illuminate\Http\Request;
use Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public static function initCloudinary()
    {
        $cloud = config('services.cloudinary.cloud_name');
            \Cloudinary::config(array(
            "cloud_name" => $cloud,
            "api_key" => config('services.cloudinary.api_key'),
            "api_secret" => config('services.cloudinary.api_secret')
        ));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function registerWithBrand(Request $request)
    {
        Self::initCloudinary();

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users',
            'confirm_email' => 'same:email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'password'=> 'required'
        ]);
        if ($validator->fails()) {
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400);
        }

        $image = $request->file('image');
        $banner = $request->file('banner');
        $imageupload = \Cloudinary\Uploader::upload($image);
        $bannerupload = \Cloudinary\Uploader::upload($banner);


        $user = [
            'name' => $request->get('first_name') . " " . $request->get('last_name'),
            'first' => $request->get('first_name'),
            'last' => $request->get('last_name'),
            'email' => $request->get('email'),
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'city' => $request->get('city'),
            'province' => $request->get('province'),
            'postal_code' => $request->get('postal_code'),
            'password' => bcrypt($request->get('password')),
            'group_id' => 3,
        ];

        if (isset($imageupload)) {
            $user['image'] = "v" . $logo2upload['version'] . "/" . $logo2upload['public_id'] . "." . $logo2upload['format'];
        }
        if (isset($bannerupload)) {
            $user['banner'] = "v" . $logo2upload['version'] . "/" . $logo2upload['public_id'] . "." . $logo2upload['format'];
        }

        User::create($user);

        $brandFollow = Follower::create([
            'brand_id' => $request->get('brand_id'),
            'user_id' => $user->id,
        ]);
        \Log::info("new user...");
        \Log::info($user);

        //return Response::json(compact('token'));
    }
}
