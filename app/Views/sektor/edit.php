<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Sektor</h4>
            <div class="basic-form">
                <form action="<?php echo base_url('sektor/update/'.$sektor['sek_id']); ?>" method="post">

                    <div hidden="true" class="form-group">
                        <label for="">ID</label>
                        <input maxlength="10" type="text" name="pen_npk" class="form-control"
                            value="<?php echo $sektor['sek_id']; ?>" placeholder="ID Sektor" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sektor</label>
                        <input type="text" name="sek_nama" class="form-control"
                            value="<?php echo $sektor['sek_nama']; ?>" placeholder="Nama Sektor">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Sektor</label>
                        <select name="sek_kategori" class="form-control">
                            <option selected value="<?php echo $sektor['sek_kategori']; ?>">
                                <?php echo $sektor['sek_kategori']; ?>
                            </option>
                            <option value="Chasis">Chasis</option>
                            <option value="Mesin">Mesin</option>
                            <option value="Interior">Interior</option>
                            <option value="Eksterior">Eksterior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('sektor/index'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>