<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'unique_name',
        'description',
        'logo',
        'logo2',
        'banner',
        'address1',
        'address2',
        'city',
        'province',
        'postal_code',
        'phone1',
        'phone2'
    ];

    public function managers()
    {
    	return $this->hasMany('App\Models\Client\ClientManager');
    }


    public static function getAllClients()
    {
    	return Self::with('managers')->get();
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

    public static function createNewClient($request)
    {
        Self::initCloudinary();

        $logo1 = $request->file('clientimage');
        $logo2 = $request->file('clientimage2');
        $banner = $request->file('bannerimage');

        $logo1upload = \Cloudinary\Uploader::upload($logo1);
        $banner = \Cloudinary\Uploader::upload($banner);
        if($logo2){
            $logo2upload = \Cloudinary\Uploader::upload($logo2);
        }

        if ($logo1upload && $banner) {
            $client = [
                'name' => $request->name,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'logo' => "v" . $logo1upload['version'] . "/" . $logo1upload['public_id'] . "." . $logo1upload['format'],
                'banner' => "v" . $banner['version'] . "/" . $banner['public_id'] . "." . $banner['format'],
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'province' => $request->province,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2
            ];

            if (isset($logo2upload)) {
                $client['logo2'] = "v" . $logo2upload['version'] . "/" . $logo2upload['public_id'] . "." . $logo2upload['format'];
            }

            Client::create($client);
        }
        // return $client;
        return redirect()->to('/admin/clients');
    }

    public static function updateClient($request)
    {
        $client = Client::find($request->clientId);

        $old_image = $client->logo;

        if($request->file('logo')){ //image is not null, therefore, we are update it too..
            if( $request->file('logo')->isValid() ) {
                $file = $request->logo;
                $ext = strtolower( $request->logo->extension() );
                $directory = public_path() . '/uploads/clients';
                $hash = md5(uniqid(rand(), true));
                $filename  = $hash . "." . $ext;
                //move and rename file
                $upload_success = $request->file('logo')->move($directory, $filename);
                $image = $filename; //send this to the updaate array
                if($client->logo){ //if there was an old image...
                    unlink(public_path().'/uploads/clients/' . $old_image); //delete the old file.
                }
            } else {
                $image = $old_image; //just put the old one back.
            }
            $client->update([
                'name' => $request->company_name,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'logo' => $image,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'province' => $request->province,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2
            ]);
        } else { //no image update, just update the text fields
            $client->update([
                'name' => $request->company_name,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'province' => $request->province,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2
            ]);
        }

        return $client;
    }

    public static function getClientById($id)
    {
        return Client::with('managers')->find($id);
    }

    public static function deleteClient($id)
    {
        return Client::find($id)->delete();
    }
}
