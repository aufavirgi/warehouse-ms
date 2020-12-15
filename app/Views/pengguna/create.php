<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Data Pengguna</h4>
            <div class="basic-form">

                <form action="<?php echo base_url('pengguna/store'); ?>" method="post">
                    <div class="form-group">
                        <label for="">NPK Pengguna</label>
                        <input maxlength="16" type="text" name="pen_npk" class="form-control"
                            placeholder="NPK Pengguna">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pengguna</label>
                        <input type="text" name="pen_nama" class="form-control" placeholder="Nama Pengguna">
                    </div>
                    <div class="form-group">
                        <label for="">Role Pengguna</label>
                        <select name="pen_role" class="form-control">
                            <option value="Receiver">Receiver</option>
                            <option value="Operator">Operator</option>
                            <option value="Dispatcher">Dispatcher</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Kata Sandi</label>
                        <input type="text" name="pen_password" class="form-control" placeholder="Kata Sandi">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="<?php echo base_url('pengguna/index'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>