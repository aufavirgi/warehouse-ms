<?= $this->extend('layout/page_layout_admin') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Transaksi Receive</h4>
            <p class="text-muted m-b-15 f-s-12">Transaksi ini memuat barang-barang yang akan diangkut dalam 1 palette
            </p>
            <div class="basic-form">

                <form action="<?php echo base_url('receive/store'); ?>" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">ID Transaksi</label>
                            <input type="text" name="tr_id" class="form-control" value="<?php echo $maxid; ?>"
                                placeholder="TR ID" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Tanggal masuk</label>
                            <input type="text" name="tr_date_in" class="form-control"
                                value="<?php echo date_format(date_create(date("Y-m-d H:i:s")), "d-F-Y"); ?>"
                                placeholder="TR ID" readonly>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Sektor</label>
                            <select name="rak_sektor" id="sektor" class="form-control custom-select-value"
                                required="Tidak boleh kosong">
                                <option disabled selected>Pilih Sektor... </option>
                                <?php
                                    foreach ($sektor as $row) {
                                                                    ?>
                                <option value="<?php echo $row->sek_id ?>">
                                    <?php echo $row->sek_nama." - ".$row->sek_kategori; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Rak</label>
                            <select name="rak_id" id="rak" class="form-control custom-select-value"
                                required="Tidak boleh kosong">
                                <option disabled selected>Pilih Rak... </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Receiver</label>
                            <select name="tr_receiver_id" id="pengguna" class="form-control custom-select-value"
                                required="Tidak boleh kosong">
                                <option disabled selected>Pilih Receiver... </option>
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
                                        <th>
                                            <!-- Trigger the modal with a button -->
                                            <button type="button" class="btn btn-info" data-toggle="modal"
                                                data-target="#myModal">Tambah Barang</button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; $no=1;?>
                                    <?php foreach($cart as $items) { ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $items['bar_id']; ?></td>
                                        <td><?php echo $items['bar_kategori']; ?></td>
                                        <td><?php echo $items['bar_nama']; ?></td>
                                        <td><?php echo $items['qty']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="<?php echo base_url('receive/hapus_cart/'.$items['rowid']); ?>"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini dari daftar barang masuk?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; $no++;?>
                                    <?php } ?>
                                </tbody>


                            </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('receive/index'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <form action="<?php echo base_url('receive/simpan_cart'); ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Barang</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label>Nama Barang</label><br>
                                    <select id="barang" name="bar_id" class="form-control">
                                        <option disabled selected>Pilih Barang... </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Kode Barang</label>
                                    <input type="text" class="form-control" name="bar_id" id="kode_barang" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Kategori Barang</label>
                                    <input type="text" class="form-control" name="bar_kategori" id="kategori_barang"
                                        readonly />
                                </div>
                                <div class="form-group">
                                    <label>Harga </label>
                                    <input type="text" class="form-control" name="bar_nama" id="nama_barang" readonly />
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Barang Masuk (Box) </label>
                                    <input type="text" class="form-control" name="tr_qty" id="jumlah" />
                                    <input type="hidden" class="form-control" name="nabar" id="nabar" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" type="submit">Simpan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery-3.3.1.js') ?>"></script>
<script type="text/javascript">
$(document).ready(function() {

    $('#sektor').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url('receive/get_rak_by_sektor')?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].rak_id + '>' + data[i].rak_nama +
                        '</option>';
                }
                $('#rak').html(html);

            }
        });
        return false;
    });

});
</script>
<script type="text/javascript">
$(document).ready(function() {

    $('#sektor').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url('receive/get_barang_by_sektor')?>",
            method: "POST",
            data: {
                id: id
            },
            async: true,
            dataType: 'json',
            success: function(data) {

                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i].bar_id + '>' + data[i].bar_nama +
                        '</option>';
                }
                $('#barang').html(html);

            }
        });
        return false;
    });

});
</script>
<script type="text/javascript">
$(document).ready(function() {
    $('#barang').change(function() {
        var id = $(this).val();
        $.ajax({
            url: "<?= base_url('receive/cek_barang')?>",
            method: 'POST',
            async: true,
            Cache: false,
            dataType: "json",
            data: {
                id: id
            },
            success: function(data) {
                $('#kode_barang').val(data.bar_id);
                $('#kategori_barang').val(data.bar_kategori);
                $('#nama_barang').val(data.bar_nama);
            }
        });
        // alert(id);
    });
});
</script>
<?= $this->endSection() ?>