<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeType extends Model
{
    use SoftDeletes;
    protected $table = 'challenge_types';
    protected $fillable = ['type', 'points'];

    public static function createNewMissionType($request)
    {
        $mission_type = Self::create([
            'type' => $request->type,
            'points' => $request->points,
        ]);
        return redirect()->to('/admin/missiontypes');
    }

    public static function getMissionTypeById($id)
    {
        return Self::find($id);
    }

    public static function updateMissionType($request)
    {
        $mission_type = Self::find($request->mission_type_id);
        $mission_type->update([
            'type' => $request->type,
            'points' => $request->points,
        ]);
        return redirect()->to('/admin/missiontypes');
    }

    public static function deleteMissionType($id)
    {
        $mission_type = Self::find($id);
        $mission_type->delete();
    }
}
