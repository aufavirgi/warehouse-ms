<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Rak</h4>
            <div class="basic-form">
                <form action="<?php echo base_url('rak/update/'.$rak['rak_id']); ?>" method="post">

                    <div hidden="true" class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="rak_id" class="form-control" value="<?php echo $rak['rak_id']; ?>"
                            placeholder="NPK Pengguna" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Sektor</label>
                        <select name="rak_sektor" class="form-control border-input">
                            <option disabled selected>-- Pilih Sektor --</option>
                            <?php
                                foreach ($sektor as $row) {
                                    if($rak['rak_sektor'] == $row->sek_id){
                            ?>
                            <option selected value="<?php echo $row->sek_id ?>"><?php echo $row->sek_nama ?>
                            </option>
                            <?php
                                    } else {
                            ?>
                            <option value="<?php echo $row->sek_id ?>"><?php echo $row->sek_nama ?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Rak</label>
                        <input maxlength="10" type="text" name="rak_nama" value="<?php echo $rak['rak_nama'] ?>"
                            class="form-control" placeholder="Nama Rak">
                    </div>
                    <div class="form-group">
                        <label for="">Kapasitas Maksimal Rak</label>
                        <div class="input-group mb-3">
                            <input maxlength="4" type="text" name="rak_max_capacity"
                                value="<?php echo $rak['rak_max_capacity'] ?>" class="form-control col-md-3"
                                placeholder="Maksimal Kapasitas">
                            <div class="input-group-append">
                                <span class="input-group-text">Palette</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('rak/index'); ?>" class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>