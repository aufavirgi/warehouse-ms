<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Ubah Data Barang</h4>
            <div class="basic-form">
                <form action="<?php echo base_url('barang/update/'.$barang['bar_id']); ?>" method="post">

                    <div hidden="true" class="form-group">
                        <label for="">ID</label>
                        <input type="text" name="bar_id" class="form-control" value="<?php echo $barang['bar_id']; ?>"
                            placeholder="NPK Pengguna" disabled>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input required type="text" name="bar_nama" class="form-control"
                            value="<?php echo $barang['bar_nama']; ?>" placeholder="Nama Barang">
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Barang</label>
                        <select required name="bar_kategori" class="form-control">
                            <option disabled selected>Pilih Kategori... </option>
                            <option selected value="<?php echo $barang['bar_kategori']; ?>">
                                <?php echo $barang['bar_kategori']; ?>
                            </option>
                            <option value="Chasis">Chasis</option>
                            <option value="Mesin">Mesin</option>
                            <option value="Interior">Interior</option>
                            <option value="Eksterior">Eksterior</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="<?php echo base_url('barang/index'); ?>"
                            class="btn mb-1 btn-outline-secondary">Batal</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>