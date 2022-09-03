<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('auth.register');
    }

    public function search_sponsorid(Request $request)
    {
        $sponsor_id = $request->sponsor_id;
        $check = User::where(['username'=>$sponsor_id,'status'=>1])->exists();
        if($check){
          $data = User::where(['username'=>$sponsor_id,'status'=>1])->first();
            echo $data->first_name;
        }else{
            echo '0';
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'sponsor_id'=>'required',
            'first_name'=>'required|min:2|max:25',
            'last_name'=>'required|min:2|max:25',
            'username'=>'required|unique:users',
            'mobile'=>'required|numeric|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'required', 
        ]);

        $sponsor_check = User::where(['username'=>$request->sponsor_id,'status'=>1])->exists();
        if($sponsor_check){
            $sponsor_details = User::where(['username'=>$request->sponsor_id,'status'=>1])->first();
            $model = new User();
            $model->first_name = $request->first_name;
            $model->last_name = $request->last_name;
            $model->username = $request->username;
            $model->email = $request->email;
            $model->mobile = $request->mobile;
            $model->sponsor_code = $sponsor_details->id;
            $model->password = Hash::make($request->password);
            $model->save();
        }else{
            
        }

    }


}
