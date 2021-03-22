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
            <h2 class="section-title my-0">Tabel LPB</h2>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Home</a></div>
              <div class="breadcrumb-item">Laporan Penerimaan Barang</div>
            </div>
          </div>

          <div class="section-body mt-0">
            <div class="row">
              <div class="col-12 col-md-12 col-lg">
                <div class="card">
                  <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group text-right">
                      <a href="<?= base_url() ?>tabel_lpb/pdf" class="btn btn-outline-success">Print</a>
                      <?php if ($this->session->userdata('level') == 1) { ?>
                        <a class='btn btn-primary mr-3 ml-1' href="<?= base_url('tabel_lpb/add_new'); ?>">Terima Barang</a>
                      <?php } ?>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-sm" style="width:100%" id="myTable">
                        <thead>
                          <tr>
                            <th scope="col">Aksi</th>
                            <th scope="col">No</th>
                            <th scope="col">Tgl</th>
                            <th scope="col">No LPB</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">No PO</th>

                            <th scope="col">Nama Barang</th>
                            <th scope="col">Merek/Jenis</th>
                            <th scope="col">Supplier</th>
                            <th scope="col">Expedisi</th>
                            <th scope="col">Asal</th>

                            <th scope="col">QTY PO</th>
                            <th scope="col">QTY LPB</th>
                            <th scope="col">Jam Terima</th>
                            <th scope="col">Depart/Divisi</th>
                            <th scope="col">Ket</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $count = 0;
                          foreach ($tabel_lpb->result_array() as $row) :

                            $count++;
                          ?>
                            <tr>

                              <td>
                                <?php if ($this->session->userdata('level') == 1) { ?>
                                  <?= anchor('tabel_lpb/edit_lpb/' . $row['id'], '<button type="button" href="#" class="btn btn-sm btn-outline-info my-1">
                                                    <i class="far fa-edit"></i></button>') ?>
                                <?php } ?>
                                <?= anchor('tabel_lpb/cetakpo/' . $row['id'], '<button type="button" href="#" class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-print"></i></button>') ?></td>
                              <td><?php echo $count; ?></td>
                              <?php $tanggal = date("j F Y", strtotime($row['tgl'])); ?>
                              <td><?php echo $tanggal; ?></td>
                              <td><?php echo substr($row['lpbtxt'], -7); ?></td>
                              <td><?php echo $row['kodebar'] ?></td>
                              <td><?= $row['potxt'] ?></td>

                              <td><?php echo $row['nabar'] ?></td>
                              <td><?php echo $row['merek'] ?></td>
                              <td><?php echo $row['suplier'] ?></td>
                              <td><?php echo $row['transporter'] ?></td>
                              <td><?php echo $row['asal'] ?></td>

                              <td><?php echo $row['qty_po'] ?></td>
                              <td><?php echo $row['qty_lpb'] ?></td>
                              <td><?php echo $row['jam'] ?></td>
                              <td><?php echo $row['depart'] ?></td>
                              <td><?php echo $row['ket']; ?>
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
  <div class="modal fade bd-example-modal-lg" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <script language="javascript">
          function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
        </script>


        <div class="col-md-4"><input type="button" class="btn btn-outline-danger my-2" onclick="printDiv('printableArea')" value="Cetak" /></div>

        <div align="center" id="printableArea">
          <style>
            h3 {
              text-align: center;
            }
          </style>

          <table border="0" width="716" height="362" cellspacing="0" cellpadding="0">
            <tr>
              <td width="716" colspan="7"><b>
                  <font face="Verdana" size="2">HEAD
                    OFFICE - PT MULIA SAWIT AGRO LESTARI </font>
                </b>
            </tr>
            <tr>
              <td width="716" colspan="7">&nbsp;</td>
            </tr>
            <tr>
              <td width="716" colspan="7" height="21">
                <p align="center"><u><b>
                      <font size="3" face="Verdana">Laporan Penerimaan Barang (LPB)</font>
                    </b></u>
              </td>
            </tr>
            <tr>
              <td width="716" colspan="7" align="center"><span id="lpbtxt"></span></td>
            </tr>
            <tr>
              <td width="133" height="19">&nbsp;</td>
              <td width="10" height="19">&nbsp;</td>
              <td width="171" height="19">&nbsp;</td>
              <td width="14" height="19">&nbsp;</td>
              <td width="165" height="19">&nbsp;</td>
              <td width="11" height="19">&nbsp;</td>
              <td width="212" height="19">&nbsp;</td>
            </tr>
            <tr>
              <td width="133" height="19">
                <font face="Verdana" size="1">Nama Supplier </font>
              </td>
              <td width="10" height="19">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="171" height="19">
                <font face="Verdana" size="1"><span id="suplier"></span></font>
              </td>
              <td width="14" height="19">&nbsp;</td>
              <td width="165" height="19">
                <font face="Verdana" size="1">No.Pesanan Pembeliaan</font>
              </td>
              <td width="11" height="19">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="212" height="19">
                <font face="Verdana" size="1"><span id="potxt"></span></font>
              </td>
            </tr>
            <tr>
              <td width="133">
                <font face="Verdana" size="1">Surat Pengantar No</font>
              </td>
              <td width="10">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="171">
                <font face="Verdana" size="1"><span id="sj"></span></font>
              </td>
              <td width="14">&nbsp;</td>
              <td width="165">
                <font face="Verdana" size="1">Tanggal Penerimaan</font>
              </td>
              <td width="11">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="212">
                <font face="Verdana" size="1"><span id="tgl"></span></font>
              </td>
            </tr>
            <tr>
              <td width="133">
                <font face="Verdana" size="1">Lokasi Gudang</font>
              </td>
              <td width="10">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="171"></td>
              <td width="14">&nbsp;</td>
              <td width="165">
                <font face="Verdana" size="1">Tanggal Pembuatan LPB</font>
              </td>
              <td width="11">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="212">
                <font face="Verdana" size="1"><span id="tglinput"></span></font>
              </td>
            </tr>
            <tr>
              <td width="133">
                <font face="Verdana" size="1">Alokasi</font>
              </td>
              <td width="10">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="171">&nbsp;</td>
              <td width="14">&nbsp;</td>
              <td width="165">
                <font face="Verdana" size="1">No.Perkiraan</font>
              </td>
              <td width="11">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="212">&nbsp;</td>
            </tr>
            <tr>
              <td width="133" valign="top">
                <font face="Verdana" size="1">Departemen/Divisi</font>
              </td>
              <td width="10" valign="top">
                <font face="Verdana" size="1">:</font>
              </td>
              <td width="171" valign="top">
                <font face="Verdana" size="1"><span id="depart"></span></font>
              </td>
              <td width="14" valign="top"></td>
              <td width="165" valign="top">&nbsp;</td>
              <td width="11" valign="top">&nbsp;</td>
              <td width="212" valign="top">

                &nbsp;<img src='image.png' width="45" height="41"></td>
            </tr>


            <tr>
              <td width="716" colspan="7" height="177" valign="top" style="font-family: Verdana; font-size: 8pt">
                <table border="1" width="100%" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
                      <font face="Verdana" size="1">NO</font>
                    </td>
                    <td align="center" width="116">
                      <font face="Verdana" size="1">KODE BRG</font>
                    </td>
                    <td align="center">
                      <font face="Verdana" size="1">Nama Barang</font>
                    </td>
                    <td align="center">
                      <font face="Verdana" size="1">QTY</font>
                    </td>
                    <td align="center" width="76">
                      <font face="Verdana" size="1">SATUAN</font>
                    </td>
                    <td align="center">
                      <font face="Verdana" size="1">Keterangan</font>
                    </td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td><span id="kodebar"></span></td>
                    <td><span id="nabar"></span></td>
                    <td><span id="qty_po"></span></td>
                    <td><span id="sat"></span></td>
                    <td><span id="merek"></span></td>
                  </tr>

                  <?php
                  $lpbtxt = 'HO-LPB/JKT/01/2021/6200002';
                  //$this->db->where('po' , $this->uri->segment(2));
                  //$queryDetailTableLPB = $this->db->get('lpb');
                  $queryDetailTableLPB = $this->db->get_where('lpb', ['lpbtxt' => $uri])->result_array();
                  //$queryDetailTableLPB = "SELECT * FROM lpb where po = $po ORDER BY nabar ASC";
                  //$result = $this->db->query($queryDetailTableLPB)->result_array();

                  $no = 0;

                  foreach ($item_po->result_array() as $row) {
                    # code...

                    $no = $no + 1;

                    echo "<tr>";
                    echo "<td>" . $no . "</td>";
                    echo "<td>" . $row['kodebar'] . "</td>";
                    echo "<td>" . $row['nabar'] . "</td>";
                    echo "<td>" . $row['qty_lpb'] . "</td>";
                    echo "<td>" . $row['sat'] . "</td>";
                    echo "<td>" . $row['merek'] . "</td>";
                    echo "</tr>";
                  }
                  ?>
                </table>
                <p>&nbsp;</p>
                <table border="0" width="100%" cellspacing="0" cellpadding="0" height="112">
                  <tr>
                    <td align="center" height="17" width="26%">
                      <font face="Verdana" size="1">Dibuat Oleh,</font>
                    </td>
                    <td align="center" height="17" width="22%">
                      <font face="Verdana" size="1">Diperiksa,</font>
                    </td>
                    <td align="center" height="17" width="24%">
                      <font face="Verdana" size="1">Menyetujui,</font>
                    </td>
                    <td align="center" height="17" width="28%">
                      <font face="Verdana" size="1">Penerima,</font>
                    </td>
                  </tr>
                  <tr>
                    <td valign="bottom" height="80" align="center" width="26%">
                      <p style="margin-top: 0; margin-bottom: 0"><u>
                          <font size="1" face="Verdana">(_____________________)</font>
                        </u></p>
                      <p style="margin-top: 0; margin-bottom: 0">
                        <font size="1" face="Verdana">Admin Purchasing</font>
                    </td>
                    <td valign="bottom" height="80" align="center" width="22%">
                      <p style="margin-top: 0; margin-bottom: 0"><u>
                          <font face="Verdana" size="1">(_____________________)</font>
                        </u></p>
                      <p style="margin-top: 0; margin-bottom: 0">
                        <font face="Verdana" size="1">Supervisi Purchasing</font>
                    </td>
                    <td valign="bottom" height="80" align="center" width="24%">
                      <p style="margin-top: 0; margin-bottom: 0"><u>
                          <font face="Verdana" size="1">(_____________________)</font>
                        </u></p>
                      <p style="margin-top: 0; margin-bottom: 0">
                        <font face="Verdana" size="1">Dept Head</font>
                    </td>
                    <td valign="bottom" height="80" align="center" width="28%">
                      <p style="margin-top: 0; margin-bottom: 0">
                        <font face="Verdana" size="1">(_____________________)</font>
                      </p>
                      <p style="margin-top: 0; margin-bottom: 0">
                        <font face="Verdana" size="1">Petugas Penerima</font>
                    </td>
                  </tr>
                  <tr>
                    <td valign="bottom" colspan="4">
                      <p align="left"><i>
                          <font size="1">By MMOP Online - <?php echo date("Y-m-d H:i:s"); ?></font>
                        </i>
                    </td>
                  </tr>
                </table>
              </td>

            </tr>
          </table>
        </div>

      </div>


    </div>
  </div>

  <script>
    $(document).ready(function() {
      $(document).on('click', '#set_dtl', function() {

        var lpbtxt = $(this).data('lpbtxt');
        var suplier = $(this).data('suplier');
        var depart = $(this).data('depart');
        var potxt = $(this).data('potxt');
        var sj = $(this).data('sj');
        var tgl = $(this).data('tgl');
        var tglinput = $(this).data('tglinput');

        var kodebar = $(this).data('kodebar');
        var nabar = $(this).data('nabar');
        var qty_po = $(this).data('qty_po');
        var sat = $(this).data('sat');
        var merek = $(this).data('merek');


        $('#lpbtxt').text(lpbtxt);
        $('#suplier').text(suplier);
        $('#depart').text(depart);
        $('#potxt').text(potxt);
        $('#sj').text(sj);
        $('#tgl').text(tgl);
        $('#tglinput').text(tglinput);
        $('#kodebar').text(kodebar);
        $('#nabar').text(nabar);
        $('#qty_po').text(qty_po);
        $('#sat').text(sat);
        $('#merek').text(merek);



      })
    })
  </script>
</body>

</html>