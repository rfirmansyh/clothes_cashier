<?php $this->view('dashboard/_layouts/header', $data) ?>

    <div class="container">
        
        <div class="row align-items-center mb-6">
            <div class="col"><h5>Tambah Data Baju</h5></div>
            <div class="col-auto">
                <a href="<?= BASE_URL.'/admin/dashboard/clothes/' ?>" class="btn btn-primary">
                    <i class="fas fa-arrow-left mr-2"></i> Semua Data
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <form action="<?= BASE_URL.'/admin/dashboard/clothes/store' ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="">Nama Baju</label>
                                <input 
                                    type="text" 
                                    name="name"
                                    class="form-control form-control-sm border"
                                    placeholder="Masukan Nama" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Stok Baju</label>
                                <input 
                                    type="number"
                                    name="stock"
                                    class="form-control form-control-sm border"
                                    placeholder="Stok sisa" />
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Harga</label>
                                <input 
                                    type="number"
                                    name="price"
                                    class="form-control form-control-sm border"
                                    placeholder="Harga Baju" />
                            </div>
                            <div class="form-group mb-8">
                                <label for="">Foto Baju</label>
                                <div class="form-control form-control-sm border">
                                    <input type="file" name="photo">
                                </div>
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

    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
