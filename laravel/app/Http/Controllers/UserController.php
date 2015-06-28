<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Auth;
use View;
use Validator;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function login(){
        if(Input::has('username')){ 
            $data = array('username'=>Input::get('username'),'password'=>Input::get('password')); 
            if(Auth::attempt($data)){ 
                return redirect('/user/auth'); 
            } else {
                return view('user.login');
            }
        }
        return view('user.login');
    }

    public function index()
    {
        if (Auth::check())
            return redirect('/user/auth');
        return redirect('/user/login');
    }

    public function register() {
        if (Auth::check())
            return view('/user.register');
        else
            return redirect('/user/login');
    }


    public function loginCompleted() {
        if (Auth::check()) 
            return view('user.dashboard');
        else
            return redirect('/user/login');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
        $rules = array(
            'username'=>'required|min:3',
            'password'=>'required|min:3',
            'fullname'=>'required|min:3',
        );
        $validator=Validator::make(Input::all(),$rules);
        if ($validator->passes()) {
            $data = array(
                'username'=>Input::get('username'),
                'password'=>Input::get('password'),
                'fullname'=>Input::get('fullname'),
            );
            $user = new User;
            $user->username = $data['username'];
            $user->password = Hash::make($data['password']);
            $user->fullname = $data['fullname'];
            $user->createddate = date("Y-m-d");
            $user->updateddate = date("Y-m-d");
            $user->save();
            return redirect('/user/register_completed');
        }
        else
            echo 'Failed';
    }

    public function registerCompleted() {
        if (Auth::check())
            return redirect('/user/auth');
        else
            return redirect('/user/login');
    }


    public function delete($id) {
            if ($id != 1)  {
                $user = User::find($id);
                $user->delete();
            }
            return redirect('/user/auth');
    }

    public function search() {
        if (Auth::check())
            return view('user.search');
        else
            return redirect('/user/login');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        if (Auth::check())
            return view('user.edit')->with('id',$id);
        else
            return redirect('/user/login');
    }

    public function update($id){
        $user = User::find($id);
        $username_after = Input::get('username');
        $fullname_after = Input::get('fullname');
        $password_after = Input::get('password');
        $user->username = $username_after;
        $user->fullname = $fullname_after;
        if (!empty($password_after))
            $user->password = Hash::make($password_after);
        $user->updateddate = date("Y-m-d");
        $user->save();
        return redirect('/user/auth');
    }
}
