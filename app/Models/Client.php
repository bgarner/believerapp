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

    public static function createNewClient($request)
    {
        if( $request->file('clientimage')->isValid() ) {
            $file = $request->clientimage;
            $ext = strtolower( $request->clientimage->extension() );
        } else {
            dd($request);
        }

        $directory = public_path() . '/uploads/clients';
        $hash = md5(uniqid(rand(), true));
        $filename  = $hash . "." . $ext;
        //move and rename file
        $upload_success = $request->file('clientimage')->move($directory, $filename);

        if ($upload_success) {
            $client = Client::create([
                'name' => $request->name,
                'unique_name' => $request->unique_name,
                'description' => $request->description,
                'logo' => $filename,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'province' => $request->province,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2
            ]);
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
