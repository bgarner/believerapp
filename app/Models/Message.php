<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Utility;
use App\Models\Follower;
use App\Models\MessageUser;
use App\Models\Audience;

class Message extends Model
{
    use SoftDeletes;
    protected $table = 'messages';
    protected $fillable = ['brand_id', 'subject', 'body', 'action_title', 'action_url', 'start', 'end'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getUpdatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getDeletedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getStartAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getEndAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public static function createNewMessage($request)
    {
        // dd($request->brand_id);
        $message = Message::create([
            'brand_id' => $request->brand_id,
            'subject' => $request->subject,
            'body' => $request->body,
            'action_title' => $request->action_title,
            'action_url' => $request->action_url,
            'start' => $request->start,
            'end' => $request->end,
        ]);

        \Log::info($request);

        if($request->audience_select === "all"){
            $audience = Follower::getFollowerIds($request->brand_id);
        } else {
            $audience = Audience::getAudienceMemberIds($request->audience_select);
        }

        MessageUser::publishMessage($message->id, $audience);
        return redirect("/client/messages");
    }

    public static function getMessagesByClient($id)
    {
        return Message::where('brand_id', $id)->get()
                    ->each(function ($item) {
                        $item->trunc_body = Utility::truncateHtml(strip_tags($item->body));
                        $item->sendCount = MessageUser::getMessageRecipientCount($item->id);
                    });
    }

    public static function getMessageById($id)
    {
        return Message::find($id);
    }

    public static function deleteMessage($id)
    {
        return Self::find($id)->delete();
    }
}
