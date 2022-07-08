<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //

    public function index(Request $request){
        $users = User::all();
        return view("users_index", ['users' => $users]);
    }

    public function store(Request $request){
        $id = $request->input("id");

        $user = null;
        if (!isset($id)){
            $user = new User();
        }else{
            $user = User::find($id);
        }
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = $request->input("password");
        $user->save();

        return redirect("/users");

    }

    public function del($id){
        //validamos
        if ($_SESSION['user_id'] == $id){
            return "Error, no se puede borrar el usuario actual";
        }

        $user = User::find($id);

        if(isset($user)){
            $user->delete();

        }

        return redirect("/users");
    }

    public function add(Request $request){
        $user = new User();
        return view ("users_form", ['user' => $user]);
    }

    public function edit($id){
        $user = User::find($id);
        return view ("users_form", ['user' => $user]);
    }

    /**
     * Cerrar sesión,
     * elimina la sesión actual
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        unset($_SESSION['user_id']);
        return redirect("/");
    }


    public function login(Request $request)
    {
        $email = $request->input("email");
        $pass = $request->input("password");

        $user = User::where("email", $email)->where('password', $pass)->first();

        if ($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
        }

        return redirect("/");
    }
}
