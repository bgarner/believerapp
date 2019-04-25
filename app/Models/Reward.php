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

    public static function initCloudinary()
    {
        $cloud = config('services.cloudinary.cloud_name');
        \Cloudinary::config(array(
          "cloud_name" => $cloud,
          "api_key" => config('services.cloudinary.api_key'),
          "api_secret" => config('services.cloudinary.api_secret')
        ));
    }

    public static function getAllRewards()
    {
        return Self::with('managers')->get();
    }

    public static function createNewReward($request)
    {

        Self::initCloudinary();

        $pic = $request->file('rewardimage');
        $upload = \Cloudinary\Uploader::upload($pic);

        if ($upload) {
            $reward = Reward::create([
                'title' => $request->title,
                'reward_type_id' => $request->reward_type_id,
                'description' => $request->description,
                'points' => $request->points,
                'image' => "v" . $upload['version'] . "/" . $upload['public_id'] . "." . $upload['format'],
                'active_status' => 1
            ]);
        }
        return redirect()->to('/admin/rewards');
    }

    public static function updateReward($request)
    {
        $reward = Reward::find($request->rewardId);
        $old_image = $reward->image;

        if($request->file('rewardimage')){ //image is not null, therefore, we are update it too..
            if( $request->file('rewardimage')->isValid() ) {

                Self::initCloudinary();
                $pic = $request->file('rewardimage');
                $upload = \Cloudinary\Uploader::upload($pic);  // do the upload
                if ($upload) {
                    $reward = Reward::create([
                        'title' => $request->title,
                        'description' => $request->description,
                        'points' => $request->points,
                        'image' => "v" . $upload['version'] . "/" . $upload['public_id'] . "." . $upload['format'],
                        'active_status' => 1
                    ]);
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
