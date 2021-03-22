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
                            <div class="breadcrumb-item active"><a href="menu.htm">Home</a></div>
                            <div class="breadcrumb-item">Tambah BKB</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <h2 class="section-title ml-2"><?= $nopo ?></h2>
                                    <p class="section-lead"><?= $suplier ?></p>
                                    <div class="card-body">

                                        <form action="<?= base_url('tabel_bkb/save') ?>" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-sm" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Kode Barang</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">QTY Awal</th>
                                                            <th scope="col">QTY sisa</th>
                                                            <th scope="col">SAT</th>

                                                            <th scope="col">Kondisi Fisik</th>
                                                            <th scope="col">Tanggal BKB</th>
                                                            <th scope="col">Jam BKB</th>
                                                            <th scope="col">QTY BKB</th>
                                                            <th scope="col">Transport</th>
                                                            <th scope="col">Nama Transporter</th>
                                                            <th scope="col">No. Pol</th>

                                                            <th scope="col">Tujuan</th>
                                                            <th scope="col">Ket</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no = 0; ?>
                                                        <?php foreach ($barang_item_bkb as $bib) : ?>
                                                            <?php $no = $no + 1; ?>
                                                            <input type="hidden" name="PT<?= $no ?>" value="<?= $bib['PT'] ?>">
                                                            <input type="hidden" name="nopotxt<?= $no ?>" value="<?= $bib['potxt'] ?>">
                                                            <input type="hidden" name="tgl<?= $no ?>" value="<?= $bib['tgl'] ?>">
                                                            <input type="hidden" name="nopo<?= $no ?>" value="<?= $bib['po'] ?>">
                                                            <input type="hidden" name="edit<?= $no ?>" value="0">
                                                            <input type="hidden" name="suplier<?= $no ?>" value="<?= $bib['suplier'] ?>">
                                                            <input type="hidden" name="depart<?= $no ?>" value="<?= $bib['depart'] ?>">
                                                            <input type="hidden" name="count" value="<?= $no ?>">
                                                            <input type="hidden" name="edit<?= $no ?>" value="0">
                                                            <input type="hidden" name="lpbtxt<?= $no ?>" value="<?= $bib['lpbtxt'] ?>">
                                                            <input type="hidden" name="kodebar<?= $no ?>" value="<?= $bib['kodebar'] ?>">
                                                            <input type="hidden" name="qty_lpb<?= $no ?>" value="<?= $bib['qty_lpb'] ?>">
                                                            <input type="hidden" name="nabar<?= $no ?>" value="<?= $bib['nabar'] ?>">
                                                            <input type="hidden" name="sat<?= $no ?>" value="<?= $bib['sat'] ?>">
                                                            <input type="hidden" name="kodept<?= $no ?>" value="<?= $bib['kodept'] ?>">

                                                            <tr>
                                                                <td><?= $no ?></td>
                                                                <td><?= $bib['kodebar']; ?></td>
                                                                <td><?= $bib['nabar']; ?></td>
                                                                <?php $rowbkb = $this->tabel_bkb_model->getQtyBkb($bib['kodebar'], $bib['potxt']); ?>
                                                                <?php $row = $this->tabel_bkb_model->getQtyLpb($bib['kodebar']); ?>
                                                                <td><?= $row['qty_lpb'] ?></td>
                                                                <td><?= $sisa = $row['qty_lpb'] - $rowbkb['qty_bkb']; ?></td>
                                                                <input type="hidden" id="sisa<?= $no ?>" value="<?= $sisa ?>">
                                                                <input type="hidden" id="total" value="<?= count($barang_item_bkb); ?>">
                                                                <td><?= $bib['sat']; ?></td>

                                                                <td><select class="form-control" name="kondisi<?= $no ?>" id="">
                                                                        <option value="Baik">Baik</option>
                                                                        <option value="Rusak">Rusak</option>
                                                                    </select></td>
                                                                <td><input type="date" class="form-control" name="tglinput<?= $no ?>" value="<?= date('d-m-Y') ?>"></td>
                                                                <td><input type="text" class="form-control" name="jam<?= $no ?>"></td>
                                                                <td><input type="text" id="input<?= $no ?>" class="form-control" name="qty_bkb<?= $no ?>" min="1" max="<?= $sisa ?>"></td>
                                                                <td>
                                                                    <div class="col-xs-8"><select class="form-control" name="transport<?= $no ?>" id="">
                                                                            <option value="Internal">Internal</option>
                                                                            <option value="External">External</option>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                                <td><input type="text" class="form-control" name="pengirim<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="nopol<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="tujuan<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="ket<?= $no ?>"></td>

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
            var count = $("#total").val();
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
    </div>
    </div>