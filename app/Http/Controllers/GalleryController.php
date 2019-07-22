<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
use App\ZooQ;
use App\UserLogin;
use App\ZooQUser;
use App\Slideshow;
use App\Gallery;
use Illuminate\Support\Facades\Auth;
use Validator;
class GalleryController extends Controller
{
    public function getValidator(){
        $validation = "";
        return $validation;
    }

    // slideshow page
    public function index(){
        // return 'test';
        $zooq = ZooQ::all();
        $slideshows = Slideshow::paginate(5);
        $title = 'Manage Slideshow';
        return view('admin.gallery.slideshow', compact(['title','zooq', 'slideshows']));
    }
    // slideshow page (ajax)
    public function view_slideshow(){
        $zooq = ZooQ::all();
        $slideshows = Slideshow::paginate(5);
        $title = 'Manage Slideshow';
        return view('admin.gallery.view_slideshow', compact(['title','zooq', 'slideshows']));
    }

    // galleries page
    public function gallery_index(){
        $zooq = ZooQ::all();
        $galleries = Gallery::paginate(5);
        $title = 'Manage Gallery';
        return view('admin.gallery.gallery', compact(['title','zooq', 'galleries']));
    }
    
    // gallery page (ajax)
    public function showGallery(){
        $zooq = ZooQ::all();
        $galleries = Gallery::paginate(5);
        $title = 'Manage Gallery';
        return view('admin.gallery.gallery', compact(['title','zooq', 'galleries']));
    }
    // gallery page (ajax)
    public function view_gallery(){
        $zooq = ZooQ::all();
        $galleries = Gallery::paginate(5);
        $title = 'Manage Gallery';
        return view('admin.gallery.view_gallery', compact(['title','zooq', 'galleries']));
    }
    // edit slideshow
    public function edit_slideshow($id){
        $zooq = ZooQ::all();
        $slideshows = Slideshow::find($id);
        $title = 'Edit Slideshow';
        return view('admin.gallery.edit_slideshow', compact(['title','zooq', 'slideshows']));
    }

    // edit gallery
    public function edit_gallery($id){
        $zooq = ZooQ::all();
        $galleries = Gallery::find($id);
        $title = 'Edit Gallery';
        return view('admin.gallery.edit_gallery', compact(['title','zooq', 'galleries']));
    }

    // add slideshow
    public function add_slideshow(Request $request){
        $input = $request->all();
        $messages = [
        ];
        $slideImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'title'       => 'required|max:100',
            'description' => 'required|max:200',
            'file_upload' => 'required|image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);

        if ($validator->passes()) {
            $image_name = time().'.'.$slideImage->getClientOriginalExtension();
            if ($request->hasFile('file_upload')) {
                $destinationPath = public_path('/assets/images/slideshow');
                $prefix_name = 'slide_';
                $slideImage->move($destinationPath, $prefix_name.$image_name);

                $slideshow = new Slideshow();
                $slideshow->title       = $input['title'];
                $slideshow->description = $input['description'];
                $slideshow->image       = $prefix_name.$image_name;
                $slideshow->save();
                return back()->with('success','Data has been added');
            }
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // add gallery
    public function add_gallery(Request $request){
        $input = $request->all();
        $messages = [
        ];
        $galleryImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'title'       => 'required|max:100',
            'description' => 'required|max:200',
            'file_upload' => 'required|image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);

        if ($validator->passes()) {
            $image_name  = time().'.'.$galleryImage->getClientOriginalExtension();
            $prefix_name = 'gallery_';
            if ($request->hasFile('file_upload')) {
                $destinationPath = public_path('/assets/images/gallery');
                $galleryImage->move($destinationPath, $prefix_name.$image_name);

                $gallery = new Gallery();
                $gallery->title       = $input['title'];
                $gallery->description = $input['description'];
                $gallery->image       = $prefix_name.$image_name;
                $gallery->save();
                return back()->with('success','Data has been added');
            }
        }
        return redirect()->back()->withErrors($validator)->withInput();
    }

    public function update_slideshow(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];
        $slideImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'title'       => 'required|max:100',
            'description' => 'required|max:200',
            'file_upload' => 'image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);

        if ($validator->passes()) {
            
            $slideshow = Slideshow::find($id);

            if ($request->hasFile('file_upload')) {
                $image_name = time().'.'.$slideImage->getClientOriginalExtension();
                $prefix_name = 'slide_';
                $file_path = public_path('/assets/images/slideshow/'.$slideshow->image);
                if (File::exists($file_path)) unlink($file_path);
                $destinationPath = public_path('/assets/images/slideshow');
                $slideImage->move($destinationPath, $prefix_name.$image_name);
                $slideshow->image       = $prefix_name.$image_name;
            }
            $slideshow->title       = $input['title'];
            $slideshow->description = $input['description'];
            $slideshow->save();
            return redirect('gallery/slideshow')->with('success','Data has been updated');
        }
        return redirect()->back()->withErrors($validator)->withInput();

    }
    public function update_gallery(Request $request, $id){
        $input = $request->all();
        $messages = [
        ];
        $galleryImage  = $request->file('file_upload');
        $validator = Validator::make($input, [
            'title'       => 'required|max:100',
            'description' => 'required|max:200',
            'file_upload' => 'image|mimes:jpg,png,jpeg|max:10000'
        ], $messages);

        if ($validator->passes()) {
            
            $gallery = Gallery::find($id);

            if ($request->hasFile('file_upload')) {
                $image_name = time().'.'.$galleryImage->getClientOriginalExtension();
                $prefix_name = 'slide_';
                $file_path = public_path('/assets/images/slideshow/'.$gallery->image);
                if (File::exists($file_path)) unlink($file_path);
                $destinationPath = public_path('/assets/images/slideshow');
                $galleryImage->move($destinationPath, $prefix_name.$image_name);
                $slideshow->image       = $prefix_name.$image_name;
            }
            $gallery->title       = $input['title'];
            $gallery->description = $input['description'];
            $gallery->save();
            return redirect('gallery/gallery')->with('success','Data has been updated');
        }
        return redirect()->back()->withErrors($validator)->withInput();

    }

    protected function delete_slideshow(Request $request){
        $id = $request->id;
        $slideshow = Slideshow::find($id);
        $file_path = public_path('/assets/images/slideshow/'.$slideshow->image);
        if (File::exists($file_path)) unlink($file_path);
        Slideshow::where('slideshow_id', $id)->delete();
        return redirect('/gallery/slideshow');
    }

    protected function delete_gallery(Request $request){
        $id = $request->id;
        $gallery = Gallery::find($id);
        $file_path = public_path('/assets/images/gallery/'.$gallery->image);
        if (File::exists($file_path)) unlink($file_path);
        Gallery::where('gallery_id', $id)->delete();
        return redirect('/gallery/gallery');
    }    
}
