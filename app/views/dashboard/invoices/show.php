<?php $this->view('dashboard/_layouts/header', $data) ?>
    <?php
        $invoice = $data['invoice'];
    ?>
    <div class="container">
        
        <div class="row align-items-center mb-6">
            <div class="col"><h5>Detail Data Pembelian</h5></div>
            <div class="col-auto">
                <a href="<?= BASE_URL.'/admin/dashboard/invoices/' ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left mr-2"></i> Semua Data Pembelian
                </a>
            </div>
        </div>

        <hr class="mb-8">

        <div class="row">
            <div class="col-lg-5">
                <h5 class="mb-4">Invoice Pembelian</h5>

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="">Nama Pembeli</label>
                            <input 
                                type="text" 
                                value="<?= $invoice->buyer_name; ?>"
                                class="form-control form-control-sm border"
                                disabled />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Total Harga Pembelian</label>
                            <input 
                                type="text"
                                value="<?= $invoice->total_amount; ?>"
                                class="form-control form-control-sm border"
                                disabled />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Total Uang yang dibayar</label>
                            <input 
                                type="text"
                                value="<?= $invoice->buyer_amount; ?>"
                                class="form-control form-control-sm border"
                                disabled />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Kembalian</label>
                            <input 
                                type="text"
                                value="<?= ($invoice->buyer_change) ? $invoice->buyer_change : 0; ?>"
                                class="form-control form-control-sm border"
                                disabled />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg">
                <h5 class="mb-4">item Pembelian</h5>
                <!-- item list -->
                <ul class="list-group">
                <?php foreach($data['invoice_clothes'] as $invoiceClothe): ?>
                    <li class="list-group-item border-0 py-3">
                        <div class="row gutters-xs">
                            <div class="col-4">
                                <div class="obj-fit obj-fit-cover obj-pos-ct w-100 h-14rem bg-secondary">
                                    <img src="<?= BASE_URL.'/public/img/upload/clothes/'.$invoiceClothe['clothe']->photo; ?>" alt="">
                                </div>
                            </div>
                            <div class="col">
                                <div><?= $invoiceClothe['clothe']->name; ?></div>
                                <div class="text-success"><?= $invoiceClothe['clothe']->price; ?></div>
                                <div>Jumlah : <?= $invoiceClothe['quantity']; ?></div>
                                <div>Total : <?= $invoiceClothe['quantity'] * $invoiceClothe['clothe']->price; ?></div>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
