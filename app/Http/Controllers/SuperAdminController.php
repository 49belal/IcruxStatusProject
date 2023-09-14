<?php

namespace App\Http\Controllers;

use DB;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function RegisterUser(Request $request)
    {

        return view('AddUser');
    }

    public function AddNewUser(Request $request)
    {
        $name = $request->input('user_name');
        $email = $request->input('user_email');
        $role = $request->input('role');


        if ($role == "User") {

            $type = 0;
        } elseif ($role == "Admin") {
            $type = 1;
        } elseif ($role == "Team Lead") {
            $type = 3;
        } elseif ($role == "Super Admin") {
            $type = 2;
        }



        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);     // Passing `true` enables exceptions

        try {

            $link = 'http://localhost:8000/';

            // $nameA= strtok($namef, " ");

            $msg = "<p>Hello " . $name . ",<br>

                    Welcome to Icrux Project Mangement Dashboard<br>

                    You are Succefully registered on Dashboard as a Role of: " . $role . "<br>

                    To access the dashboard<a href=" . $link . "> please click here</a><br>

                    Thank You</p>

                    <p style='color: red'>Note: Please do not reply to this message. This is a unmonitored Mailbox.</p>";

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

            $mail->FromName = "Icrux ProjectManagement Dashboard";

            $mail->Sender = "belalahmad664664@outlook.com";

            $mail->Subject = "Welcome to Icrux ProjectMangement Dashboard";

            $mail->MsgHTML($msg);

            $mail->addAddress($email);



            if (!$mail->send()) {

                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {

                $data = array('name' => $name, "email" => $email, "type" => $type);
                DB::table('users')->insert($data);

                $UserList = DB::select("select * from users");

                return view('UserList', ['UserList' => $UserList]);
            }
        } catch (Exception $e) {

            return back()->with('error', 'Message could not be sent.');
        }
    }

    public function UserList(Request $request)
    {
        $UserList = DB::select("select * from users");

        return view('UserList', ['UserList' => $UserList]);
    }

    public function EditUserInfo(Request $request)
    {
        $email = $request['email'];
        $name = $request['name'];
        $type = $request['type'];
        return view('EditUser', ['email' => $email, 'name' => $name, 'type' => $type]);
    }

    public function DeleteUser(string $email)
    {
        // dd($email);
        DB::select("Delete from users where email='$email'");


        $UserList = DB::select("select * from users");
        // dd($UserList);

        return view('UserList', ['UserList' => $UserList]);
    }

    public function EditUser(Request $request)
    {
        $name = $request->input('user_name');
        $email = $request->input('user_email');
        $role = $request->input('role');


        if ($role == "User") {

            $type = 0;
        } elseif ($role == "Admin") {
            $type = 1;
        } elseif ($role == "Team Lead") {
            $type = 3;
        } elseif ($role == "Super Admin") {
            $type = 2;
        }



        require base_path("vendor/autoload.php");

        $mail = new PHPMailer(true);

        try {

            $link = 'http://localhost:8000/';

            // $nameA= strtok($namef, " ");

            $msg = "<p>Hello " . $name . ",<br>

                    Welcome to Icrux Project Mangement Dashboard<br>

                    Your New Role: " . $role . "<br>

                    To access the dashboard<a href=" . $link . "> please click here</a><br>

                    Thank You</p>

                    <p style='color: red'>Note: Please do not reply to this message. This is a unmonitored Mailbox.</p>";

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

            $mail->FromName = "Icrux ProjectManagement Dashboard";

            $mail->Sender = "belalahmad664664@outlook.com";

            $mail->Subject = "Welcome to Icrux ProjectMangement Dashboard";

            $mail->MsgHTML($msg);

            $mail->addAddress($email);



            if (!$mail->send()) {

                return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
            } else {

                $data = array('name' => $name, "email" => $email, "type" => $type);

                DB::update("UPDATE users SET type= '$type' WHERE email = '$email' ;");


                $UserList = DB::select("select * from users");

                return view('UserList', ['UserList' => $UserList]);
            }
        } catch (Exception $e) {

            return back()->with('error', 'Message could not be sent.');
        }
    }
}
