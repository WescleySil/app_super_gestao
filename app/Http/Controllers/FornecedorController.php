<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'Fornecedor 1',
                'status' => 'N',
                'CNPJ' => '0',
                'ddd' => '11', //Rio de Janeiro (SP)
                'telefone' => '00000-0000'
        ],
            1 => [
                'nome' => 'Fornecedor 2',
                'status' => 'N',
                'CNPJ' => null,
                'ddd' => '85', //Fortaleza (CE)
                'telefone' => '00000-0000'

        ],
            2 => [
                'nome' => 'Fornecedor 3',
                'status' => 'S',
                'CNPJ' => '0',
                'ddd' => '32', //Juiz de Fora (MG)
                'telefone' => '00000-0000'

        ]
    ];

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
