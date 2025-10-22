<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\JogetApiController;

class JogetAPISyncTicketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jogetapi:syncticket';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetches tickets from the Joget API and syncs them to the database';

    /**
     * Execute the console command.
     */
    public function handle(JogetApiController $controller)
    {
        $this->info('Starting ticket sync from Joget API...');

        // Call the sync method on the controller
        $result = $controller->syncTicket();

        // Check the result from the controller and display the appropriate message
        if ($result['success']) {
            $this->info($result['message']);
        } else {
            $this->error($result['message']);
        }

        return Command::SUCCESS;
    }
}
