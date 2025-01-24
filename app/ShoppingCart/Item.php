<?php

namespace App\ShoppingCart;

class Item
{
    private $name;
    private $price;
    private $quantity;

    public function __construct($name, $price, $quantity) { //utilizado construtor
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getName(){ //utilizado para encapsular e boas práticas de programação
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

}
