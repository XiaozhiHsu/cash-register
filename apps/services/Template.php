<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;

class Template{

    public static function standard( $items_list ){
        $list  = "******----没钱赚商店----******".PHP_EOL;

        $policy_list = "\n-----------享受买二赠一-----------\n".PHP_EOL;
        $total       = 0;

        foreach($items_list as $item ){
            $list.= "名称:".$item->product->getName();
            $list.= ",\t数量:".$item->getNumber().$item->product->getUnit();
            $list.= ",\t单价:".$item->product->getPrice();
            $list.= ",\t小计:".$item->getAmount();

            if( $item->policy && ($item->policy instanceof DiscountPolicy) ){
                $list.= ",\t节省:".$item->getFree().PHP_EOL;
            }else{
                $list.= PHP_EOL;
            }

            if( $item->policy && ($item->policy instanceof DonatePolicy))
                $policy_list.= "名称:".$item->product->getName().",\t数量:".
                    $item->getFree().$item->product->getUnit().PHP_EOL;

            $total = $total + $item->getShouldPay();
        }

        $end = "\n-------------------------------\n".PHP_EOL;
        $end.= "总计:".number_format($total,2)."元".PHP_EOL;
        $end.= "-------------------------------".PHP_EOL;
        return $list.$policy_list.$end;
    }

}