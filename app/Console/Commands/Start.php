<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Start extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Config App';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Generate application key and run migrations
        $this->info('Setting up application...');
        $this->call('key:generate');
        $this->call('migrate:fresh');

        // Run database seeder
        $this->info('Seeding database...');
        $this->call('db:seed');

        $this->info('Application setup completed successfully!');
    }
}
