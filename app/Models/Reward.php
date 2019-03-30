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
        $cloud = config('services.cloudinary.cloud_name');
        \Log::info( config('services.cloudinary') );
        \Log::info( "here is something else: " .  $cloud );

        \Cloudinary::config(array(
          "cloud_name" => $cloud,
          "api_key" => config('services.cloudinary.api_key'),
          "api_secret" => config('services.cloudinary.api_secret')
        ));

        $pic = $request->file('rewardimage');
        $upload = \Cloudinary\Uploader::upload($pic);

        if ($upload) {
            $reward = Reward::create([
                'title' => $request->title,
                'reward_type_id' => $request->reward_type_id,
                'description' => $request->description,
                'points' => $request->points,
                'image' => $upload['url'],
                'active_status' => 1
            ]);
        }
        return redirect()->to('/admin/rewards');
    }

    public static function updateReward($request)
    {
        $reward = Reward::find($request->rewardId);

        $old_image = $reward->image;

        if($request->file('image')){ //image is not null, therefore, we are update it too..
            if( $request->file('image')->isValid() ) {
                $file = $request->image;
                $ext = strtolower( $request->image->extension() );
                $directory = public_path() . '/uploads/rewards';
                $hash = md5(uniqid(rand(), true));
                $filename  = $hash . "." . $ext;
                //move and rename file
                $upload_success = $request->file('image')->move($directory, $filename);
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
            ]);
        } else { //no image update, just update the text fields
            $reward->update([
                'title' => $request->title,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'points' => $request->points,
            ]);
        }

        return $reward;
    }

    public static function toggleStatus($id, $state)
    {
        $reward = Reward::find($id);

        $reward->update([
            'active_status' => $state
        ]);

        return $reward;
    }

    public static function getRewardById($id)
    {
        return Reward::find($id);
    }

    public static function deleteReward($id)
    {
        return Reward::find($id)->delete();
    }
}
