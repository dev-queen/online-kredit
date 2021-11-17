<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;

class CronController extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cron:controller';

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
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'app/log/test.txt', '1'. PHP_EOL, FILE_APPEND | LOCK_EX);
    }
}

//
//namespace App\Http\Controllers\Crons\Cron;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//
//class CronController extends Controller
//{
//
//    public function actionCronSmsFilter()
//    {
//        dd('hello');
//        die();
//    }
//}