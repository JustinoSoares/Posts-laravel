<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Broadcast;


class NewMessageListener
{

    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // Broadcast::channel('new-message', function ($user) {
        //     return true; // Ou implemente sua lógica de autorização aqui
        // });
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        //
    }
}
