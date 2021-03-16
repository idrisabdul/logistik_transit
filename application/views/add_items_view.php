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
              <div class="breadcrumb-item">Input Penerimaan Barang Transit HO</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg">
                <div class="card">
                  <div class="card-body">
                    <div class="card-header">
                      <h4>Data PO</h4>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-sm" id="myTable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>PT</th>
                            <th>No PO</th>
                            <th>TGL PO</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Aksi Input LPB</th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php $i = 1; ?>
                          <?php foreach ($po as $show_po) : ?>
                            <?php
                            $nopo = $show_po->noreftxt;
                            $result2 = $this->db->query("SELECT * FROM lpb where potxt='$nopo'");
                            if ($result2->num_rows() >= 1) {
                              $status = "LPB";
                            } else {
                              $status = "-";
                            }
                            ?>
                            <tr>
                              <td><?= $i ?></td>
                              <td><?= $show_po->namapt ?></td>
                              <td><?= $show_po->noreftxt; ?></td>
                              <?php $tanggal = date("j F Y", strtotime($show_po->tglpo)); ?>
                              <td><?= $tanggal; ?></td>
                              <td><?= $show_po->nama_supply; ?></td>
                              <td><?= $status ?></td>
                              <td><?= anchor('tabel_lpb/tambah_lpb/' . $show_po->id, '<button type="button" href="#" class="btn btn-outline-info my-1">
                                                    input</button>') ?></td>
                            </tr>
                            <?php $i++ ?>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
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
  <div class="modal fade bd-example-modal-xl" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">

    <?php

    foreach ($generate->result_array() as $rows) {

      if ($rows >= 1) {
        $nolpb = $rows['no_lpb'] + 1;
        if ($nolpb <= 9) {
          $URUT = "0000" . $nolpb;
        } elseif ($nolpb >= 9 && $nolpb < 99) {
          $URUT = "000" . $nolpb;
        } elseif ($nolpb >= 99 && $nolpb < 999) {
          $URUT = "00" . $nolpb;
        } elseif ($nolpb >= 999 && $nolpb < 9999) {
          $URUT = "0" . $nolpb;
        } elseif ($nolpb >= 9999) {
          $URUT =  $nolpb;
        }
        $awalref = "HO-LPB/JKT/" . date('m') . "/" . date('Y') . "/" . "62" . $URUT;
      } else {
        $nolpb = 1;
        $URUT = "610000" . $nolpb;
        $awalref = "HO-LPB/JKT/" . date('m') . "/" . date('Y') . "/" . $URUT;
      }
    }

    ?>
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">
            <span id="noreftxtspan"></span>
          </h4>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url('tabel_lpb/save'); ?>">
          <div class="modal-body">


            <div class="form-group col-md-6">
              <label class="control-label col-xs-3">Suplier</label>
              <div class="col-xs-8">
                <span id="supplierspan"></span>
                <input type="hidden" id="supplier" name="suplier">
              </div>
            </div>

            <input type="hidden" id="noreftxt" name="potxt">

            <input type="hidden" name="po" id="nopo">
            <input type="hidden" name="PT" id="namapt">

            <input type="hidden" name="tgl" id="tglpotxt">
            <input type="hidden" name="kodebar" id="kodebar">
            <input type="hidden" name="merek" id="merek">
            <input type="hidden" name="user" value="<?= $this->session->userdata['nama'] ?>" placeholder="user">
            <input type="hidden" name="txtperiode" id="periodetxt">

            <input type="hidden" name="no_lpb" value="<?= $nolpb ?>">
            <input type="hidden" name="lpbtxt" value="<?= $awalref ?>">
            <input type="hidden" name="qty_bkb" id="qty_bkb" placeholder="qty-bkb">
            <input type="hidden" name="nobkb" id="nobkb" placeholder="no-bkb">
            <input type="hidden" name="depart" id="ket_dept">
            <input type="hidden" name="kodept" id="kodept">
            <hr>
            <div class="form-row">
              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Nama Barang</label>
                <div class="col-xs-8">
                  <span id="nabarspan"></span>
                  <input type="hidden" id="nabar" name="nabar" value="">
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">QTY PO</label>
                <div class="col-xs-8">
                  <?php $qtypo = '<span id="qtyspan"></span>'; ?>
                  <?= $qtypo; ?>
                  <input type="hidden" id="qty" name="qty_po">
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">QTY Sisa PO</label>
                <div class="col-xs-8">
                  <span id="qty_sisa"></span>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">SAT</label>
                <div class="col-xs-8">
                  <span id="satspan"></span>
                  <input type="hidden" id="sat" name="sat">
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Tanggal</label>
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
                <label class="control-label col-xs-3">QTY</label>
                <div class="col-xs-8">
                  <input name="qty_lpb" class="form-control" type="number" placeholder="Jumlah" required>
                </div>
              </div>



              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Nama Ekspedisi</label>
                <div class="col-xs-8">
                  <input name="transporter" class="form-control" type="text" required>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Asal</label>
                <div class="col-xs-8">
                  <input name="asal" class="form-control" type="text" required>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">No Surat Jalan</label>
                <div class="col-xs-8">
                  <input name="sj" class="form-control" type="text" required>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Nama Petugas</label>
                <div class="col-xs-8">
                  <input name="petugas" class="form-control" type="text" required>
                </div>
              </div>

              <div class="form-group col-md-2">
                <label class="control-label col-xs-3">Keterangan</label>
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

        var nabar = $(this).data('nabar');
        var qty = $(this).data('qty');
        var sat = $(this).data('sat');
        var supplier = $(this).data('supplier');
        var noreftxt = $(this).data('noreftxt');

        var nopo = $(this).data('nopo');
        var namapt = $(this).data('namapt');
        var tglpotxt = $(this).data('tglpotxt');
        var kodebar = $(this).data('kodebar');
        var merek = $(this).data('merek');
        var periodetxt = $(this).data('periodetxt');
        var ket_dept = $(this).data('ket_dept');
        var kodept = $(this).data('kodept');

        var qty_sisa = $(this).data('qty_sisa');

        $('#nabarspan').text(nabar);
        $('#qtyspan').text(qty);
        $('#satspan').text(sat);
        $('#supplierspan').text(supplier);
        $('#noreftxtspan').text(noreftxt);

        $('#qty_sisa').text(qty_sisa);

        $('#nabar').val(nabar);
        $('#qty').val(qty);
        $('#sat').val(sat);
        $('#supplier').val(supplier);
        $('#noreftxt').val(noreftxt);

        $('#nopo').val(nopo);
        $('#namapt').val(namapt);
        $('#tglpotxt').val(tglpotxt);
        $('#kodebar').val(kodebar);
        $('#merek').val(merek);
        $('#periodetxt').val(periodetxt);
        $('#ket_dept').val(ket_dept);
        $('#kodept').val(kodept);



      })
    })
  </script>

</body>

</html>