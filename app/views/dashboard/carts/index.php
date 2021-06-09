<?php $this->view('dashboard/_layouts/header', $data) ?>

    <div class="container py-6">
        <?php if (($data['carts'])) : ?>
            <div class="row align-items-stretch">
            <div class="col-lg-6">
                <h5 class="mb-5">Rincian Pembelian</h5> 
                <ul class="list-group list-group-flush bg-white py-3 px-2">
                    <?php foreach($data['carts'] as $cart): ?>
                        <li class="list-group-item bg-transparent py-2">
                            <div class="row gutters-xs">
                                <div class="col"><?= $cart['item_name'] ?></div>
                                <div class="col-auto text-primary font-bold"><?= $cart['item_price'] ?></div>
                                <div class="col-auto text-right">x<?= $cart['item_quantity'] ?></div>
                                <div class="col-auto text-right"><?= $cart['item_total'] ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>

                <hr>
                <div class="row gutters-xs">
                    <div class="col">Total</div>
                    <div class="col-auto text-right">x<?= $data['total']['item']; ?></div>
                    <div class="col-auto text-right"><?= $data['total']['price']; ?></div>
                </div>

                <a href="<?= BASE_URL.'/admin/dashboard/carts/clear' ?>" class="btn btn-sm btn-danger mt-8">
                    <i class="fas fa-trash mr-1"></i> Hapus Cart
                </a>
            </div>    
            <div class="col-lg-6">
                <h5 class="mb-5">Konfirmasi Pembayaran</h5>
                <div class="card">
                    <div class="card-body">
                        <form action="<?= BASE_URL.'/admin/dashboard/invoices/store' ?>" method="POST">
                            <input type="hidden" name="total_amount" value="<?= $data['total']['price']; ?>">
                            <div class="form-group mb-3">
                                <label for="">Nama Pembeli</label>
                                <input 
                                    type="text" 
                                    name="buyer_name"
                                    class="form-control form-control-sm border"
                                    placeholder="Masukan Nama" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nominal Pembayaran</label>
                                <input 
                                    type="number"
                                    name="buyer_amount"
                                    class="form-control form-control-sm border"
                                    placeholder="Masukan Nominal" />
                            </div>

                            <div class="row justify-content-end">
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-primary">Submit Pembayaran</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
            
            <h3 class="text-dark text-center">Keranjang Masih Kosong</h3>
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <img src="<?= BASE_URL.'/public/img/assets/cart.svg' ?>" alt="" class="w-100">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-auto">
                    <a href="<?= BASE_URL.'/admin/dashboard/clothes/' ?>" class="btn btn-primary">
                        + Tambahkan Sekarang
                    </a>
                </div>
            </div>


        <?php endif; ?>
    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
