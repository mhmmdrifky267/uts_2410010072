<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode' => 'LAB-01', 'nama' => 'Lab Pemrograman 1', 'kapasitas' => 30, 'status' => true],
            ['kode' => 'LAB-02', 'nama' => 'Lab Pemrograman 2', 'kapasitas' => 30, 'status' => true],
            ['kode' => 'LAB-03', 'nama' => 'Lab Jaringan Komputer', 'kapasitas' => 25, 'status' => true],
            ['kode' => 'LAB-04', 'nama' => 'Lab Basis Data', 'kapasitas' => 28, 'status' => false],
            ['kode' => 'LAB-05', 'nama' => 'Lab Multimedia', 'kapasitas' => 20, 'status' => false],
        ];

        foreach ($data as $item) {
            Ruangan::create($item);
        }
    }
}