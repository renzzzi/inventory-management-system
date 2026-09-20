<?php

$routes = [
    'GET' => [
        '/' => [
            'controller' => 'HomeController',
            'action' => 'index'
        ],

        '/login' => [
            'controller' => 'AuthController',
            'action' => 'showLogin'
        ],

        '/dashboard' => [
            'controller' => 'DashboardController',
            'action' => 'index'
        ],

        '/logout' => [
            'controller' => 'AuthController',
            'action' => 'logout'
        ],

        '/products' => [
            'controller' => 'ProductController',
            'action' => 'index'
        ],
    ],

    'POST' => [
        '/login/submit' => [
            'controller' => 'AuthController',
            'action' => 'login'
        ],
    ],
];  