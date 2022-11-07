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
            ]);
        if(SiteContato::create($request->all()) == true){
        $msg = "Mensagem cadastrada com sucesso";
        return redirect()->route('site.index')->with('status', $msg);
        }else{
            return back()->withErrors($errors);
        }
    }
}
