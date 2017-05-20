<?php
/**
 * @author Xiaozhi Hsu <xiaozhiHsu@gmail.com>
 * @Date   2017-02-15
 */

namespace App\Models;

use Phalcon\Mvc\Model;

class Users extends Model
{

    public $id;

    public $name;

    public $password;

    public $ip;

    public $ctime;

    public function initialize()
    {
        $this->setSource("users");
    }
}
