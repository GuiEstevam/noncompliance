<?php

namespace App\Console\Commands;

use App\Models\Compliance;
use Illuminate\Console\Command;

class UpdateComplianceStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-compliance-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualiza o status dos relatórios em atraso';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $compliances = Compliance::where('efficiency_check', '<', now())
            ->whereNotIn('status', [3])
            ->get();

        foreach ($compliances as $compliance) {
            $compliance->check_late = 1;
            $compliance->save();
        }
        $this->info('Status das compliances atualizado com sucesso!');
    }
}
