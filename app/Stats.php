<?php

namespace App;

use Carbon\Carbon;
use App\User;
use App\Models\Follower;
use App\Models\UserGroup;
use App\Models\ClientUser;
use App\Models\Challenge;
use App\Models\ChallengeCompletion;

class Stats
{

    public function __construct()
    {
    }

    public static function clientStats($id)
    {
        //how many followers
        $followers = Follower::getFollowers($id);

        $follower_count = count($followers);
        $new_followers_this_week = count(Follower::getFollowersSince($id, Carbon::now()->subWeek()));
        $leaderboard = $followers->sortByDesc('point_balance')->take(10);

        //missions completed
        $missions = Challenge::where('brand_id', $id)->pluck('id');
        $completions = ChallengeCompletion::whereIn('challenge_id', $missions)->get();
        $mission_completions_this_week = ChallengeCompletion::whereIn('challenge_id', $missions)
                                                ->where('created_at', '>', Carbon::now()->subWeek())
                                                ->get();
        $completions_count = count($completions);
        $mission_completions_this_week_count = count($mission_completions_this_week);

        //current missions
        $active_missions = Challenge::where('brand_id', $id)
                    ->where('start', '<', Carbon::now())
                    ->where('end', '>', Carbon::now())
                    ->count();

        //points
        $all_time_points = Self::getPointTotal($completions);
        $total_points_this_week = Self::getPointTotal($mission_completions_this_week);


        $stats = array(
            "follower_count" => $follower_count,
            "new_followers_this_week" => $new_followers_this_week,
            "leaderboard" => $leaderboard,
            "active_missions" => $active_missions,
            "mission_completions" => $completions_count,
            "mission_completions_this_week" => $mission_completions_this_week_count,
            "total_points" => $all_time_points,
            "total_points_this_week" => number_format($total_points_this_week),
        );
        return $stats;

    }


    static function getPointTotal($completions)
    {
        $point_total = 0;
        foreach($completions as $completion){
            $points = Challenge::where('id', $completion->challenge_id)->pluck('points');
            $points = (int)$points[0];
            $point_total = $point_total + $points;
        }

        return number_format($point_total);
    }


}
