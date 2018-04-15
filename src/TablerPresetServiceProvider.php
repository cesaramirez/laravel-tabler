<?php

namespace cesaramirez\Presets\Tabler;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class TablerPresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        PresetCommand::macro('tabler', function ($command) {
            TablerPreset::install();
            $command->info('Tabler scaffolding installed successfully.');
            $command->info('Please run "yarn && yarn run dev" to compile your fresh scaffolding.');
        });

        PresetCommand::macro('tabler-auth', function ($command) {
            TablerPreset::installAuth();
            $command->info('Tabler scaffolding with auth views installed successfully.');
            $command->info('Please run "yarn && yarn run dev" to compile your fresh scaffolding.');
        });
    }
}
