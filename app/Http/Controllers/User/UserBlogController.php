<?php


namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserBlogController extends Controller
{
    function get(){
        $username =auth()->user()->name;
        $user = DB::select('select * from post where username="'.$username.'"');

        return view('user.index', compact('user'));
    }

    function show(Request $req) {
        $username = $req->get('submit');
        $user = DB::select('select * from post where username="'.$username.'"');

        return view('user.index', compact('user'));

    }
}