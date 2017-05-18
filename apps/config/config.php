<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */

use Phalcon\Config;
return new Config(
    [
        'database' => [
            'adapter'     => 'Mysql',
            'host'        => '',
            'username'    => '',
            'password'    => '',
            'dbname'      => '',
        ]
    ]
);

