<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */

use Phalcon\DI;
use Phalcon\Loader;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;
use Phalcon\Http\Request;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as Database;
use Phalcon\Mvc\Application as BaseApplication;
use Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaData;
use Phalcon\Mvc\Model\Manager as ModelsManager;

$di = new DI();

// Registering a router
$di->set(
    'router',
    function () {
        return require __DIR__ . '/routes.php';
    }
);

// Registering a dispatcher
$di->set(
    'dispatcher',
    function () {
        return new Dispatcher();
    }
);

$di->set('url', function () {
        $url = new \Phalcon\Mvc\Url();
        $url->setBaseUri('/');
        return $url;
});

// Registering a Http\Response
$di->set(
    'response',
    function () {
        return new Response();
    }
);

// Registering a Http\Request
$di->set(
    'request',
    function () {
        return new Request();
    }
);



$di->set(
    'db',
    function ()  use ($config){
        return new Database(
            [
                'host'     => $config->database->host,
                'username' => $config->database->username,
                'password' => $config->database->password,
                'dbname'   => $config->database->dbname,
            ]
        );
    }
);

// Registering the Models-Metadata
$di->set(
    'modelsMetadata',
    function () {
        return new MemoryMetaData();
    }
);

// Registering the Models Manager
$di->set(
    'modelsManager',
    function () {
        return new ModelsManager();
    }
);

$di->setShared(
    'session',
    function () {
        $session = new Phalcon\Session\Adapter\Files();
        $session->start();
        return $session;
    }
);
