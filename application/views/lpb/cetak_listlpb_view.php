<!DOCTYPE html>
<html>

<head>
    <title>Cetak LPB</title>
</head>

<body>
    <div id="outtable">
        <h1>Laporan Penerimaan Barang</h1>
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
                        <font face="Verdana" size="1">QTY LPB</font>
                    </th>
                    <th align="center" width="76">
                        <font face="Verdana" size="1">SATUAN</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">No LPB</font>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tabel_lpb->result_array() as $lpb) : ?>
                    <tr>
                        <td>
                            <font face="Verdana" size="1"><?php echo $no; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['potxt']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['kodebar']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['nabar']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['qty_lpb']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['sat']; ?></font>
                        </td>
                        <td>
                            <font face="Verdana" size="1"><?php echo $lpb['lpbtxt']; ?></font>
                        </td>
                    </tr>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>