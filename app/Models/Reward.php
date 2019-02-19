<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use SoftDeletes;
    protected $table = 'rewards';
    protected $fillable = [
        'reward_type_id',
        'title',
        'description',
        'points',
        'active_status'
    ];

    public static function getAllRewards()
    {
        return Self::with('managers')->get();
    }

    public static function createNewReward($request)
    {
        $reward = Reward::create([
                    'title' => $request->title,
                    'unique_name' => $request->unique_name,
                    'description' => $request->description,
                    'points' => $request->points,
                    'active_status' => $request->active_status
                ]);
        return $reward;
    }

    public static function updateReward($request, $id)
    {
        $reward = Reward::find($id);
        $reward->update([
                'title' => $request->title,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'points' => $request->points,
                'active_status' => $request->active_status
            ]);

        return $reward;
    }

    public static function getRewardById($id)
    {
        return Reward::find($id);
    }

    public function deleteReward($id)
    {
        return Reward::find($id)->delete();
    }
}
