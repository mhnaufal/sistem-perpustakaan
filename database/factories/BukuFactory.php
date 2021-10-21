<?php

namespace Database\Factories;

use App\Models\Buku;
use Illuminate\Database\Eloquent\Factories\Factory;

class BukuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Buku::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'isbn' => $this->faker->isbn13(),
            'judul' => $this->faker->sentence(3, true),
            'idkategori' => $this->faker->numberBetween(1, 3),
            'pengarang' => $this->faker->name(),
            'penerbit' => $this->faker->company(),
            'kota_penerbit' => $this->faker->city(),
            'editor' => $this->faker->name(),
            'stok' => $this->faker->numberBetween(0, 20),
            'stok_tersedia' => $this->faker->numberBetween(0, 20),
        ];
    }
}
