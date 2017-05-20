<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;

class DonatePolicy{

    protected $round = 2;

    public function __construct( $round = 2 ){
        $this->round = $round;
    }

    public function getAmount( $price,$number ){
        $donate = intval($number/$this->round);
        return floatval($price * ($number - $donate));
    }

    public function getFree( $number ){
        $donate = intval($number/$this->round);
        return $donate;
    }
}