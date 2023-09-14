<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class InsumoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'FAMILIA' => $this->faker->word, // Ejemplo: "Construcción"
            'SUB_FAMILIA' => $this->faker->numberBetween(1, 5), // Ejemplo: 3
            'DESCRIPCION' => $this->faker->text($maxNbChars = 20), // Ejemplo: "Arena fina para construcción"
            'NRO_SERIE' => $this->faker->numerify('###-####'), // Ejemplo: "123-4567"
            'UNIDAD' => $this->faker->word, // Ejemplo: "Kilogramos"
            'PRECIO_UNIT' => $this->faker->randomFloat(2, 5, 50), // Ejemplo: 23.45
            'COD_CLI_PRO' => $this->faker->numberBetween(1000, 9999), // Ejemplo: 5678
            'FECHA_PRECIO' => $this->faker->dateTimeThisDecade, // Fecha y hora aleatoria
            'CANTIDAD' => $this->faker->randomFloat(2, 10, 1000), // Ejemplo: 123.45
            'EXISTENCIA' => $this->faker->randomFloat(2, 0, 500), // Ejemplo: 56.78
            'DATC_CODE' => $this->faker->bothify('??-####'), // Ejemplo: "AB-5678"
            'ACTIVO' => $this->faker->boolean(80), // 80% de probabilidad de ser "1" y 20% de ser "0"
            'unidad_compra' => $this->faker->word, // Ejemplo: "Bultos"
            'factor_conversion' => $this->faker->randomFloat(2, 0.1, 2.0), // Ejemplo: 1.25
            'precio_unidad_compra' => $this->faker->randomFloat(2, 10, 100), // Ejemplo: 45.67
            'cant_cod_serie' => $this->faker->numberBetween(0, 5), // Ejemplo: 3
        ];
    }
}
