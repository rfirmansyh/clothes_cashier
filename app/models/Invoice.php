<?php
    class Invoice extends Model {
        protected $table = 'invoices';

        public function __construct()
        {
            parent::__construct();
        }
    }