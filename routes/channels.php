<?php
// routes/channels.php

use Illuminate\Support\Facades\Broadcast;

// Canal público para tickets
Broadcast::channel('tickets', function ($user) {
    return true; // Todos los usuarios autenticados pueden escuchar
});

// Si quieres que solo admins escuchen:
// Broadcast::channel('tickets', function ($user) {
//     return $user->id_tipo_usuario_rol == 1; // Solo admins
// });
