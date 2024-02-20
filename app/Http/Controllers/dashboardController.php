<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class dashboardController extends Controller
{
    public function dashboard()
    {
        return view('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }


    public function updatestatus()
    {
        if (auth()->user()->role_code === 'admin') {
            $users = User::all();
            return view('user_status', ['users' => $users]);
        } else {
            return back();
        }
    }
    

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->status = ($user->status + 1) % 4;
        $user->save();
        return redirect()->back();
    }

    
}
