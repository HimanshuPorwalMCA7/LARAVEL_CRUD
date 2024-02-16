<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class RegisterController extends Controller
{
    public function form()
    {
        return view('register');
    }


    public function registered(Request $request)
    {
        
        $request->validate(
            [
                'name' => 'required',
                'email'=> 'required',
                'password'=>'required',
            ]
            );
        
        $data=new users();
        $name = explode(' ', $request->input('name'));
        $firstName = $name[0] ?? '';
        $lastName = $name[1] ?? '';
        $data->first_name= $firstName;        
        $data->last_name= $lastName;        
        $data->email= $request->email;
        $data->password= $request->password;
        $data->role_code=$request->role_code;
        $data->save();
        return redirect('/login');
       
    }

}
