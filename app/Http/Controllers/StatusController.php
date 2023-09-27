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
        $ProjectList = DB::select('select * from project_details order by project_key DESC');
        return view('ProjectList', ['ProjectList' => $ProjectList]);
    }

    public function CreateProject()
    {
        return view('CreateProject');
    }

    public function NewProject(Request $request)
    {

        $client_name = $request->input('client_name');
        $project_lead = $request->input('project_lead');
        $project_status = $request->input('project_status');
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        // dd($start_date);
        $end_date = $request->input('end_date');
        $description = $request->input('description');

        $data = array('client_name' => $client_name, "project_lead" => $project_lead, "project_status" => $project_status, "priority" => $priority, 'start_date' => $start_date, 'end_date' => $end_date, 'description' => $description);
        DB::table('project_details')->insert($data);

        $ProjectList = DB::select('select * from project_details order by project_key DESC');
        // dd($ProjectList);
        return view('ProjectList', ['ProjectList' => $ProjectList]);

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
        $task_description = $request->input('task_description');
        $start_resource_date = $request->input('start_resource_date');
        $end_resource_date = $request->input('end_resource_date');
        $status = $request->input('status');
        $remarks = $request->input('remarks');

        $data = array('project_key' => $project_key, "resource_name" => $resource_name, "resource_email" => $resource_email, "task_description" => $task_description, 'start_resource_date' => $start_resource_date, 'end_resource_date' => $end_resource_date, 'status' => $status, 'remarks' => $remarks);
        DB::table('resource_details')->insert($data);

        $ProjectList = DB::select("select * from project_details where project_key=$project_key");
        //  dd($ProjectList);
        $project_key = $ProjectList[0]->project_key;
        $client_name = $ProjectList[0]->client_name;
        $project_status = $ProjectList[0]->project_status;
        $project_lead = $ProjectList[0]->project_lead;
        $priority = $ProjectList[0]->priority;
        $description = $ProjectList[0]->description;

        $mail = new PHPMailer();
        // $nameA= strtok($namef, " ");
        $msg = "<p>Hi " . $resource_name . ",</p>
        <p>Here is your new Task Details:</p>
        <p>Client Name  : " . $client_name . "</p>
        <p>Project Lead : " . $project_lead . "</p>
        <p>Priority  : " . $priority . "</p>
        <p>Description  : " . $description . "</p>";
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

        if ($mail->send()) {
            // dd($mail);
            $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
            return view('ResourceList', ['ResourceList' => $ResourceList]);
        }
    }

    public function ViewResource(string $project_key)
    {

        $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
        return view('ResourceList', ['ResourceList' => $ResourceList]);
    }

    public function EditResourceDetails(Request $request)
    {
        $project_key = $request['project_key'];
        $resource_key = $request['resource_key'];
        // dd($resource_key);
        $resource_email = $request['resource_email'];
        $resource_name = $request['resource_name'];
        $task_description = $request['task_description'];
        $start_resource_date = $request['start_resource_date'];
        $end_resource_date = $request['end_resource_date'];
        $status = $request['status'];

        return view('EditResource', ['project_key' => $project_key,'resource_key' => $resource_key, 'resource_email' => $resource_email, 'task_description' => $task_description, 'resource_name' => $resource_name, 'start_resource_date' => $start_resource_date, 'end_resource_date' => $end_resource_date, 'status' => $status]);
    }
    public function UpdateResource(Request $request)
    {
        $project_key = $request->input('project_key');
        $resource_key = $request->input('resource_key');
        // dd($resource_key);
        $resource_name = $request->input('resource_name');
        $resource_email = $request->input('resource_email');
        $task_description = $request->input('task_description');
        // $start_resource_date = $request->input('start_resource_date');
        // todate m-d-y to d-m-y & then d-m-y to d-M-Y - START
        $parts_todate = explode('-', $request['start_resource_date']);
        $start_resource_date = $parts_todate[0] . '-' . $parts_todate[1] . '-' . $parts_todate[2];
        // $end_resource_date = $request->input('end_resource_date');
        $parts_enddate = explode('-', $request['end_resource_date']);
        $end_resource_date = $parts_enddate[0] . '-' . $parts_enddate[1] . '-' . $parts_enddate[2];
        $status = $request->input('status');
        $remarks = $request->input('remarks');

        $data = array('project_key' => $project_key, "resource_name" => $resource_name, "resource_email" => $resource_email, "task_description" => $task_description, 'start_resource_date' => $start_resource_date, 'end_resource_date' => $end_resource_date, "status" => $status, 'remarks' => $remarks);
        // DB::table('resource_details')->update($data);
        // DB::update('update users set rating = "$rating",start_resource_date = "$start_resource_date",end_resource_date = "$end_resource_date",remarks = "$remarks", where project_key = "$project_key" &&  resource_email = "$resource_email";');

        $ProjectList = DB::select("select * from project_details where project_key=$project_key");
        //  dd($ProjectList);
        $project_key = $ProjectList[0]->project_key;
        $client_name = $ProjectList[0]->client_name;
        $project_lead = $ProjectList[0]->project_lead;
        $priority = $ProjectList[0]->priority;
        $description = $ProjectList[0]->description;

        $mail = new PHPMailer();
        // $nameA= strtok($namef, " ");
        $msg = "<p>Hi " . $resource_name . ",</p>
        <p>Here is your new Task Details:</p>
        <p>Client Name  : " . $client_name . "</p>
        <p>Project Lead : " . $project_lead . "</p>
        <p>Priority  : " . $priority . "</p>
        <p>Task Description  : " . $task_description . "</p>";
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


        if (!$mail->send()) {
            return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
        } else {
            DB::update("UPDATE resource_details SET status = '$status', start_resource_date= '$start_resource_date',end_resource_date= '$end_resource_date',remarks= '$remarks' WHERE resource_key = $resource_key and resource_email='$resource_email';");

            if ($status == 'Completed') {
                $resourcekey = DB::select("select resource_key from resource_details where project_key = '$project_key' && resource_email ='$resource_email' && task_description ='$task_description'");
                $resourcekey = $resourcekey[0]->resource_key;
                return view('feedback', ['resourcekey' => $resourcekey]);
            }

            $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
            return view('ResourceList', ['ResourceList' => $ResourceList]);
        }
    }

    public function feedback(Request $request)
    {
        $input = $request->all();
        $overall_experince = $input['overall_experince'];
        $completeness = $input['completeness'];
        $logic = $input['logic'];
        $time = $input['time'];
        $resourcekey = $input['resource_key'];

        $data = array('overall_experience' => $overall_experince, 'overall_experience' => $completeness, "logic" => $logic, "time" => $time, "resource_key" => $resourcekey);
        // dd($data);
        DB::table('feedback')->insert($data);
        $ResourceList = DB::select("select * from resource_details where project_key=$project_key");
        return view('ResourceList', ['ResourceList' => $ResourceList]);
    }

    public function feedbacklist()
    {
        $FeedbackList =DB::select('select fd.*,rd.*,pd.* from feedback fd
        inner join resource_details rd on rd.resource_key=fd.resource_key
        inner join project_details pd on rd.project_key=pd.project_key');
    //    dd($FeedbackList);
        return view('FeedbackList', ['FeedbackList' => $FeedbackList]);
    }

    public function editproject(Request $request)
    {
        $project_key = $request['project_key'];

        $ProjectList = DB::select("select * from project_details where project_key=$project_key order by project_key DESC");
        $project_key = $ProjectList[0]->project_key;
        $client_name = $ProjectList[0]->client_name;
        $project_status = $ProjectList[0]->project_status;
        $project_lead = $ProjectList[0]->project_lead;
        $priority = $ProjectList[0]->priority;
        $start_date = $ProjectList[0]->start_date;
        $end_date = $ProjectList[0]->end_date;
        $description = $ProjectList[0]->description;
        return view('EditProject', ['project_key' => $project_key,'client_name' => $client_name,'project_status' => $project_status,'project_lead' => $project_lead,'priority' => $priority,'start_date' => $start_date,'end_date' => $end_date,'description' => $description]);

    }
    public function UpdateProject(Request $request)
    {
        $project_key=$request->input('project_key');
        // dd($project_key);
        $client_name = $request->input('client_name');
        $project_lead = $request->input('project_lead');
        $project_status = $request->input('project_status');
        $priority = $request->input('priority');
        $start_date = $request->input('start_date');
        // dd($start_date);
        $end_date = $request->input('end_date');
        $description = $request->input('description');

        DB::update("UPDATE project_details SET project_status = '$project_status', priority= '$priority',end_date= '$end_date',description= '$description' WHERE project_key = $project_key ;");

        // $data = array('client_name' => $client_name, "project_lead" => $project_lead, "project_status" => $project_status, "priority" => $priority, 'start_date' => $start_date, 'end_date' => $end_date, 'description' => $description);
        // DB::table('project_details')->insert($data);

        $ProjectList = DB::select('select * from project_details order by project_key DESC');
        // dd($ProjectList);
        return view('ProjectList', ['ProjectList' => $ProjectList]);

    }


    public function ProjectStatus(Request $request)
    {
         $flag = $request['flag'];
        // dd($flag);

        $ProjectList = DB::select("select * from project_details where project_status='$flag'");
        return view('ProjectList', ['ProjectList' => $ProjectList]);

    }

}
