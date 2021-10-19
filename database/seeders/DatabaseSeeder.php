<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

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
