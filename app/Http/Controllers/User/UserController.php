<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get(){
        return view('user.setting');
    }

    public function store(Request $request){
        $id = $request->get('id');
        $password=$request->get('password');
        $repassword=$request->get('password_confirmation');

        if($password != $repassword){
            return view('user.setting')->with('wrongMsg','Two passwords must be the same .');
        }
        else {
            $user = User::find($id);

            $user->password = Hash::make($password);

            $user->save();

            return redirect()->route('home');
        }
    }
}