<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        DB::table('classifications')->insert([
            ['name' => 'Acumuladores/erro de classificação', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Admissão', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Apenas registro', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Baixa contábil', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cadastro de clientes', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Certificado Digital', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cliente não entregou os documentos no prazo', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Código de substituição tributária (CST)', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comunicação com o cliente', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comunicação interna', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Conferência', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Conta contábil no acumulador', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DARF', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DCTFWEB', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'DIRF', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Divergência de apuração e/ ou documentos na salvo na rede', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Documentos divergentes', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'ECD', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Entrega do balanço', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Escrituração de NF', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'E-social', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Falta de Documentos', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fechamento fiscal', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Férias', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Folha de Pagamento', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fora do prazo', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gestta', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'IBGE', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Importação Domínio', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Integração com o cliente', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'IR de aluguel', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'IRPJ E CSLL', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'IRRF', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lançamentos', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Licença remunerada', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'NF duplicadas', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Parâmetro contábil', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Parâmetro DP', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'PIS / COFINS', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Provisão de férias/13°', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'RAIS', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Recálculo', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Receita financeira', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Requisitos do cliente', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Requisitos internos', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rescisão', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'SPED', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Treinamento cliente', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Treinamento interno', 'disponibility' => '1', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
