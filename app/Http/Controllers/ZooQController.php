<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\ZooQ;
use App\User;
use App\Employee;
use App\Color;
use Illuminate\Support\Facades\Auth;
use Validator;

class ZooQController extends Controller
{
    public function index(){
        $zooq = ZooQ::all();
        $colors = Color::all();
        $title = 'Manage ZooQ Website';
        return view('admin.zooq.zooq', compact(['title','zooq', 'colors']));
    }

    public function foundation(){
        $foundations = Foundation::all();
        $zooq = ZooQ::all();
        $title = 'Foundation';
        return view('admin.zooq.foundation', compact(['zooq','title','foundations']));
    }

    public function seo(){
        $zooq = ZooQ::all();
        $title = 'Search Engine Optimizing';
        return view('admin.zooq.seo', compact(['zooq','title']));
    }
    public function view_seo(){
        $zooq = ZooQ::all();
        $title = 'Search Engine Optimizing';
        return view('admin.zooq.view_seo', compact(['zooq','title']));
    }
    public function view_zooq(){
        $zooq = ZooQ::all();
        $colors = Color::all();
        $title = 'Manage ZooQ Website';

        return view('admin.zooq.view_zooq', compact(['title','zooq', 'colors']));
    }
    public function view_foundation(){
        $foundations = Foundation::all();
        $zooq = ZooQ::all();
        $title = 'Foundation';
        return view('admin.zooq.view_foundation', compact(['zooq','title','foundations']));
    }


    // update foundation data
    public function update_foundation(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];

        $validator = Validator::make($input, [
            'foundation_name'        => 'required|max:100',
            'foundation_description' => 'required',
        ], $messages);

        if ($validator->passes()) {
            $foundation = Foundation::find($id);
            $foundation->foundation_name        = $input['foundation_name'];
            $foundation->foundation_description = $input['foundation_description'];
            $foundation->save();
            return back()->with('success','Foundation data has been successfully updated.');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }
    
    // update seo data
    public function update_seo(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];

        $validator = Validator::make($input, [
            'seo_keywords'     => 'required|max:100',
            'seo_descriptions' => 'required|max:200',
        ], $messages);

        if ($validator->passes()) {
            $zooq = ZooQ::find($id);
            $zooq->seo_keywords      = $input['seo_keywords'];
            $zooq->seo_descriptions = $input['seo_descriptions'];
            $zooq->save();
            return back()->with('success','SEO data has been successfully updated!');
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // update ZooQ profile data
    public function update(Request $request, $id){
        
        $input = $request->all();
        $messages = [
        ];
        $chkNameValue = false;
        if($request->has('chkName')){
            $chkNameValue = true;
        }
        $brandLogo  = $request->file('file_upload');
        $favicon    = $request->file('file_upload_favicon');
        $validator  = Validator::make($input, [
            'name'          => 'required|max:150',
            'contact'       => 'required|max:50',
            'email'         => 'required|email',
            'text_color'    => 'boolean',
            'about'         => 'required|max:255',
            'address'       => 'required',
            'chkName'       => 'in:1',
            'file_upload'   => 'image|mimes:jpeg,png,jpg,svg|max:2000',
            'file_upload_favicon' => 'image|mimes:jpeg,png,jpg,svg,ico|max:1000',
            
        ], $messages);
        if ($validator->fails() ){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->passes()) {
            
            $destinationPath = public_path('/assets/images/web');

            $zooq = ZooQ::find($id);
            if ($request->hasFile('file_upload')) {
                $image_name = time().'.'.$brandLogo->getClientOriginalExtension();
                $prefix_name = 'brand_';
                $file_path = public_path('/assets/images/web/'.$zooq->logo);

                if (File::exists($file_path) && $zooq->logo!='default-brand.png') unlink($file_path);
                $brandLogo->move($destinationPath, $prefix_name.$image_name);
                $zooq->logo = $prefix_name.$image_name;
            }
            if ($request->hasFile('file_upload_favicon')) {
                $image_name = time().'.'.$favicon->getClientOriginalExtension();
                $prefix_name = 'favicon_';
                $file_path = public_path('/assets/images/web/'.$zooq->favicon);

                if (File::exists($file_path) && $zooq->favicon!='default-favicon.png') unlink($file_path);
                $favicon->move($destinationPath, $prefix_name.$image_name);
                $zooq->favicon = $prefix_name.$image_name;
            }
            
            $zooq->name               = $input['name'];
            $zooq->address            = $input['address'];
            $zooq->isNameActive       = $chkNameValue;
            $zooq->primary_color      = $input['primary_color'];
            $zooq->text_color         = $input['text_color'];
            $zooq->contact            = $input['contact'];
            $zooq->isLogoActive       = $input['rdbBrand'];
            $zooq->email              = Str::lower($input['email']);
            $zooq->about              = $input['about'];
            $zooq->save();

            return back()->with('success','ZooQ data has been successfully updated.');
        }

        
    }
}
