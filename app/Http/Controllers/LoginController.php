<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $status = Auth::user()->status;
           
            if($status==1){
            return redirect('/dashboard');
            }
            else if($status == 2){
                Auth::logout();
                return back()->withErrors(['email' => 'Blocked.']);
            }
            else if($status == 0){
                Auth::logout();
                return back()->withErrors(['email' => 'Waiting For Approve.']);
            }
            else if($status == 3){
                Auth::logout();
                return back()->withErrors(['email' => 'Cancelled']);
            }
            else{
                Auth::logout();
                return back()->withErrors(['email' => 'You are Pending']);
            }

        }
        return back()->withErrors(['email' => 'These credentials do not match our records.']);





    }



























































































 // echo "<pre>";
            // print_r($user);
            // echo "</pre>";
            // die;
            // session()->put('user', [
            //     'id' => $user->id,
            //     'name' => $user->name,
            //     'email' => $user->email,
            // ]);


    
    // public function logined(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);
    
    //     $email = $request->email;
    //     $password = $request->password;
          
    //     $user = users::where('email','=',$email)->first();
    
      
    //     if (!empty($user)) 
    //     {
    //         if ($user->password != $password) {
                
    //             return back();
    //         }
    //         $user = users::where('email', $request->email)->first();
            
    //         session()->put('user',[
    //             'id' =>$user->id,
    //             'name'=>$user->name,
    //             'email'=>$user->email,
    //         ]);
    //         return redirect('dashboard');
    //     }
            
    //        return back();
            
    //     }

        
    }

