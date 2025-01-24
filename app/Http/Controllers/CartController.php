<?php

namespace App\Http\Controllers;

use App\ShoppingCart\Cart;
use App\ShoppingCart\Item;
use App\ShoppingCart\Payment;

class CartController{
    private Cart $cart;
    private Payment $payment;

    public function __construct(Cart $cart, Payment $payment){
        $this->cart = $cart;
        $this->payment = $payment;
    }
    public function addItems($name, $price, $quantity) { //adiciona um novo item ao carrinho
        $item = new Item($name, $price, $quantity);
        $this->cart->addItem($item);
    }

     public function getCartTotal(){ // calcula e retorna o valor total do carrinho
        return $this->cart->getTotal();
    }

    public function handLeRequest($paymentMethod, $months = 0) // gerencia a adição de itens ao carrinho e calcula o valor final com o mpetodo de pagsamento escolhido
    {
        $this->addItem('Notebook', 3000.00, 2);
        $this->addItem('Macbook Pro', 19000.00, 1);

        $total = $this->cart->getTotal();

        if ($paymentMethod == 'Pix' || $paymentMethod == 'Cartão de crédito à vista'){ // aqui pagar a vista e com desconto
            $finalTotal = $this->payment->calculateTotalWithDiscount($total);
        } elseif ($paymentMethod == 'Cartão de crédito parcelado'){
            $finalTotal = $this->payment->calculateTotalWithInterest($total, $months); //pagamento a prazo com juros compostos
        } else {
            $finalTotal = $total;
        }

        echo "Total: " . $total;
    }

    private function addItem(string $name, float $price, int $quantity)
    {
    }
}
