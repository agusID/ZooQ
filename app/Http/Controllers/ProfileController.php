<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\ZooQ;
use App\UserLogin;
use File;
use App\ZooQUser;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {

    }

    public function edit_profile(){
        $title = 'Edit Profile';
        $zooq = ZooQ::all();
        return view('admin.profile.edit_profile', compact(['zooq', 'title']));
    }
    public function view_edit_profile(){
        $title = 'Edit Profile';
        $zooq = ZooQ::all();
        return view('admin.profile.view_edit_profile', compact(['zooq', 'title']));
    }
    public function update_profile(Request $request){
        $input = $request->all();
        $messages = [
        ];
        $avatarImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'phone'       => 'required',
            'address'     => 'required|max:200',
            'description'     => 'required|max:200',
            'file_upload' => 'image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);
        if ($validator->passes()) {
            $id = Auth::user()->data_employee->user_id;
            $ZooQUser = ZooQUser::find($id);

            if ($request->hasFile('file_upload')) {
                $image_name = time().'.'.$avatarImage->getClientOriginalExtension();
                $prefix_name = 'avatar-';
                $file_path = public_path('/assets/images/avatar/'.$ZooQUser->profile_picture);
                if (File::exists($file_path) && $ZooQUser->profile_picture != 'default-avatar.jpg') unlink($file_path);
                $destinationPath = public_path('/assets/images/avatar');
                $avatarImage->move($destinationPath, $prefix_name.$image_name);
                $ZooQUser->profile_picture    = $prefix_name.$image_name;
            }
            $ZooQUser->phone         = $input['phone'];
            $ZooQUser->address       = $input['address'];
            $ZooQUser->description   = $input['description'];
            $ZooQUser->save();
            return redirect('dashboard')->with('success','Data has been updated');

        }
        return redirect()->back()->withErrors($validator)->withInput();
        
    }

    public function changeCover(Request $request){

        $input = $request->all();
        $messages = [
        ];
        $coverImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'file_upload' => 'required|image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);

        if ($validator->passes()) {
            $image_name  = time().'.'.$coverImage->getClientOriginalExtension();
            $prefix_name = 'cover-';
            $destinationPath = public_path('/assets/images/cover/');
            if ($request->hasFile('file_upload')) {

                $coverImage->move($destinationPath, $prefix_name.$image_name);
                $id = Auth::user()->data_employee->user_id;
                $employee = ZooQUser::find($id);
                $file_path = public_path('/assets/images/cover/'.$employee->profile_cover);
                if (File::exists($file_path) && $employee->profile_cover != 'default-cover.jpg') unlink($file_path);
                $employee->profile_cover = $prefix_name.$image_name;
                $employee->save();
                return back()->with('success','Cover has been updated');
            }
        }
        return redirect()->back();
    }


    // Change Password
    public function changePassword(){
        $title = 'Change Password';
        $zooq = ZooQ::all();
        return view('admin.profile.change_password', compact(['zooq', 'title']));
    }
    public function viewChangePassword(){
        $title = 'Change Password';
        $zooq = ZooQ::all();
        return view('admin.profile.view_change_password', compact(['zooq', 'title']));
    }
    public function doChangePassword(Request $request){
        $input = $request->all();
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()->withErrors("Your current password does not matches with the password you provided. Please try again.")->withInput();
        }
 
        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            return redirect()->back()->withErrors("New Password cannot be same as your current password. Please choose a different password.")->withInput();
        }

        $messages = [
        ];
        $validator = Validator::make($input, [
            'current_password'      => 'required|max:50',
            'password'              => 'required|max:50|min:6|confirmed',
            'password_confirmation' => 'required|max:50|min:6',
        ], $messages);
        if ($validator->passes()) {
            $id = Auth::user()->user_id;
            $user = User::find($id);
            $user->password         = bcrypt($input['password']);
            $user->save();
            return redirect('dashboard')->with('success','Password has been changed');

        }
        return redirect()->back()->withErrors($validator)->withInput();
        
    }
}
