<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\ChallengeCompletion;

class Challenge extends Model
{
    use SoftDeletes;
    protected $table = 'challenges';
    protected $fillable = ['name', 'content', 'start', 'end', 'brand_id', 'created_by', 'is_draft', 'points', 'challenge_type'];


    public static function getMissionsByClient()
    {
        $missions = Self::where("brand_id", Auth::user()->client_id)
                    ->join('challenge_types', 'challenge_types.id', '=', 'challenges.challenge_type')
                    ->select('challenges.*', 'challenge_types.type')
                    ->get();

        foreach($missions as $mission){
            $mission->completion_count = ChallengeCompletion::getCompletionCount($mission->id);
        }

        return $missions;
    }

    public static function deleteMission($id)
    {
        return Self::find($id)->delete();
    }

}
