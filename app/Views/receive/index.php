<?= $this->extend('layout/page_layout_admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaksi Barang Masuk</h4>
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
                    <a href="<?php echo base_url('receive/create'); ?>" class="btn mb-1 btn-primary">Tambah
                        Barang Masuk <span class="btn-icon-right"><i class="fa fa-plus"></i></span></a>
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
                                        <th>ID</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Nama Rak</th>
                                        <th>Nama Receiver</th>
                                        <th>Status Receive</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($receive as $row) { ?>
                                    <tr role="row" class="odd">
                                        <td><?= $row->tr_id; ?></td>
                                        <td><?= date_format(date_create($row->sek_nama),"d-F-Y"); ?></td>
                                        <td><?= $row->rak_nama; ?></td>
                                        <td><?= $row->pen_nama; ?></td>
                                        <td><?= $row->tr_status_receive; ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('receive/detail/'.$row->tr_id); ?>"
                                                    class="btn mb-1 btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url('receive/cancel/'.$row->tr_id); ?>"
                                                    class="btn mb-1 btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi <?= $row->tr_id; ?>?')"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                        <th rowspan="1" colspan="1">Nama Rak</th>
                                        <th rowspan="1" colspan="1">Nama Receiver</th>
                                        <th rowspan="1" colspan="1">Status Receive</th>
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