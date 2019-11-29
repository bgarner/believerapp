<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Stats;
use App\Models\Client;
use App\Models\ClientUser;
use App\Models\Audience;
use App\Models\AudienceMember;
use App\Models\Follower;
use App\Models\Challenge as Mission;
use App\Models\AdvocateBulkUpload;
use Auth;
use DB;
use Mail;
use App\Jobs\SendInvitations;

class BelieverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $client_id = Auth::user()->client_id;
        $followers = Follower::getFollowers($client_id);
        foreach($followers as $f){
            $f->mission_count = count(User::getMissionsCompletedByUser($f->id));
            $f->reward_count = count(User::getRewardsClaimedByUser($f->id));
        }

        return view('clients.believers.index')
            ->with('followers', $followers);
    }

    public function create() //show the create form
    {
    }

    public function store(Request $request) //store the resource
    {
    }

    public function show($id) //show a single resource
    {
        $user = User::find($id);
        $stats = Stats::believerStats($id);
        $missions = User::getMissionsCompletedByUser($id);
        $rewards = User::getRewardsClaimedByUser($id);
        return view('clients.believers.show')
                ->with('user', $user)
                ->with('missions', $missions)
                ->with('rewards', $rewards)
                ->with('stats', $stats);
    }

    public function destroy($id) //delete a resource
    {
    }

    public function edit($id) //show the edit form
    {
    }

    public function invite() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        $invitations = AdvocateBulkUpload::where('client_id', $client_id)
                            ->orderBy('batch_date')
                            ->get();
        // $invitations = DB::table('advocate_bulk_uploads')
        //                 ->groupBy('batch_date')
        //                 ->having('client_id', '=', $client_id)
        //                 ->get();

        $grouped = $invitations->groupBy('batch_date');

        return view('clients.believers.invite')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id)
                ->with('invitations', $grouped);
    }

    public function uploadInvites(Request $request)
    {
        $client_id = Auth::user()->client_id;
        request()->validate([
            'csvfile' => 'required|mimes:csv,txt'
        ]);
        $path = $request->file('csvfile')->store('csvfile');
       // $file = \Storage::get($path);
        //$handle = fopen($_SERVER['DOCUMENT_ROOT'] . '/storage/app/' . $path, "r");
        $batch_date = date("F j, Y, g:i a");
        $batch_id = substr(md5(date("Y-m-d H:i:s").rand()), 0, 8);
        $handle = fopen("../storage/app/" . $path, "r");
        $header = false;

        while ($csvLine = fgetcsv($handle, 1000, ",")) {
            if ($header) {
                $header = false;
            } else {
                AdvocateBulkUpload::create([
                    'client_id' => $request->client_id,
                    'batch_id' => $batch_id,
                    'batch_date' => $batch_date,
                    'user_id_uploader' => Auth::user()->id,
                    'first' => $csvLine[0],
                    'last' => $csvLine[1],
                    'email' => $csvLine[2],
                ]);
            }
        }
        //delete the file
        fclose($handle);
        \Storage::delete($path);

        //get the invites
        $invites = AdvocateBulkUpload::where('batch_id', $batch_id)->get();
        $brand = Client::find($request->client_id);

        //do the job
        //SendInvitations::dispatchNow($invites, $brand, $batch_id);
        foreach($invites as $invite){

            \Log::info("\n ---------------------------------");
            \Log::info("sending an email");
            \Log::info($invite->email);

            Mail::send('email.invite', ['first_name' => $invite->first, 'last_name' => $invite->last, 'brandname' => $brand->name, 'brandslug' => $brand->unique_name], function ($message) use ($invite, $brand){
                $message->from('no-reply@believer.io', 'Believer');
                $message->to($invite->email)->subject("You've been invited to join " . $brand->name . " on Believer!");
            });
        }
    }

    public function audiences() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        $audiences = Audience::getAudiencesByBrand($client_id);

        return view('clients.believers.audiences')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id)
                ->with('audiences', $audiences);
    }

    public function createAudience(Request $request)
    {
        return Audience::createNewAudience($request);
    }

    public function showAudience($id)
    {
        $client_id = Auth::user()->client_id;
        $audience = Audience::getAudience($id);
        $followers = Follower::getFollowers($client_id);
        $audience_members = AudienceMember::where('audience_id', $id)->get()
                            ->each(function ($member) {
                                $member->details = User::find($member->believer_id);
                            });
        $missions = Mission::getMissionsByClient();

        return view('clients.believers.audience')
            ->with('audience', $audience)
            ->with('missions', $missions)
            ->with('audience_members', $audience_members)
            ->with('followers', $followers);
    }

    public function addToAudience()
    {

    }
    public function removeFromAudience()
    {

    }
}
