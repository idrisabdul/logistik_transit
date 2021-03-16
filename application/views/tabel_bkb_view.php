<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('_partials/header'); ?>

</head>

<body>
    <div id="app">
        <div class="main-wrapper">

            <!-- Menu Navbar -->
            <?php $this->load->view('_partials/navbar') ?>

            <!-- Menu Sidebar -->
            <?php $this->load->view('_partials/sidebar') ?>

            <!-- Main Content -->
            <div class="main-content">

                <section class="section">
                    <div class="section-header">
                        <h1>Logistik Transit HO</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Home</a></div>
                            <div class="breadcrumb-item">Bukti Keluar Barang</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <div class="card-header">
                                        <h4><?= $title ?></h4>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <button class="btn btn-outline-success">Print</button>
                                            <?php if ($this->session->userdata('level') == 1) { ?>
                                                <a class='btn btn-primary' href='<?= base_url('tabel_bkb/tabel_lpb_distinct'); ?>'>Input Barang Keluar</a>
                                            <?php } ?>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-striped" style="width:100%" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <?php if ($this->session->userdata('level') == 1) { ?>
                                                            <?php echo "<th scope='col'>Aksi</th>"; ?>
                                                        <?php } ?>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Tgl</th>
                                                        <th scope="col">No BKB</th>
                                                        <th scope="col">Kode Barang</th>
                                                        <th scope="col">Nama Barang</th>

                                                        <th scope="col">No PO</th>
                                                        <th scope="col">Supllier</th>
                                                        <th scope="col">QTY LPB</th>
                                                        <th scope="col">QTY BKB</th>
                                                        <th scope="col">Transport</th>

                                                        <th scope="col">No Pol</th>
                                                        <th scope="col">Pengirim</th>
                                                        <th scope="col">Tujuan</th>
                                                        <th scope="col">Jam Keluar</th>
                                                        <th scope="col">Status sampai</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 0;
                                                    foreach ($data_bkb->result() as $row) :
                                                        $count++;
                                                    ?>
                                                        <tr>

                                                            <?php if ($this->session->userdata('level') == 1) { ?><td>
                                                                    <?= anchor('tabel_bkb/edit_bkb/' . $row->ID, '<button type="button" href="#" class="btn btn-outline-info my-1">
                                                                <i class="far fa-edit"></i></button>'); ?> </td>
                                                            <?php } ?>
                                                            <td><?php echo $count; ?></td>
                                                            <?php $tanggal = date("j F Y", strtotime($row->tgl)); ?>
                                                            <td><?= $tanggal; ?></td>
                                                            <td><?= substr($row->nobkbtxt, -8); ?></td>
                                                            <td><?php echo $row->kodebar; ?></td>

                                                            <td><?php echo $row->nabar; ?></td>
                                                            <td><?php echo $row->nopotxt; ?></td>

                                                            <td><?php echo $row->suplier; ?></td>
                                                            <td><?php echo $row->qty_lpb; ?></td>
                                                            <td><?php echo $row->qty_bkb; ?></td>
                                                            <td><?php echo $row->transport; ?></td>

                                                            <td><?php echo $row->nopol; ?></td>
                                                            <td><?php echo $row->pengirim; ?></td>
                                                            <td><?php echo $row->tujuan; ?></td>
                                                            <td><?php echo $row->jam; ?></td>
                                                            <td><?php echo "-"; ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                </section>
            </div>

            <!-- Footer -->
            <?php $this->load->view('_partials/footer.php'); ?>

        </div>
    </div>


</body>

</html>