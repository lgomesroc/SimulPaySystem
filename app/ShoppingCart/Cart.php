<?php

    namespace App\ShoppingCart;

    class Cart
    {
        private $items = []; // armazena os items
        
        public function addItem($item) {
            $this->items[] = $item;
        }
        public function getTotal() {
            $total = 0;
            foreach ($this->items as $item) {
                $total += $item->getQuantity() * $item->getPrice(); // calculando o total pela quantidade e o preço
            }
            return $total;
        }

        public function removeItems($name) {
            $total = 0;
            foreach ($this->items as $index => $item) {
                if (strtolower($item->getName()) == strtolower($name)) {
                    unset($this->items[$item->getName()]); // usa o índice do item para removê-lo
                    break;
                }
            }
            $this->items = array_values($this->items); // aqui vai reiniciar o array para evitar espaços desnecessários
        }

        public function updateItems($name, $quantity){
            foreach ($this->items as $item){ // procura o nome e atualiza a quantidade
                if (strtolower($item->getName()) == strtolower($name)) {
                    $item->setQuantity($quantity);
                    break;
                }
            }
        }

        public function getItems(){
            return $this->items; // retorna todos os itens qeue contém no carrinho
        }
    }
