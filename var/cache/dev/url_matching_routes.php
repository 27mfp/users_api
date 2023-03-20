<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/users' => [
            [['_route' => 'api_users_collection', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'api_create_user', '_controller' => 'App\\Controller\\UserController::create'], null, ['POST' => 0], null, false, false, null],
        ],
        '/api/users/search' => [[['_route' => 'api_search_users', '_controller' => 'App\\Controller\\UserController::searchUsersByEmail'], null, ['GET' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/users/(\\d+)(?'
                    .'|(*:61)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        61 => [
            [['_route' => 'api_single_user', '_controller' => 'App\\Controller\\UserController::single'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_update_user', '_controller' => 'App\\Controller\\UserController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_delete_user', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['DELETE' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
