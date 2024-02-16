<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class LoginController extends Controller
{

    public function login()
    {

        return view('login');  
    }
    public function logined(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $email = $request->email;
        $password = $request->password;
          
        $user = users::where('email','=',$email)->first();
    
      
        if (!empty($user)) 
        {
            if ($user->password != $password) {
                
                return back();
            }
            $user = users::where('email', $request->email)->first();
            
            session()->put('user',[
                'id' =>$user->id,
                'name'=>$user->name,
                'email'=>$user->email,
            ]);
            return redirect('dashboard');
        }
            
           return back();
            
        }

        
    }

