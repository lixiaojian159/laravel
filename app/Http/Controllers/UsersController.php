<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //注册
    public function create(){
    	return view('users.create');
    }

    //注册逻辑
    public function store(Request $request){

    	$this->validate($request,[
    		'name'     => 'required|max:50',
    		'email'    => 'required|max:255|email|unique:users',
    		'password' => 'required|confirmed|min:6'
    	]);

        $data['name']  = $request->get('name');
        $data['email'] = $request->get('email');
        $data['password'] = bcrypt($request->get('password'));


        $user = User::create($data);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程~');
    	return redirect()->route('users.show',[$user]);
    }

    //显示用户个人信息的页面
    public function show(User $user){
        return view('users.show',compact('user'));
    }
}
