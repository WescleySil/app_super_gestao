<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MotivoContato;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiteContato>
 */
class SiteContatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $motivo_contatos = MotivoContato::all();
        return [
            //
            'nome' => fake()->name(),
            'telefone' => fake()->tollFreePhonenumber(),
            'email' => fake()->unique()->email(),
            'motivo_contatos_id' => $motivo_contatos[0]['id'],
            'mensagem' => fake()->text(200)
        ];
    }
}
