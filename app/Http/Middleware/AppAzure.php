<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

use RootInc\LaravelAzureMiddleware\Azure as Azure;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use DB;

use Auth;

use App\Models\User;

class AppAzure extends Azure
{
    protected function success(Request $request, $access_token, $refresh_token, $profile)
    {

        $graph = new Graph();
        $graph->setAccessToken($access_token);

        $graph_user = $graph->createRequest("GET", "/me")
                      ->setReturnType(Model\User::class)
                      ->execute();

        $email = strtolower($graph_user->getUserPrincipalName());

        $user = User::updateOrCreate(['email' => $email], [
            'name' => $graph_user->getGivenName() . ' ' . $graph_user->getSurname(),

        ]);
        $User = DB::select("select id from users where email='$email'");
        if(!empty($User)){
            $type = DB::select("select type from users where email='$email'");
            $role= $type[0]->type;

            //User Role
        if($role==0){
            Auth::login($user, true);
            $ProjectKey = DB::select("select project_key from resource_details where resource_email='$email'");
             // $projectkey = $ProjectKey[0]->project_key;
            // dd($ProjectKey);
            // $userdetails = DB::select("select * from project_details where project_key='$projectkey'");
            return view('home',['userdetails'=>$ProjectKey]);

            // return redirect()->route('resourcedetails');

            //Admin Role
        }elseif($role==1){
            Auth::login($user, true);
            return view ("adminHome");

            //Super-Admin Role
        }elseif($role==2){
            Auth::login($user, true);
            return view ("managerHome");
        }elseif($role==3){
            Auth::login($user, true);
            return view ("TeamLeadHome");
        }
        }else{
            dd("User is not Exist");
        }
    }
}
