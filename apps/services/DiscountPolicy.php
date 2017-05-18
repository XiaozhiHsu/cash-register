<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;

class DiscountPolicy{

    protected $percent = 100;

    public function __construct( $percent = 100 ){
        $this->percent = $percent;
    }

    public function getAmount( $price,$number ){
        return floatval($price * $number * $this->percent / 100);
    }

}