<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fav;

class FavController extends Controller
{
    public function index(Request $request)
    {
        return Fav::getFavsByUserId($request->user_id);
    }

    public function create(Request $request)
    {
        $fav = Fav::create([
            'user_id' => $request->user_id,
            'mission_id' => $request->mission_id
        ]);

        return ($fav);
    }

    public function delete(Request $request)
    {
        $fav = fav::where('user_id', $request->user_id)
                        ->where('mission_id', $request->mission_id)
                        ->delete();
        if ($fav){
            $data=['status'=>'1','msg'=>'success'
            ];
        } else {
            $data=['status'=>'0','msg'=>'fav was not found'];
        }

        return response()->json($data);
    }

}
