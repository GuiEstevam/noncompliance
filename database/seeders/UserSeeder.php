<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('users')->insert([
            ['name' => 'Alan Frota', 'username' => 'alan.frota', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Amanda Felipe', 'username' => 'amanda.felipe', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Guilherme Cunha', 'username' => 'guilherme.cunha', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Gustavo Baqueta', 'username' => 'gustavo.baqueta', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Ingrid Silva', 'username' => 'ingrid.silva', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Larissa Landim', 'username' => 'larissa.landim', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Liliana Santos', 'username' => 'liliana.santos', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Amanda Lima', 'username' => 'amanda.lima', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Silvana Dias', 'username' => 'silvana.dias', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Suzane Oliveira', 'username' => 'suzane.oliveira', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Vitória Brasileiro', 'username' => 'vitória.brasileiro', 'password' => Hash::make('C0nsult@'), 'departament' => '1', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Alisson Pereira', 'username' => 'alisson.pereira', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Caê Teixeira', 'username' => 'caê.teixeira', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Elaine Nascimento', 'username' => 'elaine.nascimento', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Hellem Felipe', 'username' => 'hellem.felipe', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Julia Barela', 'username' => 'julia.barela', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Taciana Vieira', 'username' => 'taciana.vieira', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Tatiana Monteiro', 'username' => 'tatiana.monteiro', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Thais Souza', 'username' => 'thais.souza', 'password' => Hash::make('C0nsult@'), 'departament' => '4', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Cinara Silva', 'username' => 'cinara.silva', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Euclides Souza', 'username' => 'euclides.souza', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Gabriela Alves', 'username' => 'gabriela.alves', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Kaio Souza', 'username' => 'kaio.souza', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Karina Aguiar', 'username' => 'karina.aguiar', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Leandra da Silva', 'username' => 'leandra.silva', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Lívia Freitas', 'username' => 'lívia.freitas', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Nayane Silva', 'username' => 'nayane.silva', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Paloma Rodrigues', 'username' => 'paloma.rodrigues', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Roberta Cruz', 'username' => 'roberta.cruz', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Suene Andrade', 'username' => 'suene.andrade', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Veridiana Romera', 'username' => 'veridiana.romera', 'password' => Hash::make('C0nsult@'), 'departament' => '3', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Henrique Olivares', 'username' => 'henrique.olivares', 'password' => Hash::make('C0nsult@'), 'departament' => '7', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Maria Eduarda Garcia', 'username' => 'maria.eduarda', 'password' => Hash::make('C0nsult@'), 'departament' => '7', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Mônica Souza', 'username' => 'mônica.souza', 'password' => Hash::make('C0nsult@'), 'departament' => '7', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Rafaela Teixeira', 'username' => 'rafaela.teixeira', 'password' => Hash::make('C0nsult@'), 'departament' => '2', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],
            ['name' => 'Rosinete Cruz', 'username' => 'rosinete.cruz', 'password' => Hash::make('C0nsult@'), 'departament' => '2', 'created_at' => $now, 'updated_at' => $now, 'role_id' => '1'],

        ]);
    }
}
