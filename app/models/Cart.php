<?php
    class Cart {
        private $key = 'carts';
        public $item_id;
        public $item_name;
        public $item_quantity;
        public $item_price;
        public $item_total;

        public function save()
        {
            if ( is_null(Session::get($this->key)) ) {
                Session::set($this->key, [
                    'item_id' => $this->item_id,
                    'item_name' => $this->item_name,
                    'item_quantity' => $this->item_quantity,
                    'item_price' => $this->item_price,
                    'item_total' => $this->item_price
                ]);
            } else {
                $item_current_index = null;
                foreach( Session::get($this->key) as $i => $cart ) {
                    if ( $cart['item_id'] === $this->item_id ) {
                        $item_current_index = $i;
                        break;
                    } 
                }

                if ( !is_null($item_current_index) ) {
                    Session::update($this->key, $item_current_index, [
                        'item_id' => $this->item_id,
                        'item_name' => $this->item_name,
                        'item_quantity' => $this->item_quantity,
                        'item_price' => $this->item_price,
                        'item_total' => $this->item_total
                    ]);
                } else {
                    Session::add($this->key, [
                        'item_id' => $this->item_id,
                        'item_name' => $this->item_name,
                        'item_quantity' => $this->item_quantity,
                        'item_price' => $this->item_price,
                        'item_total' => $this->item_price
                    ]);
                }
            }
            

            // if ( Session::get($this->key)['item_id'] == $this->item_id ) {
            //     var_dump('if');
            //     die;
            //     Session::set($this->key, [
            //         'item_id' => $this->item_id,
            //         'item_name' => $this->item_name,
            //         'item_quantity' => Session::get($this->key)['item_quantity'] + 1,
            //         'item_price' => $this->item_price,
            //     ]);
            // } else {
            //     var_dump('else');
            //     die;
            //     Session::add($this->key, [
            //         'item_id' => $this->item_id,
            //         'item_name' => $this->item_name,
            //         'item_quantity' => $this->item_quantity,
            //         'item_price' => $this->item_price,
            //     ]);
            // }
            
        }
    }