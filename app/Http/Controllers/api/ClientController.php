<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\User;
use App\Models\Brand;
use App\Models\Follower;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        //match the first char of the postal code to brands with the same first char
        // GET http://localhost:8000/api/v1/clients
        // {
        //     "user_id": 123   
        // }
        $user = User::find($request->user_id);
        $user_postal_code_fragment = substr($user->postal_code, 0, 1) . '%';
        return Brand::where('postal_code','like',$user_postal_code_fragment)->get();        
    }

    public function show(Request $request)
    {
        //GET http://localhost:8000/api/v1/clients/1
        // {
        //     "id": 1,
        // }
        return Brand::find($request->id);
    }

    public function follow(Request $request)
    {
        // POST http://localhost:8000/api/v1/clients/follow
        // {
        //     "user": 32,
        //     "client": 11
        // }
        $checkFollow = Follower::where('user_id','=',$request->user)
                                ->where('brand_id','=',$request->client)
                                ->get();
        
        if(count($checkFollow)) {
            return 'already followed';
        } else {
            $follow = new Follower(['brand_id' => $request->client, 'user_id' => $request->user]);
            $follow->save();
            return $follow->updated_at;
        }
    }

    public function refer(Request $request)
    {

    }

    public function share(Request $request)
    {

    }
}
