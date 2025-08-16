<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while(true) {
            DB::table('accounts')->insert([
                'name' => fake()->name,
                'phone' => fake()->phoneNumber()
            ]);

            usleep(10000);
            echo 'added record';
            $this->newLine();
        }
    }
}
