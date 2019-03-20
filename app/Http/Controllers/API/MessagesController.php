<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Message;
use App\Models\MessageUser;
use App\Models\Follower;
use Carbon\Carbon;
use App\Utility;
use App\Models\Client;

class MessagesController extends Controller
{

    public function index(Request $request)
    {
        $messages = MessageUser::where('user_id', $request->user_id)->orderByDesc('created_at')->get()
                            ->each(function ($message) {
                                $messageDetail = Message::find($message->message_id);
                                $message->subject = $messageDetail->subject;
                                $message->trunc_body = Utility::truncateHtml(strip_tags($messageDetail->body));
                                
                                $message->prettyCreatedAt = Utility::getTimePastSinceToday($message->created_at);
                                $message->client = Client::where('id', $messageDetail->brand_id)
                                 ->select('name', 'logo')
                                 ->first();
                            });
        return ($messages);
    }

    public function show(Request $request)
    {
        $message = Message::where('messages.id', $request->message_id)
                    ->join('brands', 'brands.id', '=', 'messages.brand_id')
                    ->get();
        return ($message);
    }

    public function delete(Request $request)
    {
        $message = MessageUser::where('message_id', $request->message_id)
                                ->where('user_id', $request->user_id)
                                ->delete();
        if ($message){
            $data=['status'=>'1','msg'=>'success'
            ];
        } else {
            $data=['status'=>'0','msg'=>'user/message was not found'];
        }

        return response()->json($data);
    }
}


