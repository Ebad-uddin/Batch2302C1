<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function create(Request $request){
        // validate the form before submission
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => 'required'
        ]);
        // print_r($request->all()); // display the data in the form of assciative array

        $data = new User();
        $data->name = $request['name'];
        $data->email = $request['email'];
        $data->password = $request['password'];
        $data->save();
        return redirect('/userinfo');

    }
    public function userinfo(){
        $userinfo = User::all(); // fetching data from database using model
        // dd($userinfo);   //prints the data in the form of array
        $user_records = compact('userinfo');
        return view('userinfo')->with($user_records);
    }
    public function userdel($id){
        // echo $id;
        $data = User::find($id);
        // dd($data);
        if(!is_null($data)){
            $data->delete();
            return redirect('/userinfo');
          }else{
            return redirect('/userinfo');
        }

    }
    public function useredit($id){
        $editdata = User::find($id);
        // dd($editdata);
        return view ('edituser')->with(compact('editdata'));

    }
    public function upd($id, Request $request){
        $userdata = User::find($id);
        $userdata->name = $request['name'];
        $userdata->email = $request['email'];
        $userdata->password = $request['password'];
        $userdata->save();
        return redirect ('/userinfo');
    }
}
