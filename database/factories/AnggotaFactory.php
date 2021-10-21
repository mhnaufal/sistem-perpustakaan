<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AnggotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Anggota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => '2406011'.$this->faker->unique()->randomNumber(7),
            'nama' => $this->faker->name,
            'password' => Hash::make('12341234'),
            'alamat' => $this->faker->address(),
            'kota' => $this->faker->city(),
            'email' => $this->faker->unique()->safeEmail(),
            'no_telp' => '08'.$this->faker->unique()->randomNumber(9),
        ];
    }
}
