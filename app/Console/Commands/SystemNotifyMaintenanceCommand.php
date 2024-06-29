<?php

namespace App\Console\Commands;

<<<<<<< HEAD
use App\Events\SystemMaintenanceEvent;
=======
>>>>>>> f175fc268731be76882ecde9c1be8f7e951af682
use Illuminate\Console\Command;

class SystemNotifyMaintenanceCommand extends Command
{
    protected $signature = 'system:notify-maintenance';
 
    protected $description = 'Command description';
 
    public function handle(): void
    {
        $time = $this->ask('When should it happen?');
 
        event(new SystemMaintenanceEvent($time));
    }
}
