<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('user.index',compact('user'));
    }

    public function show($id){
        $info = Auth::user();
        return view('user.account.detailUser',compact('info'));

    }

    public function destroy($id){
        $delUser = Auth::user();
        $delUser->delete();
        return redirect()->route('home.index')->with('success','bạn đã xóa tài khoản');
    }

    public function edit($id){
        $user = Auth::user();
        return view('user.account.updateInfo',compact('user'));
    }

    public function update(Request $request,$id){
       
    }
}
