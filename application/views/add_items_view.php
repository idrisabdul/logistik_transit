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
            <h2 class="section-title my-0">Daftar Purchase Order</h2>
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
                    <div class="row mb-2">
                      <div class="col-md-4">
                        <input id="multiple" type="text" class="form-control" size="50" onkeyup="test()" placeholder="No PO via QRCODE">
                        <input id="getId" type="hidden" class="form-control" size="50" onkeyup="test2()" placeholder="get Id">
                        <div class="mb-1">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <button href="<?= base_url('tabel_lpb/input_lpb_qrcode') ?>" class="btn btn-lg btn-outline-info mr-6 qrcode-reader" id="openreader-multi" data-qrr-multiple="true" data-qrr-repeat-timeout="0" data-qrr-line-color="#00FF00" data-qrr-target="#multiple">
                          <i class="fas fa-camera"></i></button>
                      </div>
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
                            $sumqtypo = $this->tabel_lpb_model->getSumQtyPO($nopo);
                            $sumqtylpb = $this->tabel_lpb_model->getSumQtyLPB($nopo);

                            $total = $sumqtypo['qty'] - $sumqtylpb['qty_lpb'];
                            if ($total == 0) {
                              $status = "<div class='badge badge-danger'>Habis</div>";
                            } elseif ($total < $sumqtypo['qty']) {
                              $status = "<div class='badge badge-success'>Sebagian</div>";
                            } else {
                              $status = "<div class='badge badge-warning'>__</div>";
                            }

                            // if ($result2->num_rows() >= 1) {
                            //   $status = "<div class='badge badge-success'>LPB</div>";
                            // } else {
                            //   $status = "<div class='badge badge-warning'>__</div>";
                            // }

                            if ($total == 0) {
                            } else {
                            ?>
                              <tr>
                                <td><?= $i ?></td>
                                <td><?= $show_po->namapt ?></td>
                                <td><?= $show_po->noreftxt; ?></td>
                                <?php $tanggal = date("j F Y", strtotime($show_po->tglpo)); ?>
                                <td><?= $tanggal; ?></td>
                                <td><?= $show_po->nama_supply; ?></td>
                                <td><?= $status ?></td>
                                <td><?= anchor('tabel_lpb/tambah_lpb/' . $show_po->id, '<button type="button" href="#" class="btn btn-outline-info">
                                                    input</button>') ?></td>
                              </tr>
                              <?php $i++ ?>
                            <?php } ?>
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

    function test() {

      var po = $('#multiple').val();
      if (po != "") {
        $.ajax({
          type: 'POST',
          url: '<?= base_url('tabel_lpb/input_lpb_qrcode/') ?>',
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
      window.location.href = '<?= base_url() ?>tabel_lpb/test/' + id;
    }
  </script>


</body>

</html>