<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */
use Phalcon\Mvc\Router;

$router = new Router(false);
$router->add('/:controller/:action/:params', [
    'module'     => 'main',
    'namespace'  => 'App\Controllers',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
]);

$router->add('/:controller', [
    'module'     => 'main',
    'namespace'  => 'App\Controllers',
    'controller' => 1
]);

$router->add('/ajax/:controller/:action/:params', [
    'module'     => 'ajax',
    'namespace'  => 'App\Controllers\Ajax',
    'controller' => 1,
    'action'     => 2,
    'params'     => 3,
]);

$router->add('/ajax/:controller', [
    'module'     => 'ajax',
    'namespace'  => 'App\Controllers\Ajax',
    'controller' => 1
]);

$router->setDefaultModule('main');
$router->setDefaultNamespace('App\Controllers');
$router->setDefaultController('index');
$router->setDefaultAction('index');


return $router;