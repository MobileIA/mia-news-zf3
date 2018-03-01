<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace MIANews;

use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return array(
    'router' => [
        'routes' => [
            'news' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/news',
                    'defaults' => [
                        'controller' => Controller\NewsController::class,
                        'action'     => 'index',
                    ],
                ],
                'child_routes' => [
                    'list' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/list[/:page]',
                            'defaults' => [
                                'controller' => Controller\NewsController::class,
                                'action'     => 'index',
                                'page'       => 1
                            ],
                        ],
                    ],
                    'add' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/add',
                            'defaults' => [
                                'controller' => Controller\NewsController::class,
                                'action'     => 'add',
                            ],
                        ],
                    ],
                    'edit' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/edit/:id',
                            'defaults' => [
                                'controller' => Controller\NewsController::class,
                                'action'     => 'edit',
                            ],
                        ],
                    ],
                    'delete' => [
                        'type'    => Segment::class,
                        'options' => [
                            'route'    => '/delete/:id',
                            'defaults' => [
                                'controller' => Controller\NewsController::class,
                                'action'     => 'delete',
                            ],
                        ],
                    ],
                ]
            ],
            'api-trivia-list' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/api/news/list',
                    'defaults' => [
                        'controller' => Controller\ApiController::class,
                        'action'     => 'list',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ApiController::class => InvokableFactory::class,
            Controller\NewsController::class => InvokableFactory::class
        ],
    ],
    'service_manager' => [
        'factories' => [
            Table\NewsTable::class => \MIABase\Factory\TableFactory::class,
        ],
    ],
    'authentication_acl' => [
        'resources' => [
            Controller\NewsController::class => [
                'actions' => [
                    'index' => ['allow' => 'admin'],
                    'add' => ['allow' => 'admin'],
                    'edit' => ['allow' => 'admin'],
                    'delete' => ['allow' => 'admin'],
                ]
            ],
            Controller\ApiController::class => [
                'actions' => [
                    'list' => ['allow' => 'guest'],
                ]
            ],
        ],
    ],
    'view_manager' => array(
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
