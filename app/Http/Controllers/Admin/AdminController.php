<?php


namespace App\Http\Controllers\Admin;

use App\Post;
use App\Http\Controllers\Controller;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        $count = Post::count();
        $user = User::count();
        return view("admin.index",['count'=>$count,'user'=>$user]);
    }

}