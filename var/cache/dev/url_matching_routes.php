<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [[['_route' => 'app_test_index', '_controller' => 'App\\Controller\\TestController::index'], null, null, null, false, false, null]],
        '/api/users' => [
            [['_route' => 'api_users_list', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 1], null, false, false, null],
            [['_route' => 'api_users_create', '_controller' => 'App\\Controller\\UserController::create'], null, ['GET' => 0, 'POST' => 1], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/users/(?'
                    .'|([^/]++)(?'
                        .'|(*:67)'
                    .')'
                    .'|search(*:81)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [
            [['_route' => 'api_users_update', '_controller' => 'App\\Controller\\UserController::update'], ['email'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, true, null],
            [['_route' => 'api_users_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['email'], ['GET' => 0, 'DELETE' => 1], null, false, true, null],
        ],
        81 => [
            [['_route' => 'api_users_search', '_controller' => 'App\\Controller\\UserController::search'], [], ['GET' => 1], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
