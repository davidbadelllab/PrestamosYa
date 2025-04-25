<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http; // Si usas un servicio HTTP para conectar a Node.js

class ReminderController extends Controller
{
    public function sendReminders()
    {
        $prestamos = Prestamo::with('deudor', 'aval')
            ->whereDate('fecha_final', Carbon::tomorrow())
            ->get();

        foreach ($prestamos as $prestamo) {
            $deudorMessage = "Hola {$prestamo->deudor->nombre_completo}, recuerda que tu deuda vence el {$prestamo->fecha_final}.";
            $avalMessage = "Hola {$prestamo->aval->nombre_completo}, {$prestamo->deudor->nombre_completo} tiene una deuda que vence en {$prestamo->fecha_final}.";

            // Envía los mensajes a través del sistema de WhatsApp-web.js
            $this->sendWhatsAppNotification($prestamo->deudor->telefono, $deudorMessage);
            $this->sendWhatsAppNotification($prestamo->aval->telefono, $avalMessage);
        }

        return response()->json(['message' => 'Recordatorios enviados']);
    }

    private function sendWhatsAppNotification($telefono, $mensaje)
    {
        // Llamar a la API de WhatsApp-web.js o invocar el script de Node.js
        Http::post('http://localhost:3000/send-message', [
            'telefono' => $telefono,
            'mensaje' => $mensaje,
        ]);
    }
}
