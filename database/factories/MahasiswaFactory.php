<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim'=>$this->faker->unique()
                ->numberBetween($min=2323001,$max=2323999),
            'nama'=>$this->faker->name(),
            'angkatan'=>2023,
            'jurusan'=>'SI',
        ];
    }
}
