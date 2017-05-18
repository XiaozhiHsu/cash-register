<?php
/**
 * @author Xiaozhi Hsu <xiaozhihsu@gmail.com>
 * @Date 2017-05-18
 */
namespace App\Services;


class Product{

    protected $name;

    protected $price;

    protected $unit;

    protected $serial_number;


    public function __construct( $name, $price, $unit, $serial_number){
        $this->name  = $name;
        $this->price = $price;
        $this->unit  = $unit;
        $this->serial_number  = $serial_number;
    }


    public function getSerialNumber(){
        return $this->serial_number;
    }

    public function getName(){
        return $this->name;
    }

    public function setName( $name ){
        $this->name = $name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getFormatPrice( $number = 2 ){
        return number_format($this->price,$number );
    }

    public function getUnitLabel(){
        return "(".$this->unit.")";
    }

    public function setPrice( $price ){
        $this->price = $price;
    }

    public function getUnit(){
        return $this->unit;
    }

    public function setUnit( $unit ){
        $this->unit = $unit;
    }

}