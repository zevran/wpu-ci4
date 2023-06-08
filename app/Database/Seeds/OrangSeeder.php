<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // $data = [
        //     [
        //         'nama'       => 'Ruby Soho',
        //         'alamat'     => 'Jl. Angkasa pura no. 478',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama'       => 'coba Nama',
        //         'alamat'     => 'Jl. Angkasa pura no. 345',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama'       => 'Coba kedua',
        //         'alamat'     => 'JL. pura no. 478',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        // ];
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 100; $i++) {
            $data = [
                'nama'       => $faker->name(),
                'alamat'     => $faker->address(),
                // membikin created_at random dari faker
                // datetime bawaan faker bentuknya adalah objek sedangkan CI inginya string sehingga harus di konversi dulu dg Time::createFromTimestamp() punyanya CI4
                // unixTime() untuk mengambil detik yang sudah berlalu sejak tahun 1970
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::now()
            ];
            $this->db->table('orang')->insert($data);
        }

        // pilih salah satu mau pakai Simple Queries atau pakai Query Builder
        // Simple Queries
        // $this->db->query('INSERT INTO orang (nama, alamat, created_at, updated_at) VALUES(:nama:, :alamat:, :created_at:, :updated_at:)', $data);

        // Using Query Builder
        // untuk menambahkan data satu record methodnya memakai insert()
        // $this->db->table('orang')->insert($data);
        // untuk menambahkan banyak record data, methodnya memakai insertBatch()
        // $this->db->table('orang')->insertBatch($data);
    }
}
