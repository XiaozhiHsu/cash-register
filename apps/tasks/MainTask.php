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
        $apple = new Product("苹果",12,"斤");
        $cola  = new Product("可乐",3,"瓶");

        $cash_register = new CashRegister();
        $cash_register->addItem( new Item($apple,1) );
        $cash_register->addItem( new Item($cola,5) );
        $cash_register->checkout();
    }
}