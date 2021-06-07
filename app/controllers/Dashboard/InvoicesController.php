<?php
    class InvoicesController extends Controller {
        public $Invoice;
        public $InvoiceClothes;

        public function __construct() 
        {
            $this->Invoice = $this->model('Invoice');
            $this->InvoiceClothes = $this->model('InvoiceClothes');
        }

        public function show($id)
        {

        }

        public function store()
        {
            $requests = $_POST;
            $this->Invoice->props['buyer_name'] = $requests['buyer_name'];
            $this->Invoice->props['buyer_amount'] = $requests['buyer_amount'];
            // $this->Invoice->props['buyer_change'] = $requests['buyer_change'];
            $this->Invoice->props['total_amount'] = $requests['total_amount'];
            $this->Invoice->props['created_by'] = 1;
            $this->Invoice->save();

            $invoiceLastId = $this->Invoice->getlastid();
            foreach (Session::get('carts') as $cart) {
                $this->InvoiceClothes->props['invoice_id'] = $invoiceLastId;
                $this->InvoiceClothes->props['clothes_id'] = $cart['item_id'];
                $this->InvoiceClothes->props['clothes_quantity'] = $cart['item_quantity'];
                $this->InvoiceClothes->save();
            }
        }
    } 