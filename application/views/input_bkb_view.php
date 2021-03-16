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
                                        <h4><?= "Daftar Barang PO" ?></h4>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm" style="width:100%" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">No PO</th>
                                                        <th scope="col">Suplier</th>
                                                        <th scope="col">Status LPB</th>
                                                        <th scope="col">Aksi Input BKB</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $no = 0;

                                                    foreach ($data_lpb as $row) {
                                                        $no = $no + 1;
                                                        $nopo = $row['potxt'];
                                                        $qry = $this->db->query("select SUM(qty_lpb) as qtylpb from lpb where potxt='$nopo' ");
                                                        foreach ($qry->result_array() as $data) {
                                                            $qtylpb = $data['qtylpb'];
                                                        }

                                                        $result2 = $this->db->query("SELECT SUM(qty_bkb) as qtybkb  FROM bkb where nopotxt='$nopo' ");
                                                        foreach ($result2->result_array() as $row2) {
                                                            $qtybkb = $row2['qtybkb'];
                                                        }
                                                        if ($qtylpb != $qtybkb) {



                                                            if ($qtylpb >= $qtybkb && $qtybkb > 0) {
                                                                $status = "Sebagian";
                                                            } else {
                                                                $status = "Stok";
                                                            }
                                                    ?>
                                                            <tr>
                                                                <td> <?= $no ?></td>
                                                                <td><?= $row['potxt']; ?></td>
                                                                <td><?= $row['suplier'] ?></td>
                                                                <td><?= $status ?></td>
                                                                <td><?= anchor('tabel_bkb/tampil_input_bkb/' . $row['id'], '<button type="button" href="#" class="btn btn-outline-info my-1">
                                                    input</button>') ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    <?php } ?>

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

    <div class="modal fade bd-example-modal-xl" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">
                        <span id="noreftxtspan"></span>
                    </h4>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('tabel_bkb/save'); ?>">
                    <div class="modal-body">


                        <div class="form-group col-md-6">
                            <label class="control-label col-xs-3">Suplier</label>
                            <div class="col-xs-8">
                                <span id="suplierspan"></span>
                                <input type="hidden" id="suplier" name="suplier">
                            </div>
                        </div>


                        <input type="hidden" name="nopo" id="nopo">
                        <input type="hidden" name="PT" id="pt">

                        <input type="hidden" name="tgl" id="tgl">
                        <input type="hidden" name="nopotxt" id="potxt" placeholder="nopotxt">
                        <input type="hidden" name="user" value="<?= $this->session->userdata['nama'] ?>" placeholder="user">
                        <input type="hidden" name="periodetxt" id="periodetxt">

                        <input type="hidden" name="nobkb" value="<?= $nobkb ?>">
                        <input type="hidden" name="nobkbtxt" value="<?= $awalref; ?>">
                        <input type="hidden" name="depart" id="ket_dept">
                        <input type="hidden" name="kodept" id="kodept">
                        <hr>
                        <div class="form-row">

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Kode Barang</label>
                                <div class="col-xs-8">
                                    <span id="kodebarspan"></span>
                                    <input type="hidden" id="kodebar" name="kodebar" value="">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Nama Barang</label>
                                <div class="col-xs-8">
                                    <span id="nabarspan"></span>
                                    <input type="hidden" id="nabar" name="nabar" value="">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">QTY LPB</label>
                                <div class="col-xs-8">
                                    <?php $qtylpb = '<span id="qtylpbspan"></span>'; ?>
                                    <?php $qtybkb = '<span id="qtybkbspan"></span>'; ?>
                                    <?php $saldo = $qtylpb //- $qtybkb 
                                    ?>
                                    <?= $saldo ?>
                                    <input type="hidden" id="qtylpb" name="qty_lpb">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">SISA QTY LPB</label>
                                <div class="col-xs-8">
                                    <span id="sisalpb"></span>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">SAT</label>
                                <div class="col-xs-8">
                                    <span id="satspan"></span>
                                    <input type="hidden" id="sat" name="sat">
                                </div>
                            </div>

                            <div class="form-grup col-md-2">
                                <label class="control-label col-xs-3">Kondisi</label>
                                <select class="form-control" name="kondisi" id="">
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak">Rusak</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Tanggal BKB</label>
                                <div class="col-xs-8">
                                    <input name="tglinput" class="form-control" type="date" required>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Jam</label>
                                <div class="col-xs-8">
                                    <input name="jam" class="form-control" type="text" placeholder="Jam" required>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">QTY BKB</label>
                                <div class="col-xs-8">
                                    <input name="qty_bkb" class="form-control" type="number" placeholder="Jumlah" required>
                                </div>
                            </div>



                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Transport</label>
                                <div class="col-xs-8"><select class="form-control" name="transport" id="">
                                        <option value="Internal">Internal</option>
                                        <option value="External">External</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Nama Transport</label>
                                <div class="col-xs-8">
                                    <input name="pengirim" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">No. Pol</label>
                                <div class="col-xs-8">
                                    <input name="nopol" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Tujuan</label>
                                <div class="col-xs-8">
                                    <input name="tujuan" class="form-control" type="text" required>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="control-label col-xs-3">Ket</label>
                                <div class="col-xs-8">
                                    <input name="ket" class="form-control" type="text" required>
                                </div>
                            </div>

                        </div>
                        <hr>

                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {

                var kodebar = $(this).data('kodebar');
                var nabar = $(this).data('nabar');
                var qtylpb = $(this).data('qtylpb');
                var sat = $(this).data('sat');
                var suplier = $(this).data('suplier');
                var noreftxt = $(this).data('noreftxt');

                var pt = $(this).data('pt');
                var nobkb = $(this).data('nobkb');
                var tgl = $(this).data('tgl');
                var nopo = $(this).data('nopo');
                var potxt = $(this).data('potxt');
                var periodetxt = $(this).data('periodetxt');
                var depart = $(this).data('depart');
                var kodept = $(this).data('kodept');

                var sisalpb = $(this).data('sisalpb');


                $('#kodebarspan').text(kodebar);
                $('#nabarspan').text(nabar);
                $('#qtylpbspan').text(qtylpb);
                $('#satspan').text(sat);
                $('#suplierspan').text(suplier);

                $('#kodebar').val(kodebar);
                $('#nabar').val(nabar);
                $('#qtylpb').val(qtylpb);
                $('#sat').val(sat);
                $('#suplier').val(suplier);
                $('#pt').val(pt);
                $('#nobkb').val(nobkb);
                $('#tgl').val(tgl);
                $('#nopo').val(nopo);
                $('#potxt').val(potxt);
                $('#periodetxt').val(periodetxt);
                $('#ket_dept').val(depart);
                $('#kodept').val(kodept);


                $('#sisalpb').text(sisalpb);

            })
        })
    </script>


</body>

</html>