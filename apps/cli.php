<?php
use Phalcon\Di\FactoryDefault\Cli as CliDI;
use Phalcon\Cli\Console as ConsoleApp;
use Phalcon\Loader;



// 使用CLI工厂类作为默认的服务容器
$di = new CliDI();

$config = include __DIR__ . '/config/config.php';


$loader = new Loader();
$loader->registerNamespaces(
    [
        'App\Tasks'              => __DIR__ . '/tasks',
        'App\Models'             => __DIR__ . '/models',
        'App\Library'            => __DIR__ . '/library',
        'App\Services'           => __DIR__ . '/services',
    ]
);


$loader->register();


// 加载配置文件（如果存在）

$di->set("config", $config);

$di->setShared('dispatcher', function () {
    $dispatcher = new Phalcon\CLI\Dispatcher();
    $dispatcher->setDefaultNamespace('App\Tasks');
    return $dispatcher;
});


// 创建console应用
$console = new ConsoleApp();

$console->setDI($di);



/**
 * 处理console应用参数
 */
$arguments = [];

foreach ($argv as $k => $arg) {
    if ($k === 1) {
        $arguments["task"] = $arg;
    } elseif ($k === 2) {
        $arguments["action"] = $arg;
    } elseif ($k >= 3) {
        $arguments["params"][] = $arg;
    }
}



try {
    // 处理参数
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    //var_dump($e);
    echo $e->getLine();
    echo $e->getMessage();

    exit(255);
}