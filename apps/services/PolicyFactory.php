<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class PolicyFactory{

    public static function create( $serial_number ){
        switch ( $serial_number ) {

            case 'MEI0002':
                $policy = new DiscountPolicy(95);
                break;

            case 'MEI0001':
                $policy =  new DonatePolicy(2);
                break;

            default:
                $policy = null;
                break;
        }

        return $policy;
    }
}

