<?php


namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    function get($id){
        $postId = Post::find($id);

        return view('blog.index',array('model'=>$postId));
    }

    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->comment = $request->get('comment');
        $comment->user()->associate($request->user());
        $comment->post_id = $request->get('post_id');
        $comment ->save();

        return back();
    }
}