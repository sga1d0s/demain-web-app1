<?php

namespace App\Support\Demo;

class DemoOrders
{
    public static function all(): array
    {
        return [
            [
                'code' => 'WO-1001',
                'title' => 'Instalar AP WiFi en recepción',
                'client' => 'Clínica Loyola',
                'priority' => 'Media',
                'status' => 'En curso',
                'assignee' => 'Sergio',
                'created_at' => '2026-02-10',
                'due_at' => '2026-03-01',
                'summary' => 'AP Ubiquiti + ajuste de canal + SSID invitados.',
                'notes' => [
                    ['at' => '2026-02-10 10:15', 'text' => 'Llamada inicial, recopilados requisitos.'],
                    ['at' => '2026-02-12 09:05', 'text' => 'Propuesta enviada + coste estimado.'],
                ],
            ],
            [
                'code' => 'WO-1002',
                'title' => 'VPN WireGuard para teletrabajo',
                'client' => 'Demain IT',
                'priority' => 'Alta',
                'status' => 'Pendiente',
                'assignee' => 'Nerea',
                'created_at' => '2026-02-20',
                'due_at' => '2026-02-28',
                'summary' => 'Acceso seguro a NAS QNAP + rutas internas.',
                'notes' => [
                    ['at' => '2026-02-20 17:40', 'text' => 'Pendiente validar puertos y DDNS.'],
                ],
            ],
            [
                'code' => 'WO-1003',
                'title' => 'Recuperación backup y verificación',
                'client' => 'Inmobiliaria Norte',
                'priority' => 'Crítica',
                'status' => 'Resuelto',
                'assignee' => 'Sergio',
                'created_at' => '2026-02-05',
                'due_at' => '2026-02-06',
                'summary' => 'Restauración incremental + prueba de integridad.',
                'notes' => [
                    ['at' => '2026-02-05 08:12', 'text' => 'Detectado fallo en tarea nocturna.'],
                    ['at' => '2026-02-06 11:30', 'text' => 'Restaurado, validado con usuario.'],
                ],
            ],
        ];
    }

    public static function find(string $code): ?array
    {
        foreach (self::all() as $o) {
            if ($o['code'] === $code) return $o;
        }
        return null;
    }
}