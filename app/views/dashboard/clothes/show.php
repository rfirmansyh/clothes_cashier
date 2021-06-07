<?php $this->view('dashboard/_layouts/header', $data) ?>
    <?php
        $clothe = $data['clothe'];
    ?>
    <div class="container">
        
        <div class="row align-items-center mb-6">
            <div class="col"><h5>Detail Data Baju</h5></div>
            <div class="col-auto">
                <a href="<?= BASE_URL.'/admin/dashboard/clothes/' ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left mr-2"></i> Semua Data
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-sm-8 col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <div class="obj-fit obj-fit-cover obj-pos-ct w-100 h-18rem h-sm-28rem h-lg-40rem mb-5">
                            <img src="<?= BASE_URL.'/public/img/upload/clothes/'.$clothe->photo; ?>" alt="">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Baju</label>
                            <input 
                                type="text" 
                                name="name"
                                value="<?= $clothe->name; ?>"
                                class="form-control form-control-sm border"
                                disabled
                                placeholder="Masukan Nama" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stok Baju</label>
                            <input 
                                type="number"
                                name="stock"
                                value="<?= $clothe->stock; ?>"
                                class="form-control form-control-sm border"
                                disabled
                                placeholder="Stok sisa" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Harga</label>
                            <input 
                                type="number"
                                name="price"
                                value="<?= $clothe->price; ?>"
                                class="form-control form-control-sm border"
                                disabled
                                placeholder="Harga Baju" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
