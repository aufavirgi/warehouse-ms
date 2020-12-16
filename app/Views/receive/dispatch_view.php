<?= $this->extend('layout/page_layout_admin') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Barang di Rak</h4>
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
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Sektor</th>
                                        <th>Nama Rak</th>
                                        <th>Nama Dispatcher</th>
                                        <th>Status Dispatch</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach($dispatch as $row) { ?>
                                    <tr role="row" class="odd">
                                        <td><?= $row->tr_id; ?></td>
                                        <td><?= date_format(date_create($row->tr_date_in),"d-F-Y"); ?></td>
                                        <td><?php 
                                            if($row->tr_date_out == null){
                                                echo "-";
                                            }else{
                                            echo date_format(date_create($row->tr_date_out),"d-F-Y");} ?>
                                        </td>
                                        <td><?= $row->sek_nama; ?></td>
                                        <td><?= $row->rak_nama; ?></td>
                                        <td><?php if($row->tr_dispatcher_id == null){
                                            echo null;
                                        } else { echo $row->pen_nama;} ?></td>
                                        <td><?php 
                                                $case = $row->tr_status_dispatch;
                                                switch ($case) {
                                                case 0:
                                                    echo "Tucked On the Shelf";
                                                break;
                                                case 1:
                                                    echo "Request Dispatch";
                                                break;
                                                case 2:
                                                    echo "Dispatcher Picking up Palette";
                                                break;
                                                case 3:
                                                    echo "Delivering...";
                                                break;
                                                case 4:
                                                    echo "Dispatch Completed";
                                                break;
                                                default:
                                                    echo "Aborted";
                                            } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?= base_url('receive/view_detil/'.$row->tr_id); ?>"
                                                    class="btn mb-1 btn-info btn-sm"><i class="fa fa-list"></i></a>
                                                <a href="<?= base_url('receive/abort_dispatch/'.$row->tr_id); ?>"
                                                    class="btn mb-1 btn-danger btn-sm"
                                                    onclick="return confirm('Apakah Anda yakin ingin membatalkan transaksi <?= $row->tr_id; ?>?')"><i
                                                        class="fa fa-trash"></i></a>
                                                <a href="<?= base_url('receive/create_dispatch/'.$row->tr_id); ?>"
                                                    class="btn mb-1 btn-success btn-sm"
                                                    disable="<?php if($row->tr_status_dispatch > 0){ echo "true"; }else{echo "false";}?>"
                                                    onclick="return confirm('Apakah Anda yakin ingin melakukan dispatch untuk transaksi <?= $row->tr_id; ?>?')">dispatch</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php }; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                        <th rowspan="1" colspan="1">Tanggal Keluar</th>
                                        <th rowspan="1" colspan="1">Nama Sektor</th>
                                        <th rowspan="1" colspan="1">Nama Rak</th>
                                        <th rowspan="1" colspan="1">Nama Dispatcher</th>
                                        <th rowspan="1" colspan="1">Status Dispatch</th>
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