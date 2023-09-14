<?php

namespace App\Http\Controllers;
use DB;
use Auth;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function resourcedetails(Request $request)
    {

        return view('home');
    }

    public function tasklist(Request $request)
    {
        $email= Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email'");

     return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskCompleted(Request $request)
    {
        $email= Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='Completed'");

     return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskInprogress(Request $request)
    {
        $email= Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='InProgress'");

     return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskOnhold(Request $request)
    {
        $email= Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='OnHold'");

     return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }
}
