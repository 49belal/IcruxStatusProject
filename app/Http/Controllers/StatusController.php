<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function ProjectList()
    {
        $ProjectList = DB::select('select * from project_details');
        return view('ProjectList',['ProjectList'=>$ProjectList]);
    }

    public function CreateProject()
    {
        return view('CreateProject');
    }

    public function NewProject(Request $request)
    {

        $client_name = $request->input('client_name');
        $project_lead = $request->input('project_lead');
        $resource_name = $request->input('resource_name');
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $description = $request->input('description');

        $data=array('client_name'=>$client_name,"project_lead"=>$project_lead,"resource_name"=>$resource_name,"priority"=>$priority,'start_date'=>$start_date,'end_date'=>$end_date,'description'=>$description);
        DB::table('project_details')->insert($data);

        $ProjectList = DB::select('select * from project_details');
        return view('ProjectList',['ProjectList'=>$ProjectList]);
    }
}
