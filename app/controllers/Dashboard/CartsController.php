<?php
    class CartsController extends Controller {

        public $Cart;
        public $Clothe;

        public function __construct()
        {
            $this->Cart = $this->model('Cart');
            $this->Clothe = $this->model('Clothe');
        }

        public function index() 
        {
            $data['title'] = 'carts';
            $data['carts'] = Session::get('carts');
            $data['total'] = [
                'item' => 0,
                'price' => 0,
            ];
            foreach ($data['carts'] as $cart) {
                $data['total']['item'] += $cart['item_quantity'];
                $data['total']['price'] += $cart['item_total'];
            }

            $this->view('dashboard/carts/index', $data);
        }

        public function add($clothe_id)
        {
            $clothe = $this->Clothe->where('id', '=', $clothe_id)->first();

            $cartCurrentClothe = Session::getwhere('carts', 'item_id', $clothe_id);

            $this->Cart->item_id = $clothe->id;
            $this->Cart->item_name = $clothe->name;
            $this->Cart->item_quantity = $cartCurrentClothe['item_quantity'] + 1;
            $this->Cart->item_price = $clothe->price;
            $this->Cart->item_total = ($cartCurrentClothe['item_quantity'] + 1) * $cartCurrentClothe['item_price'];

            $this->Cart->save();
            header("Location: " . BASE_URL.'/admin/dashboard/clothes/');
        }

        public function clear() {
            Session::delete('carts');
            header("Location: " . BASE_URL.'/admin/dashboard/carts/');
        }

    } 