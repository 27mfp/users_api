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
        '/users' => [
            [['_route' => 'users_search'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'users_create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'users_update'], null, ['PUT' => 0], null, false, false, null],
            [['_route' => 'users_delete'], null, ['DELETE' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/users/(?'
                    .'|([^/]++)(?'
                        .'|(*:67)'
                    .')'
                    .'|search/([^/]++)(*:90)'
                .')'
                .'|/users/search/([^/]++)(*:120)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        67 => [
            [['_route' => 'api_users_update', '_controller' => 'App\\Controller\\UserController::update'], ['email'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, true, null],
            [['_route' => 'api_users_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['email'], ['GET' => 0, 'DELETE' => 1], null, false, true, null],
        ],
        90 => [[['_route' => 'api_users_single', '_controller' => 'App\\Controller\\UserController::search'], ['email'], ['GET' => 1], null, false, true, null]],
        120 => [
            [['_route' => 'users_single'], ['email'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
