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
                        <h2 class="section-title my-0"><?= $title ?></h2>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Home</a></div>
                            <div class="breadcrumb-item">Bukti Keluar Barang</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
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
                                                                $status = "<div class='badge badge-success'>Sebagian</div>";
                                                            } else {
                                                                $status = "<div class='badge badge-warning'>Stok</div>";
                                                            }
                                                    ?>
                                                            <tr>
                                                                <td> <?= $no ?></td>
                                                                <td><?= $row['potxt']; ?></td>
                                                                <td><?= $row['suplier'] ?></td>
                                                                <td><?= $status ?></td>
                                                                <td><?= anchor('tabel_bkb/tampil_input_bkb/' . $row['id'], '<button type="button" href="#" class="btn btn-outline-info">
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

        $(document).ready
    </script>



</body>

</html>