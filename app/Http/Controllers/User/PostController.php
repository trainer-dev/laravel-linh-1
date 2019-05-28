<?php


namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Return view create page
     */
    function create() {

        return view('post.create');

    }

    /**
     * Save post's info from form create
     */
    function store(Request $request){
        //khởi tạo và truyền biến
        $name = $request->get('title');
        $username = $request->get('username');
        $desc = $request->get('body');

        //truyền vào csdl

        $post = new Post;
        $post -> title=$name;
        $post -> username=$username;
        $post -> description=$desc;
        $post->save();

        //sau khi thêm thành công chuyển về trang ds
        return redirect()->route('home');
    }

    /**
     * Show change post's info page
     */
    function edit($id) {
        $edit=Post::find($id);

        return View("post.edit",array('model'=>$edit));
    }

    /**
     * Update page's info from edit page
     */
    public function update(Request $request) {

        $id=$request->get('id');
        $name = $request->get('name');
        $desc = $request->get('description');
        //Tìm object edit trong dbs
        $edit=Post::find($id);

        //Chỉnh sửa giá trị để edit
        $edit->title=$name;
        $edit->description=$desc;
        $edit->updated_at=date('Y-m-d H:i:s');

        $edit->save();

        //truyền về index
        return redirect() -> route('post.post');
    }

    /**
     * Delete post
     */
    function delete($id) {
        $delete=Post::find($id);
        $delete->delete();

        //Chuyển về trang danh sách
        return redirect()->route('home');
    }
}