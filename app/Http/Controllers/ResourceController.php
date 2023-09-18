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
        $email = Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email'");

        return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskCompleted(Request $request)
    {
        $email = Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='Completed'");

        return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskInprogress(Request $request)
    {
        $email = Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='InProgress'");

        return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function TaskOnhold(Request $request)
    {
        $email = Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email' && status='OnHold'");

        return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }


    public function EdittaskDetails(Request $request)
    {

        $resource_key = $request['resource_key'];
        $client_name = $request['client_name'];
        $project_lead = $request['project_lead'];
        $task_description = $request['task_description'];
        $status = $request['status'];

        return view('EditTask', ['resource_key' => $resource_key, 'client_name' => $client_name, 'project_lead' => $project_lead, 'task_description' => $task_description, 'status' => $status]);
    }

    public function EditTask(Request $request)
    {
        $resource_key = $request->input('resource_key');
        $client_name = $request->input('client_name');
        $project_lead = $request->input('project_lead');
        $status = $request->input('status');
        $remarks = $request->input('remarks');

        DB::update("UPDATE resource_details SET status = '$status', remarks= '$remarks' WHERE resource_key = $resource_key ;");


        $email = Auth::user()->email;

        $resourcedetails = DB::select("select rd.*,pd.* from resource_details rd
                inner join project_details pd on rd.project_key=pd.project_key
                where resource_email='$email'");

        return view('TaskList', ['resourcedetails' => $resourcedetails]);
    }

    public function Resourcefeedbacklist()
    {
        $email = Auth::user()->email;
        $FeedbackList =DB::select("select fd.*,rd.*,pd.* from feedback fd
        inner join resource_details rd on rd.resource_key=fd.resource_key
        inner join project_details pd on rd.project_key=pd.project_key
        where resource_email='$email'");
    //    dd($FeedbackList);
        return view('FeedbackList', ['FeedbackList' => $FeedbackList]);
    }

}
