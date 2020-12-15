<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Pengguna</h4>
                <div class="container">
                    <?php
                    if(!empty(session()->getFlashdata('success'))){ ?>

                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('success');?>
                    </div>

                    <?php } ?>
                    <?php if(!empty(session()->getFlashdata('info'))){ ?>

                    <div class="alert alert-info">
                        <?php echo session()->getFlashdata('info');?>
                    </div>

                    <?php } ?>

                    <?php if(!empty(session()->getFlashdata('warning'))){ ?>

                    <div class="alert alert-warning">
                        <?php echo session()->getFlashdata('warning');?>
                    </div>

                    <?php } ?>
                </div>
                <div class=" float-right mb-3">
                    <a href="<?php echo base_url('pengguna/create'); ?>" class="btn mb-1 btn-primary">Tambah
                        Pengguna <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
                </div>

                <div class="table-responsive">

                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-bordered zero-configuration dataTable"
                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true"
                                data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true"
                                data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                data-toolbar="#toolbar">
                                <thead>
                                    <tr role="row">
                                        <th>NPK</th>
                                        <th>Nama Pengguna</th>
                                        <th>Role</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($pengguna as $row) { ?>
                                    <tr role="row" class="odd">
                                        <td><?= $row->pen_npk; ?></td>
                                        <td><?= $row->pen_nama; ?></td>
                                        <td><?= $row->pen_role; ?></td>
                                        <td><?= $row->pen_password; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('pengguna/edit/'.$row->pen_npk); ?>"
                                                    class="btn mb-1 btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('pengguna/deactivate/'.$row->pen_npk); ?>"
                                                    class="btn mb-1 btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna <?= $row->pen_nama; ?> ini?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">NPK</th>
                                        <th rowspan="1" colspan="1">Nama Pengguna</th>
                                        <th rowspan="1" colspan="1">Role</th>
                                        <th rowspan="1" colspan="1">Password</th>
                                        <th rowspan="1" colspan="1">Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?= $this->endSection() ?>