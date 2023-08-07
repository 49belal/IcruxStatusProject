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
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $description = $request->input('description');

        $data=array('client_name'=>$client_name,"project_lead"=>$project_lead,"priority"=>$priority,'start_date'=>$start_date,'end_date'=>$end_date,'description'=>$description);
        DB::table('project_details')->insert($data);

        $ProjectList = DB::select('select * from project_details');
        return view('ProjectList',['ProjectList'=>$ProjectList]);
    }

    public function AddResourceView(string $project_key)
    {

        return view('addresource', compact('project_key'));
    }

    public function AddResource(Request $request)
    {
        $project_key = $request->input('project_key');
        $resource_name = $request->input('resource_name');
        $resource_email = $request->input('resource_email');
        $rating = $request->input('rating');
        $start_resource_date = $request->input('start_resource_date');
        $end_resource_date = $request->input('end_resource_date');
        $remarks = $request->input('remarks');

        $data=array('project_key'=>$project_key,"resource_name"=>$resource_name,"resource_email"=>$resource_email,"rating"=>$rating,'start_resource_date'=>$start_resource_date,'end_resource_date'=>$end_resource_date,'remarks'=>$remarks);
        DB::table('resource_details')->insert($data);

        $ProjectList = DB::select('select * from project_details');
        return view('ProjectList',['ProjectList'=>$ProjectList]);
    }

    public function ViewResource(string $project_key)
    {

        $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
        return view('ResourceList',['ResourceList'=>$ResourceList]);
    }

}
