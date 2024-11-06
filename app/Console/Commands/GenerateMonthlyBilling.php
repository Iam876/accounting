<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\BillingController;

class GenerateMonthlyBilling extends Command
{
    protected $signature = 'billing:generate';
    protected $description = 'Generate monthly billing for active students';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Call the billing generation method from BillingController
        app(BillingController::class)->generateMonthlyBilling();
        $this->info('Monthly billing generated successfully');
    }
}
