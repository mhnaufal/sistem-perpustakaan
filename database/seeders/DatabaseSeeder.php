<?php

namespace Database\Seeders;

use App\Models\Anggota;
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
        \App\Models\Anggota::factory(15)->create();

        $petugas = new Petugas([
            'nama' => 'Suhell',
            'password' => Hash::make('12341234'),
            'email' => 'suhell@unchdeep.ac.id'
        ]);
        $petugas->save();

        $anggota = new Anggota(([
            'nim' => '24060119100000',
            'nama' => 'Suheaven',
            'password' => Hash::make('12341234'),
            'alamat' => 'Jl. Jalan',
            'kota' => 'MMassachusett',
            'email' => 'lifeat@unchdeep.ac.id',
            'no_telp' => '081234567891'
        ]));
        $anggota->save();
        
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
        
        \App\Models\Buku::factory(31)->create();
    }
}