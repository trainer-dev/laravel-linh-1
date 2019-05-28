<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
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
     * Show view blog controller page
     */
    public function get()
    {
        $list = Post::paginate(20);
        return view("admin.blog.index", array('model'=>$list));
    }

    /**
     * Show view comment page
     */
    public function comment($id){
        $postId = Post::find($id);
        return view('admin.blog.comment',array('model'=>$postId));
    }

    /**
     * Show view edit posts page
     */
    public function posts($id){
        $post = Post::find($id);

        return view('admin.blog.posts.edit',array('model'=>$post));
    }

    /**
     * Save info edit to table
     */
    public function store(Request $request){
        $id=$request->get('id');
        $title = $request->get('title');
        $body = $request->get('body');

        $post = Post::find($id);
        $post->title=$title;
        $post->description=$body;
        $post->updated_at=date('Y-m-d H:i:s');

        $post->save();

        return redirect() -> route('admin.blog');
    }

    /**
     * Delete posts
     */
    public function delete($id) {
        $post = Post::find($id);
        $post->delete();

        //Chuyển về trang danh sách
        return redirect()->route('admin.blog');
    }
}