<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/association' => [[['_route' => 'association_index', '_controller' => 'App\\Controller\\AssociationController::index'], null, ['GET' => 0], null, true, false, null]],
        '/association/new' => [[['_route' => 'association_new', '_controller' => 'App\\Controller\\AssociationController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/don' => [[['_route' => 'don_index', '_controller' => 'App\\Controller\\DonController::index'], null, ['GET' => 0], null, true, false, null]],
        '/don/new' => [[['_route' => 'don_new', '_controller' => 'App\\Controller\\DonController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/association/([^/]++)(?'
                    .'|(*:31)'
                    .'|/edit(*:43)'
                    .'|(*:50)'
                .')'
                .'|/don/(?'
                    .'|([^/]++)(?'
                        .'|(*:77)'
                        .'|/edit(*:89)'
                        .'|(*:96)'
                    .')'
                    .'|email/([^/]++)(*:118)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:158)'
                    .'|wdt/([^/]++)(*:178)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:224)'
                            .'|router(*:238)'
                            .'|exception(?'
                                .'|(*:258)'
                                .'|\\.css(*:271)'
                            .')'
                        .')'
                        .'|(*:281)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        31 => [[['_route' => 'association_show', '_controller' => 'App\\Controller\\AssociationController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        43 => [[['_route' => 'association_edit', '_controller' => 'App\\Controller\\AssociationController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        50 => [[['_route' => 'app_association_delete', '_controller' => 'App\\Controller\\AssociationController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        77 => [[['_route' => 'don_show', '_controller' => 'App\\Controller\\DonController::show'], ['idDon'], ['GET' => 0], null, false, true, null]],
        89 => [[['_route' => 'don_edit', '_controller' => 'App\\Controller\\DonController::edit'], ['idDon'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        96 => [[['_route' => 'don_delete', '_controller' => 'App\\Controller\\DonController::delete'], ['idDon'], ['POST' => 0], null, false, true, null]],
        118 => [[['_route' => 'sendMailToUser', '_controller' => 'App\\Controller\\DonController::sendEmail'], ['email_use'], null, null, false, true, null]],
        158 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        178 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        224 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        238 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        258 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        271 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        281 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
