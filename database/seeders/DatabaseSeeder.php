<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Petugas::factory(1)->create();
        \App\Models\Anggota::factory(3)->create();

        $petugas = new Petugas([
            'nama' => 'Suhell',
            'password' => Hash::make('12341234'),
            'email' => 'suhell@unchdeep.ac.id'
        ]);
        $petugas->save();
        
        $novel = new Kategori([
            'nama' => 'Novel'
        ]);
        $novel->save();
        
        $fiksi = new Kategori([
            'nama' => 'Fiksi'
        ]);
        $fiksi->save();

        $cerpen = new Kategori([
            'nama' => 'Cerpen'
        ]);
        $cerpen->save();
        
        \App\Models\Buku::factory(10)->create();
    }
}
