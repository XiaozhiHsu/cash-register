<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;

class Item{

    public $product;

    public $number;

    public function __construct( Product $product ,$number = 1){
        $this->product = $product;
        $this->number  = max($number,1);
    }

    public function printer(){
        echo $this->product->getName().':'.$this->product->getFormatPrice(2).
            ' * '.$this->number.$this->product->getUnitLabel().' = '.number_format($this->product->getPrice()*$this->number,2).PHP_EOL;
    }

    public function getAmount(){
        $policy = PolicyFactory::create( $this->product->getSerialNumber() );
        $amount = $policy->getAmount($this->product->getPrice(),$this->number);

        return number_format($amount,2);
    }

    public function incr( $number = 0){
        $this->number = $this->number + $number;
    }

}