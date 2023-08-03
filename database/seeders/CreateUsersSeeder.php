<?php



namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\User;



class CreateUsersSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $users = [

            [

               'name'=>'Admin User',

               'email'=>'belal.rashid@icruxsystem.com',

               'type'=>1,

               'password'=> bcrypt('12345678'),

            ],

            [

               'name'=>'Manager User',

               'email'=>'atul.Suryawanshi@icruxsystem.com',

               'type'=> 2,

               'password'=> bcrypt('12345678'),

            ],

            [

               'name'=>'User',

               'email'=>'nikhil.mulik@icruxsystem.com',

               'type'=>0,

               'password'=> bcrypt('12345678'),

            ],

        ];



        foreach ($users as $key => $user) {

            User::create($user);

        }

    }

}
