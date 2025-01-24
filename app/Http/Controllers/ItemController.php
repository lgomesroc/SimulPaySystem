<?php

namespace App\Http\Controllers;

use App\ShoppingCart\Item;
use App\ShoppingCart\Cart;

class ItemController
{
    private Cart $cart;

    public function __construct(){ // classe construtor onde inicia os objetos
        $this->cart = new Cart(); // iniciando uma nova instância da classe Cart a propriedade $cart
    }
    public function addItem($name, $price, $quantity) { // adicionando um novo item no carrinho
        $item = new Item($name, $price, $quantity);
        $this->cart->addItem($item);
    }
    public function removeItems($name) { //removendo um item específico do carrinho pelo nome
        $name = strtolower($name);
        $this->cart->removeItems($name);
    }

    public function updateItems($name, $quantity){ // atualizando a quantidade de um item específico no carrinho
        $name = strtolower($name);
        $this->cart->updateItems($name, $quantity);
    }
}
