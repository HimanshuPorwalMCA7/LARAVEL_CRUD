<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        
    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
    return redirect('/register')->with('error', 'Email is already registered.');
    }
        
        $data=new User();
        $name = explode(' ', $request->input('name'));
        $firstName = $name[0] ?? '';
        $lastName = $name[1] ?? '';
        $data->first_name= $firstName;        
        $data->last_name= $lastName;        
        $data->email= $request->email;
        $data->password = Hash::make($request->password);
        $data->role_code=$request->role_code;
        $data->save();
        return redirect('/login')->with('success', 'Registration successful. You can now login.');
       
    }

}
