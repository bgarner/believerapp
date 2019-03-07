<?php

namespace App;

use App\User;
use App\Models\UserGroup;
use App\Models\ClientUser;

class Stats
{

    public function __construct()
    {
    }

    public static function clientStats($id)
    {
        //for a brand, we want to know...
        //how many followers
        $followers = count(ClientUser::getFollowers($id));

        //how many points have been awarded

        //how many challenges have been completed

        $stats = array(
            "follower_count" => $followers,
            "Ben"=>"37",
            "Joe"=>"43"
        );
        return $stats;

    }

}
