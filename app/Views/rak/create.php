<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Rak</h4>
            <div class="basic-form">

                <form action="<?php echo base_url('rak/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="">Sektor</label>
                        <select name="rak_sektor" class="form-control custom-select-value"
                            required="Tidak boleh kosong">
                            <option disabled selected>Pilih Sektor... </option>
                            <?php
                                    foreach ($sektor as $row) {
                                                                    ?>
                            <option value="<?php echo $row->sek_id ?>">
                                <?php echo $row->sek_nama ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Rak</label>
                        <input required maxlength="10" type="text" name="rak_nama" class="form-control"
                            placeholder="Nama Rak">
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas Maksimal Rak</label>
                        <div class="input-group mb-3">
                            <input required maxlength="4" type="text" name="rak_max_capacity"
                                class="form-control col-md-3" placeholder="Maksimal Kapasitas">
                            <div class="input-group-append">
                                <span class="input-group-text">Palette</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('rak/index'); ?>" class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>