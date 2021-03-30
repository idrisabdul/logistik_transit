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
                        <h2 class="section-title my-0">Input LPB</h2>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="menu.htm">Home</a></div>
                            <div class="breadcrumb-item">Tambah LPB</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h2 class="section-title ml-2"></h2>
                                            <p class="section-lead"></p>
                                        </div>
                                        <div class="col-md-4 mt-4 mr-3">
                                            <input id="multiple" type="text" onkeyup="toInsert()" class="form-control" size="50">
                                        </div>
                                        <div class="col-md-1 text-right">
                                            <button type="button" href="#" class="btn btn-lg btn-outline-info mt-4 mr-6 qrcode-reader" id="openreader-multi" data-qrr-multiple="true" data-qrr-repeat-timeout="0" data-qrr-line-color="#00FF00" data-qrr-target="#multiple">
                                                <i class="fas fa-camera"></i></button>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>

                                    <div class="card-body">
                                        <form action="<?= base_url('tabel_lpb/save') ?>" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Kode Barang</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Merek/Jenis</th>
                                                            <th scope="col">QTY PO</th>
                                                            <th scope="col">QTY LPB</th>
                                                            <th scope="col">QTY sisa</th>
                                                            <th scope="col">SAT</th>

                                                            <th scope="col">TGL</th>
                                                            <th scope="col">JAM</th>
                                                            <th scope="col">QTY LPB</th>
                                                            <th scope="col">Nama Ekspedisi</th>
                                                            <th scope="col">Asal</th>
                                                            <th scope="col">No SJ</th>
                                                            <th scope="col">Nama Petugas</th>

                                                            <th scope="col">Ket</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="input_barang">
                                                        <?php $no = 0; ?>
                                                        <?php foreach ($barang_po as $bp) : ?>
                                                            <?php $no = $no + 1; ?>
                                                            <input type="hidden" name="po<?= $no ?>" value="<?= substr($bp['noref'], -7); ?>">
                                                            <input type="hidden" name="PT<?= $no ?>" value="<?= $bp['namapt'] ?>">
                                                            <input type="hidden" name="potxt<?= $no ?>" value="<?= $bp['noref'] ?>">
                                                            <input type="hidden" name="ket_dept<?= $no ?>" value="<?= $bp['ket_dept'] ?>">
                                                            <input type="hidden" name="suplier<?= $no ?>" value="<?= $bp['nama_supply'] ?>">
                                                            <input type="hidden" name="tgl<?= $no ?>" value="<?= $bp['tglpo'] ?>">
                                                            <input type="hidden" name="edit" value="0">
                                                            <input type="hidden" name="count" value="<?= $no ?>">
                                                            <input type="hidden" name="kodebar<?= $no ?>" value="<?= $bp['kodebar'] ?>">
                                                            <input type="hidden" name="qty_po<?= $no ?>" value="<?= $bp['qty'] ?>">
                                                            <input type="hidden" name="nabar<?= $no ?>" value="<?= $bp['nabar'] ?>">
                                                            <input type="hidden" name="merek<?= $no ?>" value="<?= $bp['merek'] ?>">
                                                            <input type="hidden" name="sat<?= $no ?>" value="<?= $bp['sat'] ?>">
                                                            <input type="hidden" name="kodept<?= $no ?>" value="<?= $bp['kodept'] ?>">
                                                            <input type="hidden" name="user<?= $no ?>" value="<?= $this->session->userdata('nama'); ?>">
                                                            <input type="hidden" name="txtperiode<?= $no ?>" value="<?= $this->session->userdata('periode'); ?>">

                                                            <tr>
                                                                <td><?= $bp['id'] ?></td>
                                                                <td><?= $bp['kodebar'] ?></td>
                                                                <td><?= $bp['nabar'] ?></td>
                                                                <td><?= $bp['merek'] ?></td>
                                                                <?php $row = $this->tabel_lpb_model->getQtyLPB($bp['kodebar'], $bp['merek'], $bp['noref']); ?>
                                                                <td><?= $bp['qty'] ?></td>
                                                                <td><?= $row['qty_lpb'] == NULL ? 0 : $row['qty_lpb']; ?></td>
                                                                <td id="hasil"><?= $sisa = $bp['qty'] - $row['qty_lpb']; ?></td>
                                                                <input type="hidden" id="sisa<?= $no ?>" value="<?= $sisa ?>">
                                                                <input type="hidden" value="<?= $sisa ?>" min="1" max="<?= $sisa ?>" step="01">
                                                                <td><?= $bp['sat'] ?></td>

                                                                <td><?php if ($sisa == 0) { ?>
                                                                        <input type="date" class="form-control" name="tglinput<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="date" class="form-control" name="tglinput<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                                <td><?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="time<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="time<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php if ($sisa == 0) { ?>
                                                                        <input type="text" id="input<?= $no ?>" class="form-control" name="qty_lpb<?= $no ?>" min="1" max="<?= $sisa ?>" step=".01" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" id="input<?= $no ?>" class="form-control" name="qty_lpb<?= $no ?>" min="1" max="<?= $sisa ?>" step=".01">
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="transporter<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="transporter<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                                <td>
                                                                    <?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="asal<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="asal<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                                <td><?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="sj<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="sj<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                                <td><?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="petugas<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="petugas<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td><?php if ($sisa == 0) { ?>
                                                                        <input type="text" class="form-control" name="ket<?= $no ?>" disabled>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control" name="ket<?= $no ?>">
                                                                    <?php } ?>
                                                                </td>

                                                            </tr>
                                                        <?php endforeach; ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="submit" class="btn btn-info pull-right">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            </section>
        </div>

        <?php $this->load->view('_partials/footer') ?>
        <script type="text/javascript">
            var count = $("#count").val();
            for (let i = 1; i <= count; i++) {
                console.log(i);
                $(document).ready(function() {
                    $("#input" + i).keyup(function() {
                        var a = $("#input" + i).val();
                        var b = $("#sisa" + i).val();
                        var inp_1 = Number(a);
                        var inp_2 = Number(b);

                        if (inp_1 > inp_2) {
                            swal("QTY Melebihi sisa");
                            $("#input" + i).val("");
                        } else {
                            $("#input" + i).val(inp_1);
                        }
                    });
                });

            }
        </script>
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
        <script>
            $(document).ready(function() {

                function toInsert() {
                    var po = $('#multiple').val();

                    $.ajax({
                        url: '<?= base_url(); ?>tabel_lpb/input_lpb_qrcode',
                        method: 'POST',
                        cache: false,
                        dataType: 'JSON',
                        async: true,
                        data: {
                            po: po
                        },
                        success: function(data) {
                            var html = '';
                            var i;
                            for (i = 0; i < data.length; i++) {
                                html +=
                                    '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].kodebar + '</td>' +
                                    '<td>' + data[i].nabar + '</td>' +
                                    '<td>' + data[i].merek + '</td>' +
                                    '<td>' + data[i].qty + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    // '<td>' + data[i].nabar + '</td>' +
                                    '</tr>';
                            }
                            $('#input_barang').html(html);
                        }
                    });
                };

            });
        </script>
    </div>