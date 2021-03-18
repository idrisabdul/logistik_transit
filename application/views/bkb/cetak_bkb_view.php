<body topmargin="0">
    <script language="javascript">
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <?php foreach ($cetakbkb as $row) : ?>
        <div align="left">
            <p align="left"><input type="button" onclick="printDiv('printableArea')" value="Cetak" /></p>
            <div align="center" id="printableArea">
                <style>
                    h3 {
                        text-align: center;
                    }

                    table {
                        font-family: Arial, sans-serif;
                        font-size: 12px;
                    }
                </style>

                <table border="0" width="939" height="364">
                    <tr>
                        <td width="589" colspan="7"><b>
                                <font face="Verdana" size="2">HEAD
                                    OFFICE - PT MULIA SAWIT AGRO LESTARI </font>
                            </b></td>
                        <td width="341" rowspan="2"> &nbsp;</td>
                    </tr>
                    <tr>
                        <td width="589" colspan="7">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="933" colspan="8" height="21">
                            <p align="center"><u><b>
                                        <font face="Verdana" size="3">BUKTI KELUAR BARANG (BKB) RO</font>
                                    </b></u>
                        </td>
                    </tr>
                    <tr>
                        <td width="933" colspan="8" align="center"><?php echo $row['nobkbtxt']; ?></td>
                    </tr>
                    <tr>
                        <td width="124" height="19">&nbsp;</td>
                        <td width="15" height="19">&nbsp;</td>
                        <td width="202" height="19" colspan="2">&nbsp;</td>
                        <td width="9" height="19">&nbsp;</td>
                        <td width="204" height="19">&nbsp;</td>
                        <td width="15" height="19">&nbsp;</td>
                        <td width="341" height="19">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="124" height="19">
                            <font face="Verdana" size="1">Nama Pengirim</font>
                        </td>
                        <td width="15" height="19">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="137" height="19">
                            <font face="Verdana" size="1"><?php echo $row['pengirim']; ?></font>
                        </td>
                        <td width="61" rowspan="3"> <img width="50" src='<?= base_url('assets/images/bkb_qrcode/' . substr($row['nobkbtxt'], -7) . '.png'); ?>'></td>
                        <td width="9" height="19">&nbsp;</td>
                        <td width="204" height="19">
                            <font face="Verdana" size="1">No.Purchase
                                Order</font>
                        </td>
                        <td width="15" height="19">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="341" height="19">
                            <font face="Verdana" size="1"><?php echo $row['nopotxt']; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td width="124">
                            <font face="Verdana" size="1">No.Pol</font>
                        </td>
                        <td width="15">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="137">
                            <font face="Verdana" size="1"><?php echo $row['nopol']; ?></font>
                        </td>
                        <td width="9">&nbsp;</td>
                        <td width="204">
                            <font face="Verdana" size="1">Tanggal BKB</font>
                        </td>
                        <td width="15">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="341">
                            <font face="Verdana" size="1"><?php echo $row['tgl']; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td width="124">
                            <font face="Verdana" size="1">Tujuan</font>
                        </td>
                        <td width="15">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="137"><?php echo $row['tujuan']; ?></td>
                        <td width="9">&nbsp;</td>
                        <td width="204">
                            <font face="Verdana" size="1">Tanggal Pembuatan BKB</font>
                        </td>
                        <td width="15">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="341">
                            <font face="Verdana" size="1"><?php echo $row['tglinput']; ?></font>
                        </td>
                    </tr>
                    <tr>
                        <td width="124">
                            <font face="Verdana" size="1">Departemen/Divisi</font>
                        </td>
                        <td width="15">
                            <font face="Verdana" size="1">:</font>
                        </td>
                        <td width="202" colspan="2"><?php echo $row['depart']; ?></td>
                        <td width="9">&nbsp;</td>
                        <td width="568" colspan="3" rowspan="2"> &nbsp;</td>
                        </td>
                    </tr>
                    <tr>
                        <td width="124">&nbsp;</td>
                        <td width="15">&nbsp;</td>
                        <td width="202" colspan="2">&nbsp;</td>
                        <td width="9">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="933" colspan="8" height="173" valign="top">
                            <div align=" left">
                                <table width="794" border="1" cellspacing="0" cellpadding="0">
                                    <tr>
                                        <td align="center">
                                            <font face="Verdana" size="1">NO</font>
                                        </td>
                                        <td align="center" width="131">
                                            <font face="Verdana" size="1">KODE BRG</font>
                                        </td>
                                        <td align="center" width="197">
                                            <font face="Verdana" size="1">Nama Barang</font>
                                        </td>
                                        <td align="center" width="77">
                                            <font face="Verdana" size="1">QTY LPB</font>
                                        </td>
                                        <td align="center" width="59">
                                            <font face="Verdana" size="1">QTY BKB</font>
                                        </td>
                                        <td align="center" width="81">
                                            <font face="Verdana" size="1">SATUAN</font>
                                        </td>
                                        <td align="center">
                                            <font face="Verdana" size="1">Keterangan</font>
                                        </td>
                                    </tr>

                                    <?php

                                    $no = 0;
                                    foreach ($item_bkb as $row) :
                                        $no = $no + 1;

                                        echo "<tr>";
                                        echo "<td>" . $no . "</td>";
                                        echo "<td>" . $row['kodebar'] . "</td>";
                                        echo "<td>" . $row['nabar'] . "</td>";
                                        echo "<td>" . $row['qty_lpb'] . "</td>";
                                        echo "<td>" . $row['qty_bkb'] . "</td>";

                                        echo "<td>" . $row['sat'] . "</td>";
                                        echo "<td>" . $row['ket'] . "</td>";
                                        echo "</tr>";
                                    endforeach;
                                    ?>

                                </table>
                            </div>
                            <table border="0" cellspacing="0" cellpadding="0" height="112" width="925">
                                <tr>
                                    <td align="center" height="17" width="151"></td>
                                    <td align="center" height="17" width="118"></td>
                                    <td align="center" height="17" width="117"></td>
                                    <td align="center" height="17" width="144"></td>
                                    <td align="center" height="17" width="163"></td>
                                    <td align="center" height="17" width="115"></td>
                                    <td align="center" height="17" width="117"></td>
                                </tr>
                                <tr>
                                    <td align="center" height="17" width="151">
                                        <p>
                                            <font size="1">Dibuat Oleh,</font>
                                    </td>
                                    <td align="center" height="17" width="118">
                                        <font size="1">Dikeluarkan,</font>
                                    </td>
                                    <td align="center" height="17" width="117">
                                        <font face="Verdana" size="1">Diperiksa,</font>
                                    </td>
                                    <td align="center" height="17" width="144">
                                        <font size="1">Mengetahui</font>
                                        <font face="Verdana" size="1">,</font>
                                    </td>
                                    <td align="center" height="17" width="163">
                                        <font face="Verdana" size="1">Menyetujui,</font>
                                    </td>
                                    <td align="center" height="17" width="115">
                                        <font face="Verdana" size="1">Pengirim,</font>
                                    </td>
                                    <td align="center" height="17" width="117">
                                        <font face="Verdana" size="1">Penerima,</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="bottom" height="80" align="center" width="151">
                                        <p>
                                            <font face="Verdana" size="1">&nbsp; <u>(_____________)</u>&nbsp;&nbsp;</font>
                                    </td>
                                    <td valign="bottom" height="80" align="center" width="118">
                                        <p>
                                            <font face="Verdana" size="1">(_____________)</font>
                                    </td>
                                    <td valign="bottom" height="80" align="center">
                                        <p>
                                            <font face="Verdana" size="1">(_____________)</font>
                                    </td>
                                    <td valign="bottom" height="80" align="center">
                                        <font size="1">&nbsp;<u>(_____________)</u>&nbsp; </font>
                                    </td>
                                    <td valign="bottom" height="80" align="center">
                                        <p>
                                            <font size="1"> <u>(_____________)</u></font>
                                            <font face="Verdana" size="1"> </font>
                                    </td>
                                    <td valign="bottom" height="80" align="center">
                                        <p>
                                            <font face="Verdana" size="1">(______________)</font>
                                    </td>
                                    <td valign="bottom" height="80" align="center">
                                        <p>
                                            <font face="Verdana" size="1">(_____________)</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="bottom" align="center" width="151">
                                        <font size="1">Admin Purchasing</font>
                                    </td>
                                    <td valign="bottom" align="center" width="118">
                                        <font size="1">Petugas Gudang</font>
                                    </td>
                                    <td valign="bottom" width="117" align="center">
                                        <font size="1">Security</font>
                                    </td>
                                    <td valign="bottom" width="144" align="center">
                                        <font size="1">SPV Purchasing</font>
                                    </td>
                                    <td valign="bottom" width="163" align="center">
                                        <font size="1">Dept Head</font>
                                    </td>
                                    <td valign="bottom" width="115" align="center">
                                        <font size="1">Transporter</font>
                                    </td>
                                    <td valign="bottom" width="117" align="center">
                                        <font size="1">Petugas Gudang Tujuan</font>
                                    </td>
                                </tr>
                                <tr>
                                    <td valign="bottom" colspan="7">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign="bottom" colspan="7">
                                        <p align="left"><i>
                                                <font size="1">By MMOP Online - <?php echo date("Y-m-d H:i:s"); ?></font>
                                            </i>
                                    </td>
                                </tr>
                            </table>
            </div>
            </td>
            </tr>
            </table>
        </div>

        </div>
    <?php endforeach; ?>

</body>