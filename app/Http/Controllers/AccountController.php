<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    //This method will show user registration page
    public function registration(){
        return view('front.account.registration');
    }
    //This method will process user registration data and store it in the database
    public function processRegistration(Request $request){
        //dd($request->all()); 
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:5',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->passes()) {
            return redirect()->back()->withErrors($validator)->withInput();
            return view('front.account.registration');
        }else{
            return response()->json([
            'status'=>false,
            'errors'=>$validator->errors()
            ]);
        }
    }
    //This method will show user login page
    public function login(){
        
    }
}
