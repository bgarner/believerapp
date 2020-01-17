<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Fav;

class FavController extends Controller
{
    public $ip;

    public function __construct(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
    }
    
    public function index(Request $request)
    {
        \Log::info('API\FavController@index: ' . PHP_EOL .
        "IP: " . $this->ip . PHP_EOL . 
        $request . 
        PHP_EOL . " -------------");

        return Fav::getFavsByUserId($request->user_id);
    }

    public function create(Request $request)
    {
        \Log::info('API\FavController@create: ' . PHP_EOL .      
        "IP: " . $this->ip . PHP_EOL . 
        $request . 
        PHP_EOL . " -------------");

        $fav = Fav::create([
            'user_id' => $request->user_id,
            'mission_id' => $request->mission_id
        ]);

        return ($fav);
    }

    public function delete(Request $request)
    {
        \Log::info('API\FavController@delete: ' . PHP_EOL .
        "IP: " . $this->ip . PHP_EOL . 
        $request . 
        PHP_EOL . " -------------");

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
