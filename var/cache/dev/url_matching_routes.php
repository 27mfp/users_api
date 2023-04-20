<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
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
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/api/users/(?'
                    .'|([^/]++)(?'
                        .'|(*:194)'
                    .')'
                    .'|search/([^/]++)(*:218)'
                .')'
                .'|/users/search/([^/]++)(*:249)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        194 => [
            [['_route' => 'api_users_update', '_controller' => 'App\\Controller\\UserController::update'], ['email'], ['GET' => 0, 'PUT' => 1, 'PATCH' => 2], null, false, true, null],
            [['_route' => 'api_users_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['email'], ['GET' => 0, 'DELETE' => 1], null, false, true, null],
        ],
        218 => [[['_route' => 'api_users_single', '_controller' => 'App\\Controller\\UserController::search'], ['email'], ['GET' => 1], null, false, true, null]],
        249 => [
            [['_route' => 'users_single'], ['email'], ['GET' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
