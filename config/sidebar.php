<?php

return [

    'user' => [
        [
            'title' => 'dashboard',
            'route' => 'dashboard',
            'icon' => 'ri-dashboard-fill',
            'sub' => []
        ],
        [
            'title' => 'task',
            'route' => 'dashboard/task',
            'icon' => 'ri-file-mark-line',
            'sub' => [
                [
                    'title' => 'list task',
                    'route' => 'dashboard/task/list',
                    'icon' => '',
                ],
                [
                    'title' => 'create task',
                    'route' => 'dashboard/task/create',
                    'icon' => '',
                ],
            ]
        ],
        [
            'title' => 'profile',
            'route' => 'dashboard/profile',
            'icon' => 'ri-shield-user-fill',
            'sub' => []
        ],

    ],
    'admin' => [
        [
            'title' => 'dashboard',
            'route' => 'dashboard',
            'icon' => 'ri-shield-user-fill',
            'sub' => []
        ]
    ]

];