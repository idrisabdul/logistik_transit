<!DOCTYPE html>
<html>

<head>
    <title>Cetak BKB</title>
</head>

<body>
    <div id="outtable">
        <h1>Bukti Keluar Barang</h1>
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th align="center">
                        <font face="Verdana" size="1">NO</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">No PO</font>
                    </th>
                    <th align="center" width="116">
                        <font face="Verdana" size="1">KODE BRG</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">Nama Barang</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">QTY BKB</font>
                    </th>
                    <th align="center" width="76">
                        <font face="Verdana" size="1">SATUAN</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">No BKB</font>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tabel_bkb->result_array() as $bkb) : ?>
                    <tr>
                        <td>
                            <font face="Verdana" size="1"><?php echo $no; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['nopotxt']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['kodebar']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['nabar']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['qty_bkb']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['sat']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $bkb['nobkbtxt']; ?></font>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>