<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Tasks;

use Phalcon\Cli\Task;
use App\Services\Product;
use App\Services\CashRegister;
use App\Services\Item;

class MainTask extends Task{
    public function indexAction(){
        $cash_register = new CashRegister();
        $cash_register->startUp();
        $cash_register->checkout();
    }
}