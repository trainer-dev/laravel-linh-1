<?php


namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
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

    /**
     * Edit comment
     */
    public function edit($id){
        $comment = Comment::find($id);

        return view('admin.blog.comment.edit',array('model'=>$comment));
    }

    /**
     * Save info into table
     */
    public function store(Request $request){
        $id = $request->get('id');
        $content = $request->get('body');

        $save = Comment::find($id);
        $save->comment=$content;
        $save->updated_at=date('Y-m-d H:i:s');

        $save->save();
        return redirect()->route('admin.blog');
    }

    /**
     * Delete comment
     */
    public function delete($id){
        $comm=Comment::find($id);
        $comm->delete();

        return back();
    }
}