<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Validator;
use App\ZooQ;
use App\ZooQUser;
use App\User;
use File;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {

    }
    public function index(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        
        $title      = 'Login';
        $zooq    = ZooQ::limit(1)->get();
        return view('admin.auth.login', compact(['zooq','title']));

    }
    public function register(){
        if(Auth::check()){
            return redirect('/dashboard');
        }
        $title      = 'Register';
        $zooq    = ZooQ::limit(1)->get();
        return view('admin.auth.register', compact(['zooq','title']));

    }
    public function view_dashboard(){

        $title      = 'Dashboard';
        $zooq    = ZooQ::limit(1)->get();
        return view('admin.dashboard.view_dashboard', compact(['zooq','title']));
    }

    public function dashboard(){

        $title      = 'Dashboard';
        $zooq    = ZooQ::limit(1)->get();
        return view('admin.dashboard.dashboard', compact(['zooq','title']));
    }

    public function doLogin(Request $request){
        
        Auth::attempt([
            'email'     => Str::lower($request->txtEmail),
            'password'  => $request->txtPassword,
        ]);

        $messages = [
            'txtEmail.required'     => 'Email must be filled',
            'txtEmail.email'        => 'Email must be a valid email address.',
            'txtPassword.required'  => 'Password must be filled',
        ];

        $validator = Validator::make($request->all(), [
            'txtEmail'    => 'required|email|max:100',
            'txtPassword' => 'required|max:100',
        ], $messages);
        
        if ($validator->fails()) {
            return response()->json([
                'status'  => false,
                'msg'     => $validator->errors()->first()
            ]);
        }

        if(Auth::check()){
            // return redirect('/dashboard');
            return response()->json([
                'status' => true,
                'msg'     => 'Login successful. redirecting...'
                
                ]);
        }else{
            return response()->json([
                'status'    => false,
                'msg'     => 'Incorrect email or password.'
            ]);
        }
    }
    // Registration
    public function doRegister(Request $request){
        $input = $request->all();
        // dd($request->all());
        // two level validation in back end
        $messages = [
            'txtName.required'          => 'Name must must be filled.',
            'txtEmail.required'             => 'Email field must be filled.',
            'txtEmail.email'                => 'Email must be a valid email address.',

            'rdbGender.required'            => 'Religion must be chosen.',
        ];

        $validator = Validator::make($request->all(), [
            'txtName'           => 'required|max:150|regex:/(^[A-Za-z ]+$)+/',
            'txtEmail'                 => 'required|email|max:150',
            'rdbGender'             => 'required|in:Male,Female',
        ], $messages);

        if ($validator->passes()) {

            $ZooQUser = new ZooQUser;

            $ZooQUser->name          = ucfirst($request->input('txtName'));
            $ZooQUser->position_id = 2;
            $ZooQUser->email = $request->input('txtEmail');
            $ZooQUser->gender = $request->input('rdbGender');
            $ZooQUser->phone = '-';
            $ZooQUser->address = '-';
            $ZooQUser->description = '-';
            $ZooQUser->save();

            $lastID = $ZooQUser->user_id;
            $user = new User;
            $user->user_id = $lastID;
            $user->role_id = 2;
            $user->email = $request->input('txtEmail');
            $user->password = bcrypt($request->input('txtPassword'));
            $user->last_login = Carbon::now();
            $user->save();
            return response()->json([
                'status' => true,
                'msg'    => 'Thank you for register, redirecting to login page.'
            ]);
        }
        
        return response()->json([
            'status'  => false,
            'msg'     => $validator->errors()->first()
        ]);        
    }
    public function doUpload(Request $request){
        $cover  = $request->file('file_upload');
        $destinationPath = public_path('/assets/images/cover/');
        $image_name = time().'.'.$cover->getClientOriginalExtension();
        $cover->move($destinationPath, $image_name);

        return response()->json([
            'status'    => false,
            'msg'     => 'image has been uploaded',
        ]);
    }
    public function doLogout(){
        session()->flush();
        Auth::logout();
        return redirect('/login');
    }
}
