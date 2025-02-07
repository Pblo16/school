<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Filesystem\Filesystem;

class ComponentCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:component {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new component with model, migration, livewire components, and service';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $filesystem = new Filesystem();

        // Create model with migration
        Artisan::call("make:model {$name} -m");

        // Create livewire components
        Artisan::call("make:livewire {$name}/Edit");
        Artisan::call("make:livewire {$name}/View");
        Artisan::call("make:livewire {$name}/Show");
        Artisan::call("make:livewire {$name}/Create");
        Artisan::call("livewire:form {$name}Form");
        // Create service with specified methods
        Artisan::call("make:service {$name}Service --methods=delete,getAll");

        $this->info("Component {$name} created successfully.");
    }
}
