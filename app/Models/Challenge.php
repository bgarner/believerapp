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
    protected $fillable = ['name', 'content', 'image', 'start', 'end', 'brand_id', 'created_by', 'is_draft', 'points', 'challenge_type'];


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

    public static function createNewMission($request)
    {
        if( $request->file('missionimage')->isValid() ) {
            $file = $request->missionimage;
            $ext = strtolower( $request->missionimage->extension() );
        }

        $directory = public_path() . '/uploads/missions';
        $hash = md5(uniqid(rand(), true));
        $filename  = $hash . "." . $ext;
        //move and rename file
        $upload_success = $request->file('missionimage')->move($directory, $filename);

        if ($upload_success) {
            $client = Self::create([
                'name' => $request->name,
                'content' => $request->description,
                'image' => $filename,
                'start' => $request->start,
                'brand_id' => Auth::user()->client_id,
                'created_by' => Auth::user()->id,
                'is_draft' => 0,
                'points' => 100,
                'end' => $request->end,
                'challenge_type' => $request->challenge_type,
            ]);
        }
        // return $client;
        return redirect()->to('/client/missions');
    }

    public static function getMissionById($id)
    {
        return Self::find($id);
    }

}
