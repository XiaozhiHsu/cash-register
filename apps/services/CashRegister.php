<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class CashRegister{

    protected $item_list = [];


    public function startUp(){
        echo "---------收银机---------".PHP_EOL;
        echo "exit:退出;              ".PHP_EOL;
        echo "-----------------------".PHP_EOL;
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
        $product && $this->addItem( new Item($product, $number) );
    }

    public function addItem( Item $item ){
        array_push($this->item_list, $item);
    }

    public function checkout(){
        $total = 0;
        $total = array_reduce($this->item_list, function($total,$item) {
            $item->printer();
            return $total += $item->getAmount();
        });

        $total = number_format($total,2);
        echo '总计:'.$total.PHP_EOL;
        echo '--------------------'.PHP_EOL;
    }
}
