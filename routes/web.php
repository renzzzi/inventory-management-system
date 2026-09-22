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

        '/create-account' => [
            'controller' => 'AuthController',
            'action' => 'showCreateAccount'
        ],

        '/forgot-password' => [
            'controller' => 'AuthController',
            'action' => 'showForgotPassword'
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