<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class ProductFactory{

    public static function create( $serial_number ){
        switch ( $serial_number ) {
            case 'MEI0001':
                return new Product("苹果",12,"斤");
                break;

            case 'MEI0002':
                return new Product("可乐",3,"瓶");
                break;

            default:
                return null;
                break;
        }
    }
}