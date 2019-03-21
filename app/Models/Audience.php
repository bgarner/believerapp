<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AudienceMember;

class Audience extends Model
{
    use SoftDeletes;
    protected $table = 'audiences';
    protected $fillable = ['brand_id','name'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public static function getAudiencesByBrand($id)
    {
        $audiences = Self::where('brand_id', $id)->get();

        foreach ($audiences as $audience){
            $memberCount = AudienceMember::where('audience_id', $audience->id)->count();
            $audience->count = $memberCount;
        }

        return $audiences;
    }

    public static function getAudience($id)
    {
        $audience = Self::find($id);
        return $audience;
    }

    public static function getAudienceMemberIds($audience_id)
    {
        $audience = AudienceMember::where('audience_id', $audience_id)->pluck('believer_id');
        return $audience;
    }

    public static function createNewAudience($request)
    {
        $audience = Self::create([
            'name' => $request->audience_name,
            'brand_id' => $request->client_id,
        ]);
        return redirect()->to('/client/believers/audiences');
    }
}
