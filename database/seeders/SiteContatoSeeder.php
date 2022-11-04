<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /* SiteContato::create(['nome'=>'Abruah ','telefone'=>'95 9412846824','email'=>'Abrauh@gmail.com','motivo_contato'=>0,'mensagem'=>'Mensagem pro banco de dados']); */

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
