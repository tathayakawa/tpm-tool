<?php

namespace App\Listeners;

use Illuminate\Console\Events\CommandFinished;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;

class AfterMigration
{
    protected Application $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function handle(CommandFinished $event): void
    {
        if ('migrate' !== $event->command) {
            return;
        }
        if ($this->app->runningUnitTests()) {
            return;
        }
        if (!$this->app->runningInConsole()) {
            return;
        }
        if ($this->app->isProduction()) {
            return;
        }
        Artisan::call('ide-helper:models -N');
    }
}
