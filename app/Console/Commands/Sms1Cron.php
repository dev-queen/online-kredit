<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CronSms;

class Sms1Cron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms1:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $cron_id = 1;

        CronSms::cronSmsFilter($cron_id);
    }
}
