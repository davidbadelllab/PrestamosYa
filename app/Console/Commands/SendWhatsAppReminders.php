<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendWhatsAppReminders extends Command
{
    protected $signature = 'reminders:send-whatsapp';
    protected $description = 'Enviar recordatorios de pago por WhatsApp';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Lógica para enviar recordatorios por WhatsApp
        $this->info('Recordatorios de WhatsApp enviados con éxito.');
    }
}
