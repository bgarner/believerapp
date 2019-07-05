<?php

namespace App\Models;

use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\ChallengeCompletion;

class Challenge extends Model
{
    use SoftDeletes;
    protected $table = 'challenges';
    protected $fillable = ['name', 'content', 'image', 'start', 'end', 'brand_id', 'created_by', 'is_draft', 'points', 'challenge_type', 'share_url'];
    private static $point_value = 100;

    public function getCreatedAtAttribute($timestamp)
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

    public static function initCloudinary()
    {
        $cloud = config('services.cloudinary.cloud_name');
            \Cloudinary::config(array(
            "cloud_name" => $cloud,
            "api_key" => config('services.cloudinary.api_key'),
            "api_secret" => config('services.cloudinary.api_secret')
        ));
    }

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
        Self::initCloudinary();

        $pic = $request->file('missionimage');
        $upload = \Cloudinary\Uploader::upload($pic);

        $start = $request->start;
        $end = $request->end;

        if($request->no_end_date){
            $start = now();
            //$end = "2099-12-31 23:59:59";
            $end = null;
        }

        if ($upload) {
            $client = Self::create([
                'name' => $request->name,
                'content' => $request->description,
                'image' => "v" . $upload['version'] . "/" . $upload['public_id'] . "." . $upload['format'],
                'start' => $start,
                'end' => $end,
                'brand_id' => Auth::user()->client_id,
                'created_by' => Auth::user()->id,
                'is_draft' => 0,
                'points' => self::$point_value,
                'challenge_type' => $request->challenge_type,
                'share_url' => $request->challenge_url,
            ]);
        }
        // return $client;
        return redirect()->to('/client/missions');
    }

    public static function getMissionById($id)
    {
        return Self::find($id);
    }

    public static function updateMission($request)
    {
        $mission = Self::find($request->missionId);

        $old_image = $mission->image;

        if($request->file('missionimage')){ //image is not null, therefore, we are update it too..
            if( $request->file('missionimage')->isValid() ) {
                $file = $request->missionimage;
                $ext = strtolower( $request->missionimage->extension() );
                $directory = public_path() . '/uploads/missions';
                $hash = md5(uniqid(rand(), true));
                $filename  = $hash . "." . $ext;
                //move and rename file
                $upload_success = $request->file('missionimage')->move($directory, $filename);
                $image = $filename; //send this to the updaate array
                if($mission->missionimage){ //if there was an old image...
                    unlink(public_path().'/uploads/missions/' . $old_image); //delete the old file.
                }
            } else {
                $image = $old_image; //just put the old one back.
            }
            $mission->update([
                'name' => $request->name,
                'content' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'image' => $filename,
                'points' => self::$point_value,
                'challenge_type' => $request->challenge_type,
            ]);
        } else { //no image update, just update the text fields
            $mission->update([
                'name' => $request->name,
                'content' => $request->description,
                'start' => $request->start,
                'end' => $request->end,
                'points' => self::$point_value,
                'challenge_type' => $request->challenge_type,
            ]);
        }

        return $mission;
    }

}
