<?php $this->view('dashboard/_layouts/header', $data) ?>
    <div class="container">
        
        <div class="row align-items-center mb-6">
            <div class="col"><h5>Semua Data Baju</h5></div>
            <div class="col-auto">
                <a href="<?= BASE_URL.'/admin/dashboard/clothes/create' ?>" class="btn btn-primary">+ Tambah Data</a>
            </div>
        </div>
        
        <div class="row align-items-stretch">
            
            <?php foreach($data['clothes'] as $clothe): ?>

                <div class="col-lg-4 flex-grow-1 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="obj-fit obj-fit-cover obj-pos-ct w-100 h-18rem bg-secondary">
                                <img src="<?= BASE_URL.'/public/img/upload/clothes/'.$clothe->photo; ?>" alt="">
                            </div>
                            <h6 class="my-3"><?= $clothe->name; ?></h6>
                            <div class="badge badge-secondary"><?= 'Sisa '.$clothe->stock; ?></div>
                            <div class="badge badge-success"><?= 'Rp. '.$clothe->price; ?></div>

                            <hr class="my-3">

                            <div class="row justify-content-between">
                                <div class="col-auto">
                                    <a href="<?= BASE_URL.'/admin/dashboard/clothes/edit/'.$clothe->id ?>" class="btn btn-xs btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= BASE_URL.'/admin/dashboard/clothes/show/'.$clothe->id ?>" class="btn btn-xs btn-info">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?= BASE_URL.'/admin/dashboard/clothes/delete/'.$clothe->id ?>" class="btn btn-xs btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                                <div class="col-auto">
                                    <?php if ($clothe->stock > 0): ?>
                                    <a href="<?= BASE_URL.'/admin/dashboard/carts/add/'.$clothe->id ?>" class="btn btn-xs btn-primary">+ Keranjang</a>
                                    <?php else: ?>
                                    <button disabled class="btn btn-xs btn-secondary">+ Keranjang</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
