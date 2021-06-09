<?php $this->view('dashboard/_layouts/header', $data) ?>

    <?php
        $invoices = $data['invoices'];
    ?>
    <div class="container">
        
        <h5 class="mb-6">Semua Data Pembelian</h5>
        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Pembeli</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Total Pembayaran</th>
                    <th scope="col">Kembalian</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($invoices as $i => $invoice): ?>
                <tr>
                    <th scope="row"><?= $i+1; ?></th>
                    <td><?= $invoice->buyer_name ?></td>
                    <td><?= $invoice->total_amount ?></td>
                    <td><?= $invoice->buyer_amount ?></td>
                    <td><?= $invoice->buyer_change ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<?php $this->view('dashboard/_layouts/footer/start') ?>
<?php $this->view('dashboard/_layouts/footer/end') ?>
