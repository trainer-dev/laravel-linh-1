<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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
     * @return view: index
     */
    public function index() {
        $list = User::paginate(20);
        return view("admin.user.index", array('model'=>$list));
    }

    /**
     * Delete user by softdelete
     */
    function delete($id) {
        User::find($id)->delete();

        //Chuyển về trang danh sách
        return redirect()->route('admin.user');
    }

    /**
     * Delete user forever
     */
    function destroy($id) {
        User::onlyTrashed()->where('id','=',$id)->restore();

        $user = User::find($id);
        $user->forceDelete();

        return redirect()->route('admin.user.restore');

    }
    /**
     * Show view restore page
    */
    function restoreUser(){
        $user = DB::select('select * from users where not (deleted_at=" ")');
        return view('admin.user.restore', compact('user'));
    }

    /**
     * Restore user deleted
     */
    function restore($id) {
        User::onlyTrashed()->where('id','=',$id)->restore();
        return redirect()->route('admin.user');
    }

    /**
     * Show view create user page
     */
    function create() {
        return view('admin.user.create');
    }

    /**
     * Save user information
     */
    public function store(User $user)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);


        $user->name = request('name');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->is_admin = 'user';

        $user->save();

        return redirect()->to('/admin/user');
    }

    /**
     * Show profile page
     */
    public function profile($id){
        $user = User::find($id);

        return View("admin.user.profile",array('model'=>$user));
    }


    /**
     * Update user's information
     */
    public function update(Request $request){
        if ($request->has('formName')) {

            $request->validate([
                'name' => 'bail|required|unique:users|max:45',
                'email' => 'bail|required|unique:users|max:45',
            ]);

            $id = request('id');
            $user = User::find($id);

            $user->name = request('name');
            $user->email = request('email');
            $user->is_admin = request('admin');

            $user->save();

            return redirect()->route('admin.user');
        }
    }

    /**
     * Change password
     */
    public function pass(Request $request){
        if ($request->has('formPassword')) {
            $id = request('id');
            $pass = request('password');
            $passReset = request('password_confirmation');

            if($pass != $passReset){
                return back()->with('mess','Two password must be the same!');
            }
            else {
                $user = User::find($id);

                $user->password = Hash::make($pass);

                $user->save();

                return redirect()->route('admin.user');
            }
        }
    }

    /**
     * Update user's role
     */
    public function role(Request $request) {
        if ($request->has('formAdmin')) {

            $role = request('admin');
            $id = request('id');

            $user = User::find($id);
            if ($role == "admin") {
                $user->is_admin = 'user';
            } else {
                $user->is_admin = "admin";
            }
            $user->save();

            return redirect()->route('admin.user');
        }
    }
}