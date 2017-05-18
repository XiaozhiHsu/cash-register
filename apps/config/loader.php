<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */

use Phalcon\Loader;

$loader = new Loader();


$loader->registerNamespaces(
    [
        'App\Models'             => __DIR__ . '/../../apps/models',
        'App\Library'            => __DIR__ . '/../../apps/library',
        'App\Services'           => __DIR__ . '/../../apps/services',
    ]
);

$loader->register();
