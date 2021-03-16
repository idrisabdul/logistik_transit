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
                            <div class="breadcrumb-item active"><a href="menu.htm">Home</a></div>
                            <div class="breadcrumb-item">Tambah LPB</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="<?= base_url('tabel_lpb/save') ?>" method="post">
                                            <div class="table-responsive">
                                                <table class="table table-sm mt-2" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">ID</th>
                                                            <th scope="col">Kode Barang</th>
                                                            <th scope="col">Nama Barang</th>
                                                            <th scope="col">Merek/Jenis</th>
                                                            <th scope="col">QTY</th>
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
                                                    <tbody>
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
                                                                <?php $row = $this->tabel_lpb_model->getQtyLPB($bp['kodebar']); ?>
                                                                <td><?= $bp['qty'] - $row['qty_lpb']; ?></td>
                                                                <td><?= $bp['sat'] ?></td>

                                                                <td><input type="date" class="form-control" name="tglinput<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="time<?= $no ?>" placeholder="waktu"></td>
                                                                <td><input type="text" class="form-control" name="qty_lpb<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="transporter<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="asal<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="sj<?= $no ?>"></td>
                                                                <td><input type="text" class="form-control" name="petugas<?= $no ?>"></td>
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
    </div>
    </div>

    <script>
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>


    <!-- Logout Delete Confirmation-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                <div class="modal-footer">
                    <button class="btn" type="button" data-dismiss="modal">Batal</button>
                    <a id="btn-delete" class="btn btn-danger" href="#">Hapus</a>
                </div>
            </div>
        </div>
    </div>