<?php

namespace App\ShoppingCart;

class Payment
{
    public function __construct()
    {

    }

    public function calculateTotalWithDiscount($cartTotal){
        return $cartTotal * 0.90; // Cálculo com 10% de desconto
    }

    public function calculateTotalWithInterest($cartTotal, $months){
        $interestRate = 0.01;
        return $cartTotal * pow((1 + $interestRate), $months); // Cálculo com juros compostos de 1% a.m.
    }
}
