<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ZooQUser, App\ZooQ, App\User;
use Auth;
use Validator, File;
use Carbon\Carbon;

class UserController extends Controller
{

    // ZooQUser
    public function showZooQUser(){
        $zooq = ZooQ::all();
        $users = User::all();
        $title = 'User Data';
        return view('admin.user.user', compact(['title', 'zooq', 'users']));       
    }

    public function viewZooQUser(){
        $zooq = ZooQ::all();
        $users = User::all();
        $title = 'User Data';
        return view('admin.user.view_user', compact(['title', 'zooq', 'users']));      
    }  

    // Delete ZooQUser Data
    protected function deleteZooQUser(Request $request){
        $id = $request->id;
        if(Auth::user()->data_employee->user_id == $id){
            return back()->withErrors('Oops!, you can\'t delete admin account.');
        }
        $e = ZooQUser::find($id);
        
        $file_path = public_path('/assets/images/avatar/'.$e->profile_picture);
        if (File::exists($file_path) && $e->profile_picture != 'default-avatar.png') unlink($file_path);
        User::where('user_id', '=', $id)->delete();
        ZooQUser::where('user_id', $id)->delete();

        return back()->with('success','Employee data has been deleted');
    }  
}
