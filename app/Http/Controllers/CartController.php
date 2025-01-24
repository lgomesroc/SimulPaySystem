<?php

namespace App\Http\Controllers;

use App\ShoppingCart\Cart;
use App\ShoppingCart\Item;
use App\ShoppingCart\Payment;

class CartController{
    private $cart;
    private $payment;

    public function __construct(Cart $cart, Payment $payment){
        $this->cart = $cart;
        $this->payment = $payment;
    }
    public function addItems($name, $price, $quantity) {
        $item = new Item($name, $price, $quantity);
        $this->cart->addItem($item);
    }

     public function getCartTotal(){
        return $this->cart->getTotal();
    }

    public function handLeRequest($paymentMethod, $months = 0)
    {
        $this->addItem('Notebook', 3000.00, 2);
        $this->addItem('Macbook Pro', 19000.00, 1);

        $total = $this->cart->getTotal();

        if ($paymentMethod == 'Pix' || $paymentMethod == 'Cartão de crédito à vista'){
            $finalTotal = $this->payment->calculateTotalWithDiscount($total);
        } elseif ($paymentMethod == 'Cartão de crédito parcelado'){
            $finalTotal = $this->payment->calculateTotalWithInterest($total, $months);
        } else {
            $finalTotal = $total;
        }

        echo "Total: " . $total;
    }

    private function addItem(string $name, float $price, int $quantity)
    {
    }
}
