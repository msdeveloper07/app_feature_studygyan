<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BeforeOnedaySendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'beforeoneday:sendemail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Before One day Send Email';

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
    public function handle(){
        $controller = app('App\Http\Controllers\EventController')->beforeOneDayEmailFire();
		return $this->$controller;
    }
}
