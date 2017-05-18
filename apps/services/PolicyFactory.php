<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class PolicyFactory{

    public static function create( $serial_number ){
        switch ( $serial_number ) {
            case 'MEI0001':
                return new DonatePolicy(2);
                break;

            case 'MEI0002':
                return new DiscountPolicy(95);
                break;

            default:
                return null;
                break;
        }
    }
}

