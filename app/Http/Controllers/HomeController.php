<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ZooQ;
use App\Slideshow;
use App\Gallery;
use Illuminate\Support\Facades\Auth;
use App\MediaSocial;
use App\Religion;
use App\Job;

class HomeController extends Controller
{
    public function index(){
        $zooq        = ZooQ::limit(1)->get();
        $title          = $zooq[0]->name;
        $slideshows     = Slideshow::all();
        $galleries      = Gallery::all();
        $media_social   = MediaSocial::all()->where('is_active', '=', true);
        return view('home', compact(['title','zooq', 'slideshows', 'galleries', 'media_social']));
    }

    public function showPPDB(){
        $zooq        = ZooQ::limit(1)->get();
        $title          = $zooq[0]->name.' | PPDB';
        $religions      = Religion::all();
        $jobs           = Job::all();
        $media_social   = MediaSocial::all()->where('is_active', '=', true);
        return view('ppdb.ppdb_registration', compact(['title','zooq', 'media_social', 'religions', 'jobs']));
    }
    public function gallery_detail($id){
        $title          = 'ZooQ';
        $zooq        = ZooQ::limit(1)->get();
        $slideshows     = Slideshow::all();
        $galleries      = Gallery::find($id);
        $media_social   = MediaSocial::all()->where('is_active', '=', true);
        return view('gallery.gallery_view', compact(['title','zooq', 'slideshows', 'galleries', 'media_social']));
    }

    public function getDataSlideshow(){
        $slideshows     = Slideshow::all();
        return response()->json([
            'data' => $slideshows, 
            'count' => $slideshows->count()
        ]);
    }


}
