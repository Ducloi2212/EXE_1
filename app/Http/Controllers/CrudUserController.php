<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CrudUserController extends Controller
{
    //
    public function login()
    {
        return view('crud_user.login');
    }

    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('list')
                ->withSuccess('Signed in');
        }
        return back()->withErrors(['email','password' => 'Email hoặc mật khẩu không đúng.'])->withInput();
        //return redirect("home")->withSuccess('Login details are not valid');
    }

    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect("home")->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
    }

    public function listUser()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function viewUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.view', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::find($user_id);

        return view('crud_user.update', ['user' => $user]);
    }

    public function postUpdateUser(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,id,' . $input['id'],
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::find($input['id']);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->phone = $input['phone'];
        $user->address = $input['address'];
        $user->password = $input['password'];
        $user->save();

        return redirect("list")->withSuccess('You have signed-in');
    }


    public function deleteUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::destroy($user_id);

        return redirect("list")->withSuccess('You have signed-in');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('home');
    }
}
