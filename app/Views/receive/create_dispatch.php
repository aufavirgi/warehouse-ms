<?= $this->extend('layout/page_layout_admin') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Dispatch Barang</h4>
            <p class="text-muted m-b-15 f-s-12">Transaksi ini memuat barang-barang yang diangkut dalam 1 palette
            </p>
            <div class="basic-form">

                <form action="<?php echo base_url('receive/update/'.$receive['tr_id']); ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">ID Transaksi</label>
                            <input type="text" name="tr_id" class="form-control"
                                value="<?php echo $receive['tr_id']; ?>" placeholder="TR ID" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Masuk</label>
                            <input type="text" name="tr_date_in" class="form-control"
                                value="<?php echo date_format(date_create($receive['tr_date_in']), "d-F-Y"); ?>"
                                placeholder="TR ID" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal Keluar</label>
                            <input type="text" name="tr_date_out" class="form-control"
                                value="<?php echo date_format(date_create(date("Y-m-d H:i:s")), "d-F-Y"); ?>"
                                placeholder="TR ID" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Sektor</label>
                            <input type="text" name="rak_sektor" class="form-control"
                                value="<?php echo $receive['sek_nama']; ?>" placeholder="Nama Sektor" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Rak</label>
                            <input type="text" name="rak_nama" class="form-control"
                                value="<?php echo $receive['rak_nama']; ?>" placeholder="Nama Rak" readonly>
                            <input hidden="true" type="text" name="rak_id" class="form-control"
                                value="<?php echo $receive['rak_id']; ?>" placeholder="Nama Rak" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Receiver</label>
                            <input type="text" name="tr_receiver_id" class="form-control"
                                value="<?php echo $receive['pen_nama']; ?>" placeholder="Nama Receiver" readonly>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Dispatcher</label>
                            <select name="tr_dispatcher_id" id="pengguna" class="form-control custom-select-value"
                                required="Tidak boleh kosong">
                                <option disabled selected>Pilih Dispatcher... </option>
                                <?php
                                    foreach ($pengguna as $row) {
                                                                    ?>
                                <option value="<?php echo $row->pen_npk ?>">
                                    <?php echo $row->pen_nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="table-resposive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Barang</th>
                                        <th>Kategori Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; $no=1;?>
                                    <?php foreach($detil as $items) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?= $items->bar_id; ?></td>
                                        <td><?= $items->bar_kategori; ?></td>
                                        <td><?= $items->bar_nama; ?></td>
                                        <td><?= $items->tr_qty; ?></td>
                                    </tr>
                                    <?php $i++; $no++;?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Dispatch</button>
                        <a href="<?php echo base_url('receive/dispatch_view'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.js') ?>"></script>

<?= $this->endSection() ?>