<?php

namespace App;

use App\User;
use App\Models\UserGroup;
use App\Models\ClientUser;
use Illuminate\Support\Collection;

class Stats
{

    public function __construct()
    {
    }

    public function clientStats($id)
    {
        //for a brand, we want to know...
        //how many followers
        $followers = ClientUser::getFollowers($client_id);

        //how many points have been awarded

        //how many challenges have been completed

        $collection = collect(['follower_count', $followers], ['something_else', 3]);
        return $collection;

    }

}
