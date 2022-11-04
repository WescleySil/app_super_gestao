<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeto
        $fornecedor = new Fornecedor;
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'fornecedor100@gmail.com.br';
        $fornecedor->save();

        //Usando o metodo create
        Fornecedor::create(['nome'=>'Fornecedor 200','site'=>'fornecedor200.com.br','uf'=>'RS','email'=>'fornecedor200@gmail.com.br']);

        //insert
        DB::table('fornecedores')->insert(
            [
                'nome'  => 'Fornecedor 300',
                'site' => 'fornecedor300.com.br',
                'uf' => 'SP',
                'email' => 'fornecedor300@gmail.com.br'
            ]
        );

    }
}
