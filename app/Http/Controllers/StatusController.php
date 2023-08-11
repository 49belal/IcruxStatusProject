<?php

namespace App\Http\Controllers;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require 'PHPMailer-master/src/Exception.php';
// require 'PHPMailer-master/src/PHPMailer.php';
// require 'PHPMailer-master/src/SMTP.php';

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

        $ProjectList = DB::select("select * from project_details where project_key=$project_key");
        //  dd($ProjectList);
        $project_key = $ProjectList[0]->project_key;
        $client_name = $ProjectList[0]->client_name;
        $project_lead = $ProjectList[0]->project_lead;
        $priority = $ProjectList[0]->priority;
        $description = $ProjectList[0]->description;

        $mail = new PHPMailer();
        // $nameA= strtok($namef, " ");
        $msg = "<p>Hi ".$resource_name.",</p>
        <p>Here is your new Task Details:</p>
        <p>Client Name  : ".$client_name."</p>
        <p>Project Lead : ".$project_lead."</p>
        <p>Priority  : ".$priority."</p>
        <p>Description  : ".$description."</p>";
        // dd($msg);
        $mail->IsSMTP();
        // $mail->SMTPDebug=1;
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.office365.com";
        $mail->Username = "belalahmad664664@outlook.com";
        $mail->Password = "Bahmad8097";
        $mail->IsHTML(true);
        $mail->From = "belalahmad664664@outlook.com";
        $mail->FromName = "Belal Ahmad";
        $mail->Sender = "belalahmad664664@outlook.com";
        $mail->Subject = "Task details";
        $mail->MsgHTML($msg);
        $mail->addAddress($resource_email);
        //  dd($mail);
        if ($mail->send()) {


        $ProjectList = DB::select('select * from project_details');
        return view('ProjectList',['ProjectList'=>$ProjectList]);
        }
    }

    public function ViewResource(string $project_key)
    {

        $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
        return view('ResourceList',['ResourceList'=>$ResourceList]);
    }




}
