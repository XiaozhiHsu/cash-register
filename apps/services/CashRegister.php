<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class CashRegister{

    protected $item_list = [];

    public function addItem( Item $item ){
        array_push($this->item_list, $item);
    }

    public function checkout(){
        array_reduce($this->item_list, function($reuslt,$item){
            $item->printer();
        });
        echo '--------------------'.PHP_EOL;
    }
}
