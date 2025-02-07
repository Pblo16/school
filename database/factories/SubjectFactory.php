<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = [
            'Matemáticas',
            'Física',
            'Química',
            'Biología',
            'Historia',
            'Geografía',
            'Literatura',
            'Filosofía',
            'Arte',
            'Música',
            'Educación Física',
            'Informática',
            'Economía',
            'Psicología',
            'Sociología',
            'Derecho',
            'Idiomas',
            'Ciencias Ambientales'
        ];

        return [
            'nombre' => $this->faker->randomElement($subjects),
        ];
    }
}
