<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Post;
use App\Models\Category;

class AdminController extends Controller
{
    //login view
    function login(){
        return view('admin.login');
    }

    //submit login form
    function submit_login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $userCheck = Admin::where(['username'=>$request->username, 'password'=>$request->password])->count();
        if($userCheck > 0){
            $adminData = Admin::where(['username'=>$request->username, 'password'=>$request->password])->first();
            session(['adminData' => $adminData]);
            return redirect('admin/dashboard');
        } else {
            return redirect('admin/login')->with('error', 'Invalid username/password!!');
        }
    }

    //dashboard
    function dashboard(){

        $data = Post::all();
        $category = Category::all();
        return view('admin.dashboard', [
            'data' => $data,
            'cat' => $category,
            'title' => 'Todas postagens',
        ]);
    }

    //ogout

    function logout(){
        session()->forget('adminData');
        return redirect('admin/login');
    }
}
