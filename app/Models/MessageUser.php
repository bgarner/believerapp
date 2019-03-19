<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageUser extends Model
{
    use SoftDeletes;
    protected $table = 'message_user';
    protected $fillable = ['message_id', 'user_id'];

    public static function publishMessage($message, $audience)
    {
        foreach($audience as $user){
            MessageUser::create(['message_id' => $message, 'user_id' => $user]);
        }
    }
}
