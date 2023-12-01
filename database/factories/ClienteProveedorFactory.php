<?php

namespace Database\Factories;

use App\Models\ClienteProveedor;
use Illuminate\Database\Eloquent\Factories\Factory;


class ClienteProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

     protected $model = ClienteProveedor::class;

    public function definition()
    {
      

        return [
            'activo' => $this->faker->boolean,
            'razon_social' => $this->faker->company,
            'DNI' => $this->faker->unique()->randomNumber(8),
            'domicilio' => $this->faker->address,
            'provincia' => $this->faker->state,
            'cod_postal' => $this->faker->postcode,
            'telefono' => $this->faker->phoneNumber,
            'mail' => $this->faker->email,
            'moneda' => $this->faker->randomElement(['USD', 'EUR', 'ARS']),
            'condicion_iva' => $this->faker->randomElement(['RI', 'M', 'E']),
            'registro_fce' => $this->faker->randomElement(['RI', 'M', 'E']), //=> $this->faker->date,
            'observaciones'=> $this->faker->text($maxNbChars = 20),
            'tipo' => $this->faker->randomElement([1, 2, 3]),
            'created_at' => now(),
            'updated_at' => now(),
            
        ];
        
        
        
             




    }
}
