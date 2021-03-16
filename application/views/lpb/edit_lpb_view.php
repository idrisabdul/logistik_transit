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
                            <div class="breadcrumb-item">Edit LPB</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <div class="card-body">
                                        <?php $i = 1; ?>
                                        <?php foreach ($po->result_array() as $item_po) : ?>
                                            <form action="<?= base_url('tabel_lpb/update/' . $item_po['id']) ?>" method="post">
                                                <h4><?= $item_po['potxt']; ?></h4>
                                                <div class="card-header ml-0">
                                                    <h4><?= $item_po['suplier'] ?></h4>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Kode Barang</label>
                                                        <input type="text" class="form-control" id="kodebar" name="kodebar" readonly value="<?= $item_po['kodebar']; ?>">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">Nama Barang</label>
                                                        <input type="text" class="form-control" id="nabar" name="nabar" readonly value="<?= $item_po['nabar']; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row col-md-6">
                                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Merek Jenis</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="merek" readonly value="<?= $item_po['merek'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">QTY PO</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="qty_po" readonly value="<?= $item_po['qty_po'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">SAT</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="sat" readonly value="<?= $item_po['sat'] ?>">
                                                    </div>
                                                </div>

                                                <div class="card-header">
                                                    <h4>Penerimaan</h4>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control" name="tgl" value="<?= $item_po['tgl'] ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">Jam</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="jam" value="<?= $item_po['jam'] ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">QTY LPB</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="qty_lpb" value="<?= $item_po['qty_lpb'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">No SJ</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="sj" class="form-control" value="<?= $item_po['sj'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">Nama Transporter</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="transporter" value="<?= $item_po['transporter'] ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row col-md-6">
                                                    <label class="col-sm-3 col-form-label">Ket</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="ket" value="<?= $item_po['ket'] ?>">
                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button type="submit" href="#" class="btn btn-icon icon-left btn-info pull-right mr-2">
                                                        <i class="far fa-edit"></i> Edit
                                                    </button>
                                                    <?= anchor('tabel_lpb/cetakpo/' . $item_po['id'], '<button type="button" href="#" class="btn btn-icon icon-left btn-warning mr-2">
                                                    <i class="fas fa-print"></i> Cetak PO</button>') ?>
                                                    <?php // base_url('tabel_lpb/delete_itemlpb/' . $item_po['id']) 
                                                    ?>
                                                    <a onclick="deleteConfirm('<?= base_url('tabel_lpb/delete_itemlpb/' . $item_po['id']) ?>')" href="#!" class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                                                </div>
                                            </form>

                                    </div>

                                </div>
                            <?php endforeach; ?>
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