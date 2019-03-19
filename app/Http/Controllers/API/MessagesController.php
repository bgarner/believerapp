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

class MessagesController extends Controller
{

    public function index(Request $request)
    {
        $messages = MessageUser::where('user_id', $request->user_id)->get()
                            ->each(function ($message) {
                                $messageDetail = Message::find($message->message_id);
                                $message->subject = $messageDetail->subject;
                                $message->trunc_body = Utility::truncateHtml(strip_tags($messageDetail->body));
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

    }
}


