<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        $user = User::all();
        return view("user.listAll", ["usuarios" => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        return view("auth.register");

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $erros = [];

        if(empty($request->name)){
            $erros['name'] = "Informe o nome do usuário";
        }

        if(empty($request->email)){
            $erros['email'] = "Informe o e-mail do usuário";
        }else{
            $usuario = User::where('email',$request->email)->first();
            if($usuario){
                $erros['email'] = "Já existe um usuário cadastrado com esse e-mail";
            }
        }

        if(empty($request->password)){
            $erros['password'] = "Informe a senha de acesso";
        }

        if(empty($request->password_confirmation)){
            $erros['password_confirmation'] = "Confirme a senha de acesso";
        }

        if($request->password != $request->password_confirmation){
            $erros['password_confirmation'] = "As senhas informadas são diferentes";
        }

        if($erros){
            return redirect()->back()->withInput()->withErrors($erros);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route("user.show", $user->id);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        return view("user.list", ["usuario" => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        if(Auth::check() !== true){
            return redirect()->route("login");
        }

        return view("user.edit", [
            'usuario' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $erros = [];

        if(empty($request->name)){
            $erros['name'] = "Informe o nome do usuário";
        }

        if(empty($request->email)){
            $erros['email'] = "Informe o e-mail do usuário";
        }else{
            $usuario = User::where('email',$request->email)->first();
            if($usuario && $usuario->id != $user->id){
                $erros['email'] = "Já existe um usuário cadastrado com esse e-mail";
            }
        }

        if((!empty($request->password) || !empty($request->password_confirmation)) && $request->password != $request->password_confirmation){
            $erros['password_confirmation'] = "As senhas informadas são diferentes";
        }

        if($erros){
            return redirect()->back()->withInput()->withErrors($erros);
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->Password)) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route("user.show", $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route("user.index");
    }
}
