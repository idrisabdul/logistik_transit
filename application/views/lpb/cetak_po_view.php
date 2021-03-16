<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title><?php echo $title ?></title>


<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->

<!-- Template CSS -->
<link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css ">
<link rel="stylesheet" href="<?= base_url() ?>/assets/css/components.css">

<!-- Datatables -->
<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet">

<script language="javascript">
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<?php foreach ($po->result_array() as $po) : ?>
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
                <td width="716" colspan="7">
                    <p align="center"><u><b>
                                <font size="3" face="Verdana">Laporan Penerimaan Barang (LPB)</font>
                            </b></u>
                </td>
            </tr>
            <tr>
                <td width="716" colspan="7" align="center"><?= $po['lpbtxt']; ?></span></td>
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
                    <font face="Verdana" size="1"><?= $po['suplier'] ?></font>
                </td>
                <td width="14" height="19">&nbsp;</td>
                <td width="165" height="19">
                    <font face="Verdana" size="1">No.Pesanan Pembeliaan</font>
                </td>
                <td width="11" height="19">
                    <font face="Verdana" size="1">:</font>
                </td>
                <td width="212" height="19">
                    <font face="Verdana" size="1"><?= $po['potxt'] ?></span></font>
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
                    <font face="Verdana" size="1"><?= $po['sj']; ?></span></font>
                </td>
                <td width="14">&nbsp;</td>
                <td width="165">
                    <font face="Verdana" size="1">Tanggal Penerimaan</font>
                </td>
                <td width="11">
                    <font face="Verdana" size="1">:</font>
                </td>
                <td width="212">
                    <font face="Verdana" size="1"><?= $po['tgl']; ?></span></font>
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
                    <font face="Verdana" size="1"><?= $po['tglinput']; ?></span></font>
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
                    <font face="Verdana" size="1"><?= $po['depart']; ?></span></font>
                </td>
                <td width="14" valign="top"></td>
                <td width="165" valign="top">&nbsp;</td>
                <td width="11" valign="top">&nbsp;</td>
                <td width="212" valign="top">

                    <?php

                    // $qrCode = new Endroid\Qrcode\QrCode('Life is too short to be generating QR codes');

                    // header('Content-Type: ' . $qrCode->getContentType());
                    // echo $qrCode->writeString();
                    // 
                    ?>
                    &nbsp;<img src="<?= base_url('/assets/images/' . substr($po['lpbtxt'], -7) . '.png') ?>" width="40%"></td>
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
                        <?php
                        $no = 0;
                        foreach ($item_po as $row) :
                            $no++; ?>

                            <tr>
                                <td>
                                    <font face="Verdana" size="1"><?= $no ?></font>
                                </td>
                                <td>
                                    <font face="Verdana" size="1"><?= $row['kodebar'] ?>
                                </td>
                                <td>
                                    <font face="Verdana" size="1"><?= $row['nabar'] ?></font>
                                </td>
                                <td>
                                    <font face="Verdana" size="1"><?= $row['qty_lpb'] ?></font>
                                </td>
                                <td>
                                    <font face="Verdana" size="1"><?= $row['sat'] ?></font>
                                </td>
                                <td>
                                    <font face="Verdana" size="1"><?= $row['merek'] ?></font>
                                </td>
                            </tr>

                        <?php endforeach; ?>
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

<?php endforeach; ?>



<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->

<!-- Datatables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>


<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>