<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ZooQ;
use App\User;
use App\MediaSocial;
use Illuminate\Support\Facades\Auth;
use Validator;

class SocialMediaController extends Controller
{
    // Social Media page
    public function index(){
        $zooq = ZooQ::all();
        $socmeds = MediaSocial::all();
        $title = 'Social Media';
        return view('admin.socmed.socmed', compact(['title','zooq', 'socmeds']));    
    }
    // Social Media page (ajax)
    public function view_socmed(){
        $zooq = ZooQ::all();
        $socmeds = MediaSocial::all();
        $title = 'Social Media';
        return view('admin.socmed.view_socmed', compact(['title','zooq', 'socmeds']));    
    }

    public function update_status($id){
        
        $socmeds = MediaSocial::find($id);
        if($socmeds->is_active == 1) $status = 0;
        else $status = 1;

        $socmeds->is_active = $status;
        $socmeds->save();
        $status_name = ($status == 1) ? 'enabled' : 'disabled';
        $msg = 'Social media '.$socmeds->name.' has been '.$status_name.'.';
        return redirect()->back()->with('success', $msg);
    }
    public function edit($id){
        
        $zooq = ZooQ::all();
        $socmeds = MediaSocial::find($id);
        $title = 'Edit Social Media';
        return view('admin.socmed.edit_socmed', compact(['title','zooq', 'socmeds']));    
    }
    public function update_link(Request $request, $id){

        $input = $request->all();
        $messages = [
        ];

        $validator = Validator::make($input, [
            'link'        => 'required|max:100',
        ], $messages);

        if ($validator->passes()) {
            $socmeds = MediaSocial::find($id);
            $socmeds->link = $input['link'];
            $socmeds->save();
            $msg = $socmeds->name.' data has been successfully updated.';
            return redirect('/socmed')->with('success',$msg);
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
