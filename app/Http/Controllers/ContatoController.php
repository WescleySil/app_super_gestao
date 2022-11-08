<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato(){
        $motivo_contatos = MotivoContato::all();

        return view("site.contato", ['titulo'=>'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }
    public function salvar(Request $request){
        $request->validate([
            'nome' => 'required | min:3 | max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required | max:2000'
        ],
        [
            'required' => 'O campo :attribute precisa ser preenchido!',
            'min' => 'O campo :attribute precisa ter no minímo 3 caracteres!',
            'mensagem.max' => 'O campo :attribute deve ter no máximo 40 caracteres!',
            'nome.max' => 'O campo :attribute deve ter no máximo 2000 caracteres!',
            'email' => 'O campo :attribute deve ser um email válido',
        ]
        );
        if(SiteContato::create($request->all()) == true){
        $msg = "Mensagem cadastrada com sucesso";
        return redirect()->route('site.index')->with('status', $msg);
        }else{
            return back()->withErrors($errors);
        }
    }
}
