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
                return new Product('苹果',12.00,'斤','MEI0001');
                break;

            case 'MEI0002':
                return new Product('可乐',3.00,'瓶','MEI0002');
                break;

            default:
                return null;
                break;
        }
    }
}