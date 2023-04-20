<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('departaments')->insert([
            ['name' => 'Contábil', 'disponibility' => '1', 'created_at' => $now,  'updated_at' => $now],
            ['name' => 'Financeiro', 'disponibility' => '1', 'created_at' => $now,  'updated_at' => $now],
            ['name' => 'Fiscal', 'disponibility' => '1', 'created_at' => $now,  'updated_at' => $now],
            ['name' => 'Pessoal', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Qualidade', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Recursos Humanos', 'disponibility' => '1', 'created_at' => $now,  'updated_at' => $now],
            ['name' => 'Societário', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'T.I', 'disponibility' => '1', 'created_at' => $now,  'updated_at' => $now],
        ]);
    }
}
