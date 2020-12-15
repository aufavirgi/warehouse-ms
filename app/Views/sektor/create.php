<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Sektor</h4>
            <div class="basic-form">

                <form action="<?php echo base_url('sektor/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="">Nama Sektor</label>
                        <input maxlength="10" type="text" name="sek_nama" class="form-control"
                            placeholder="Nama Sektor">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Sektor</label>
                        <select name="sek_kategori" class="form-control">
                            <option value="Chasis">Chasis</option>
                            <option value="Mesin">Mesin</option>
                            <option value="Interior">Interior</option>
                            <option value="Eksterior">Eksterior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('sektor/index'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>