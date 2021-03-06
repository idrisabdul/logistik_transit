<!DOCTYPE html>
<html lang="en">

<head>

    <?php $this->load->view('_partials/header'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

</head>

<body class="sidebar-mini">
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
                            <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Home</a></div>
                            <div class="breadcrumb-item">Bukti Keluar Barang</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <input id="multiple" type="text" class="form-control" size="50" onkeyup="test()" placeholder="Input via QRCODE">
                                                <input id="getId" type="hidden" class="form-control" size="50" onkeyup="test2()" placeholder="get Id">
                                                <!-- <video id="preview"></video> -->
                                                <div class="mb-1">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <button id="buton" class="btn btn-lg btn-outline-info mr-6" data-toggle="modal" data-target="#exampleModal" onclick="showCamera()"><i class="fas fa-camera"></i></button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover" style="width:100%" id="myTable">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">SCAN QRCODE</h5>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <video width="80%" id="preview"></video>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="batalCamera()" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {

            // overriding path of JS script and audio 
            $.qrCodeReader.jsQRpath = "<?php echo base_url() ?>assets/qrcode/dist/js/jsQR/jsQR.min.js";
            $.qrCodeReader.beepPath = "<?php echo base_url() ?>assets/qrcode/dist/audio/beep.mp3";

            // bind all elements of a given class
            $(".qrcode-reader").qrCodeReader();

            // bind elements by ID with specific options
            $("#openreader-multi2").qrCodeReader({
                multiple: true,
                target: "#multiple2",
                skipDuplicates: false
            });
            $("#openreader-multi3").qrCodeReader({
                multiple: true,
                target: "#multiple3"
            });

            // read or follow qrcode depending on the content of the target input
            $("#openreader-single2").qrCodeReader({
                callback: function(code) {
                    if (code) {
                        window.location.href = code;
                    }
                }
            }).off("click.qrCodeReader").on("click", function() {
                var qrcode = $("#single2").val().trim();
                if (qrcode) {
                    window.location.href = qrcode;
                } else {
                    $.qrCodeReader.instance.open.call(this);
                }
            });


        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#multiple").keyup(function() {


                var po = $('#multiple').val();
                // console.log(po);
                if (po != "") {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('tabel_lpb/input_lpb_qrcode/') ?>',
                        dataType: 'JSON',
                        cache: false,
                        data: {
                            po: po
                        },
                        success: function(data) {
                            // window.location.href = '<?= base_url() ?>tabel_lpb/input_lpb_qrcode';
                            console.log(data);
                        }

                    });
                }
            });

        });

        function test(po) {

            // var po = $('#multiple').val();
            if (po != "") {
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('tabel_bkb/input_bkb_qrcode/') ?>',
                    dataType: 'JSON',
                    async: true,
                    cache: false,
                    data: {
                        po: po
                    },
                    success: function(id) {
                        $('#getId').val(id);
                        // console.log("success");
                        test2();
                    },
                    error: function(data) {
                        $('#getId').val("error");
                        console.log("error");
                    }
                });
            }
        }

        function test2() {
            var id = $('#getId').val();
            // alert(id);
            window.location.href = '<?= base_url() ?>tabel_bkb/tampil_input_bkb/' + id;
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#preview').hide();

        });

        function showCamera() {
            Instascan.Camera.getCameras().then(function(cameras) {
                if (cameras.length > 0) {
                    scanner.start(cameras[1]);
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function(e) {
                console.error(e);
            });
            $('#exampleModal').show();
            $('#preview').show();
        }

        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        scanner.addListener('scan', function(content) {
            console.log(content);
            $('#preview').hide();
            get_nopo(content);
            test(content);
        });

        function batalCamera() {
            Instascan.Camera.getCameras().then(function() {
                scanner.stop();
            });
        }

        function get_nopo(e) {
            // $('#multiple').val(e);
            // window.location.href = '<?= base_url() ?>tabel_lpb/test/' + 206;

            // alert(id);
        }
    </script>



</body>

</html>