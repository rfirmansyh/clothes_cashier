<?php
    class InvoicesController extends Controller {
        public $Clothe;
        public $Invoice;
        public $InvoiceClothes;

        public function __construct() 
        {
            $this->Clothe = $this->model('clothe');
            $this->Invoice = $this->model('Invoice');
            $this->InvoiceClothes = $this->model('InvoiceClothes');
        }

        public function index()
        {
            $data['title'] = 'Invoices';
            $data['invoices'] = $this->Invoice->all();
            $this->view('dashboard/invoices/index', $data);
        }

        public function show($id)
        {
            $data['title'] = 'Invoice Details';
            $data['invoice'] = $this->Invoice->where('id', '=', $id)->first();
            $data['invoice_clothes'] = [
                // ['clothes' => null, 'quantity' => 0] // example data returned
            ];

            $invoiceClothes = $this->InvoiceClothes->where('invoice_id', '=', $id)->get();
            foreach ($invoiceClothes as $key => $invoiceClothe) {
                $clothe = $this->Clothe->where('id', '=', $invoiceClothe->clothes_id)->first();
                $data['invoice_clothes'][] = [
                    'clothe' => $clothe,
                    'quantity' => $invoiceClothe->clothes_quantity
                ];
            }
            $this->view('dashboard/invoices/show', $data);
        }

        public function store()
        {
            $requests = $_POST;

            // validate total amount
            if ( $requests['buyer_amount'] < $requests['total_amount'] ) {
                Flasher::setFlash(
                    'Pembelian Gagal',
                    'Jumlah Pembayaran tidak cukup dengan total harga, mohon dicek kembali',
                    'danger'
                );
                header("Location: " . BASE_URL.'/admin/dashboard/carts/');
                die;
            }
            // validate item stock
            foreach (Session::get('carts') as $cart) {
                $clothe = $this->Clothe->where('id', '=', $cart['item_id'])->first();
                if ( (int) $clothe->stock < (int) $cart['item_quantity'] ) {
                    Flasher::setFlash(
                        'Pembelian Baju '.$clothe->name.' Gagal',
                        'Barang Dengan id : '.$clothe->id.' Stock tidak memenuhi, mohon dicek kembali',
                        'danger'
                    );
                    header("Location: " . BASE_URL.'/admin/dashboard/carts/');
                    die;
                }

                $this->Clothe->props = (array) $this->Clothe->where('id', '=', $cart['item_id'])->first();
                $this->Clothe->props['stock'] -= $cart['item_quantity'];
                $this->Clothe->save();
            }

            

            $this->Invoice->props['buyer_name'] = $requests['buyer_name'];
            $this->Invoice->props['buyer_amount'] = $requests['buyer_amount'];
            $this->Invoice->props['buyer_change'] = $requests['buyer_amount'] - $requests['total_amount'];
            $this->Invoice->props['total_amount'] = $requests['total_amount']; // hidden input
            $this->Invoice->props['created_by'] = 1;
            $this->Invoice->save();

            $invoiceLastId = $this->Invoice->getlastid();
            foreach (Session::get('carts') as $cart) {
                $this->InvoiceClothes->props['invoice_id'] = $invoiceLastId;
                $this->InvoiceClothes->props['clothes_id'] = $cart['item_id'];
                $this->InvoiceClothes->props['clothes_quantity'] = $cart['item_quantity'];
                $this->InvoiceClothes->save();
            }

            Session::delete('carts');
            header("Location: " . BASE_URL.'/admin/dashboard/invoices/show/'.$invoiceLastId);
            die;
        }


    } 