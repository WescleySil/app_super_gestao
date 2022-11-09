<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro= '';

        if($request->get('erro') == 1){
            $erro = "O Usuário e/ou senha não existe";
        }

        if($request->get('erro') == 2){
            $erro = "Necessário fazer login para acessar a página";
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request){

        //regras de validação
        $regras = [
            'usuario' => 'email ',
            'senha' => 'required',
        ];

        //Feedback da validação
        $feedback = [
            'usuario.email' => "O campo :attribute é obrigatório",
            'senha.required' => "O campo :attribute é obrigatório"
        ];

        $request->validate($regras,$feedback);

        $email = $request->get('usuario');
        $senha = $request->get('senha');

        //Iniciar o model user
        $user = new User();
        $usuario = $user->where('email',$email)->where('password',$senha)->get()->first();

        if(isset($usuario->name)){

            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');

        }else{
            return redirect()->route('site.login',['erro' => 1]);
        };
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
