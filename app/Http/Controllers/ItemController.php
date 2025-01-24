<?php

namespace App\Http\Controllers;

use App\ShoppingCart\Item;
use App\ShoppingCart\Cart;

class ItemController
{
    private $cart;
    public function __construct(){
        $this->cart = new Cart();
    }
    public function addItem($name, $price, $quantity) {
        $item = new Item($name, $price, $quantity);
        $this->cart->addItem($item);
    }
    public function removeItems($name) {
        $name = strtolower($name);
        $this->cart->removeItems($name);
    }

    public function updateItems($name, $quantity){
        $name = strtolower($name);
        $this->cart->updateItems($name, $quantity);
    }
}
