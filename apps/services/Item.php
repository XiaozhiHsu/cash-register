<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;

class Item{

    public $product;

    public $number;

    public $policy;

    public function __construct( Product $product ,$number = 1){
        $this->product = $product;
        $this->number  = max($number,1);
        $this->policy  = PolicyFactory::create( $this->product->getSerialNumber() );
    }

    public function printer(){
        echo $this->product->getName().':'.$this->product->getFormatPrice(2).
            ' * '.$this->number.$this->product->getUnitLabel().' = '.number_format($this->product->getPrice()*$this->number,2).PHP_EOL;
    }

    public function getShouldPay(){
        $amount = $this->policy->getAmount($this->product->getPrice(),$this->number);
        return number_format($amount,2);
    }

    public function getFree(){
        return $this->policy->getFree($this->number);
    }

    public function getAmount(){
        return number_format($this->product->getPrice() * $this->number,2);
    }

    public function incr( $number = 0){
        $this->number = $this->number + $number;
    }

    public function getNumber(){
        return $this->number;
    }

}