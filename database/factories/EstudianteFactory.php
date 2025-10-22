<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    public function definition(): array
    {
        $nombre = $this->faker->name();
        $email = strtolower(str_replace(' ', '', $nombre)) . '@gmail.com';

        return [
            'nombre_completo' => $nombre,
            'email' => $email,
            'telefono' => $this->faker->numerify('+54 9 11 #### ####'),
        ];
    }
}
