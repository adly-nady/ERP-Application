<?php

return [


    'defaults' => [
        'guard' => 'users',
        'passwords' => 'users',
    ],

    'guards' => [
        'users' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admins' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'top_admins' => [
            'driver' => 'session',
            'provider' => 'top_admins',
        ],

    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'top_admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Top_admins::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
