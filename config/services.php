<?php

return [
    'usuarios' => [
        'base_uri' => env('USUARIOS_SERVICE_BASE_URL'),
        'secret' => env('USUARIOS_SERVICE_SECRET'),
    ],

    'tareas' => [
        'base_uri' => env('TAREAS_SERVICE_BASE_URL'),
        'secret' => env('TAREAS_SERVICE_SECRET'),
    ],
];
