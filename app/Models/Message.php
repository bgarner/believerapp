<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use App\Utility;

class Message extends Model
{
    use SoftDeletes;
    protected $table = 'messages';
    protected $fillable = ['brand_id', 'subject', 'body', 'action'];

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

    public static function createNewMessage($request)
    {
        // dd($request->brand_id);
        $message = Message::create([
            'brand_id' => $request->brand_id,
            'subject' => $request->subject,
            'body' => $request->body,
            'action' => 'whatever'
            //'action' => $request->action
        ]);
    }

    public static function getMessagesByClient($id)
    {
        return Message::where('brand_id', $id)->get()
                    ->each(function ($item) {
                        $item->trunc_body = Utility::truncateHtml(strip_tags($item->body));
                    });
    }

    public static function getMessageById($id)
    {
        return Message::find($id);
    }
}
