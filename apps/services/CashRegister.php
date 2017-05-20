<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class CashRegister{

    protected $product_list = [];

    public function startUp(){
        echo "---------收银机---------".PHP_EOL;
        echo "exit:(退出输入)             ".PHP_EOL;
        echo "-------------------------".PHP_EOL;
        echo "\n";
        $input = "" ;
        while( $input != "exit" ){
            echo "请输入商品二维码:";
            $input = trim(fgets(STDIN));
            $this->scan( $input );
        }
        echo "\n";
        echo "\n";
    }

    public function scan( $input ){
        list($serial_number , $number ) = explode("-", $input);
        $product = ProductFactory::create( $serial_number );
        $product && $this->addItem($product, $number);
    }

    public function addItem( $product ,$number ){
        $number = max($number,1);
        if( isset($this->product_list[ $product->getSerialNumber() ]) )
            return $this->product_list[ $product->getSerialNumber() ]->incr( $number );

        $this->product_list[$product->getSerialNumber()] = new Item($product,$number);
        return $this->product_list[$product->getSerialNumber()];
    }

    public function checkout(){
        echo Template::standard( $this->product_list );
    }
}
