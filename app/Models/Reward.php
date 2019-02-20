<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use SoftDeletes;
    protected $table = 'rewards';
    protected $fillable = [
        'title',
        'reward_type_id',
        'description',
        'points',
        'image',
        'active_status'
    ];

    public static function getAllRewards()
    {
        return Self::with('managers')->get();
    }

    public static function createNewReward($request)
    {
        //dd($request);
        if( $request->file('rewardimage')->isValid() ) {
            $file = $request->rewardimage;
            $ext = strtolower( $request->rewardimage->extension() );
        } else {
            dd($request);
        }
        
        $directory = public_path() . '/uploads/rewards';
        $hash = md5(uniqid(rand(), true));
        $filename  = $hash . "." . $ext;
        //move and rename file
        $upload_success = $request->file('rewardimage')->move($directory, $filename); 
        
        if ($upload_success) {
            $reward = Reward::create([
                'title' => $request->title,
                'reward_type_id' => $request->reward_type_id,
                'description' => $request->description,
                'points' => $request->points,
                'image' => $filename,
                'active_status' => 1
            ]);
        }
        return $reward;
    }

    public static function updateReward($request, $id)
    {
        $reward = Reward::find($id);
        $old_image = $reward->image;

        if( $request->file('rewardimage')->isValid() ) {
            $file = $request->rewardimage;
            $ext = strtolower( $request->rewardimage->extension() );
            $directory = public_path() . '/uploads/rewards';
            $hash = md5(uniqid(rand(), true));
            $filename  = $hash . "." . $ext;
            //move and rename file
            $upload_success = $request->file('rewardimage')->move($directory, $filename);
            $image = $filename; //send this to the updaate array
            if($reward->image){ //if there was an old image...
                unlink(public_path().'/uploads/rewards/' . $old_image); //delete the old file.             
            }
        } else {
            $image = $old_image; //just put the old one back.
        }

        $reward->update([
                'title' => $request->title,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'points' => $request->points,
                'image' => $image,
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
