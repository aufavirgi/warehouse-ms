<?= $this->extend('layout/page_layout_receiver') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-12">
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
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Request Putaway List</h4>
                <div class="row align-items-center">
                    <div class="col-md-4 col-lg-3">
                        <div class="nav flex-column nav-pills">
                            <a href="#v-pills-request" data-toggle="pill" class="nav-link active show">Request
                                Pickup</a>
                            <a href="#v-pills-pickup" data-toggle="pill" class="nav-link">Picking Up</a>
                            <a href="#v-pills-delivering" data-toggle="pill" class="nav-link">Delivering</a>
                            <a href="#v-pills-completed" data-toggle="pill" class="nav-link">Putaway Completed</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div id="v-pills-request" class="tab-pane fade active show">
                                <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-striped table-bordered zero-configuration dataTable"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info" data-toggle="table"
                                                data-pagination="true" data-search="true" data-show-columns="true"
                                                data-show-pagination-switch="true" data-show-refresh="true"
                                                data-key-events="true" data-show-toggle="true" data-resizable="true"
                                                data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                                data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Nama Sektor</th>
                                                        <th>Nama Rak</th>
                                                        <th>Nama Receiver</th>
                                                        <th>Status Receive</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($request as $row) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $row->tr_id; ?></td>
                                                        <td><?= date_format(date_create($row->tr_date_in),"d-F-Y"); ?>
                                                        </td>
                                                        <td><?= $row->sek_nama; ?></td>
                                                        <td><?= $row->rak_nama; ?></td>
                                                        <td><?= $row->pen_nama; ?></td>
                                                        <td><?php 
                                                            $case = $row->tr_status_receive;
                                                            switch ($case) {
                                                            case 1:
                                                                echo "Request Pickup";
                                                            break;
                                                            case 2:
                                                                echo "Receiver Picking up Palette";
                                                            break;
                                                            case 3:
                                                                echo "Delivering...";
                                                            break;
                                                            case 4:
                                                                echo "Putaway Completed";
                                                            break;
                                                            default:
                                                                echo "Aborted";
                                                        } ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= base_url('receive/pickingup/'.$row->tr_id); ?>"
                                                                    class="btn mb-1 btn-warning btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin melakukan Pickup Transaksi <?= $row->tr_id; ?>?')"><i
                                                                        class="fa fa-check-square"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">ID</th>
                                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                                        <th rowspan="1" colspan="1">Nama Sektor</th>
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
                            <div id="v-pills-pickup" class="tab-pane fade">
                                <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-striped table-bordered zero-configuration dataTable"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info" data-toggle="table"
                                                data-pagination="true" data-search="true" data-show-columns="true"
                                                data-show-pagination-switch="true" data-show-refresh="true"
                                                data-key-events="true" data-show-toggle="true" data-resizable="true"
                                                data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                                data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Nama Sektor</th>
                                                        <th>Nama Rak</th>
                                                        <th>Nama Receiver</th>
                                                        <th>Status Receive</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($pickup as $row) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $row->tr_id; ?></td>
                                                        <td><?= date_format(date_create($row->tr_date_in),"d-F-Y"); ?>
                                                        </td>
                                                        <td><?= $row->sek_nama; ?></td>
                                                        <td><?= $row->rak_nama; ?></td>
                                                        <td><?= $row->pen_nama; ?></td>
                                                        <td><?php 
                                                                $case = $row->tr_status_receive;
                                                                switch ($case) {
                                                                case 1:
                                                                    echo "Request Pickup";
                                                                break;
                                                                case 2:
                                                                    echo "Receiver Picking up Palette";
                                                                break;
                                                                case 3:
                                                                    echo "Delivering...";
                                                                break;
                                                                case 4:
                                                                    echo "Putaway Completed";
                                                                break;
                                                                default:
                                                                    echo "Aborted";
                                                            } ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= base_url('receive/delivering/'.$row->tr_id); ?>"
                                                                    class="btn mb-1 btn-warning btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin ingin melakukan Delivery Transaksi <?= $row->tr_id; ?> ke Rak <?= $row->rak_nama ?>?')"><i
                                                                        class="fa fa-check-square"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">ID</th>
                                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                                        <th rowspan="1" colspan="1">Nama Sektor</th>
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
                            <div id="v-pills-delivering" class="tab-pane fade">
                                <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-striped table-bordered zero-configuration dataTable"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info" data-toggle="table"
                                                data-pagination="true" data-search="true" data-show-columns="true"
                                                data-show-pagination-switch="true" data-show-refresh="true"
                                                data-key-events="true" data-show-toggle="true" data-resizable="true"
                                                data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                                data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Nama Sektor</th>
                                                        <th>Nama Rak</th>
                                                        <th>Nama Receiver</th>
                                                        <th>Status Receive</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($deliver as $row) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $row->tr_id; ?></td>
                                                        <td><?= date_format(date_create($row->tr_date_in),"d-F-Y"); ?>
                                                        </td>
                                                        <td><?= $row->sek_nama; ?></td>
                                                        <td><?= $row->rak_nama; ?></td>
                                                        <td><?= $row->pen_nama; ?></td>
                                                        <td><?php 
                                                            $case = $row->tr_status_receive;
                                                            switch ($case) {
                                                            case 1:
                                                                echo "Request Pickup";
                                                            break;
                                                            case 2:
                                                                echo "Receiver Picking up Palette";
                                                            break;
                                                            case 3:
                                                                echo "Delivering...";
                                                            break;
                                                            case 4:
                                                                echo "Putaway Completed";
                                                            break;
                                                            default:
                                                                echo "Aborted";
                                                        } ?></td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a href="<?= base_url('receive/putting/'.$row->tr_id); ?>"
                                                                    class="btn mb-1 btn-warning btn-sm"
                                                                    onclick="return confirm('Apakah Anda yakin telah selesai menaruh Palette Transaksi <?= $row->tr_id; ?> ke Rak <?= $row->rak_nama ?>?')"><i
                                                                        class="fa fa-check-square"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php }; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">ID</th>
                                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                                        <th rowspan="1" colspan="1">Nama Sektor</th>
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
                            <div id="v-pills-completed" class="tab-pane fade">
                                <div class="table-responsive">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table
                                                class="table table-striped table-bordered zero-configuration dataTable"
                                                id="DataTables_Table_0" role="grid"
                                                aria-describedby="DataTables_Table_0_info" data-toggle="table"
                                                data-pagination="true" data-search="true" data-show-columns="true"
                                                data-show-pagination-switch="true" data-show-refresh="true"
                                                data-key-events="true" data-show-toggle="true" data-resizable="true"
                                                data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"
                                                data-click-to-select="true" data-toolbar="#toolbar">
                                                <thead>
                                                    <tr role="row">
                                                        <th>ID</th>
                                                        <th>Tanggal Masuk</th>
                                                        <th>Nama Sektor</th>
                                                        <th>Nama Rak</th>
                                                        <th>Nama Receiver</th>
                                                        <th>Status Receive</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($put as $row) { ?>
                                                    <tr role="row" class="odd">
                                                        <td><?= $row->tr_id; ?></td>
                                                        <td><?= date_format(date_create($row->tr_date_in),"d-F-Y"); ?>
                                                        </td>
                                                        <td><?= $row->sek_nama; ?></td>
                                                        <td><?= $row->rak_nama; ?></td>
                                                        <td><?= $row->pen_nama; ?></td>
                                                        <td><?php 
                                                                $case = $row->tr_status_receive;
                                                                switch ($case) {
                                                                case 1:
                                                                    echo "Request Pickup";
                                                                break;
                                                                case 2:
                                                                    echo "Receiver Picking up Palette";
                                                                break;
                                                                case 3:
                                                                    echo "Delivering...";
                                                                break;
                                                                case 4:
                                                                    echo "Putaway Completed";
                                                                break;
                                                                default:
                                                                    echo "Aborted";
                                                            } ?></td>
                                                    </tr>
                                                    <?php }; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th rowspan="1" colspan="1">ID</th>
                                                        <th rowspan="1" colspan="1">Tanggal Masuk</th>
                                                        <th rowspan="1" colspan="1">Nama Sektor</th>
                                                        <th rowspan="1" colspan="1">Nama Rak</th>
                                                        <th rowspan="1" colspan="1">Nama Receiver</th>
                                                        <th rowspan="1" colspan="1">Status Receive</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->endSection() ?>