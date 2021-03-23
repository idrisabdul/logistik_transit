<!DOCTYPE html>
<html>

<head>
    <title>Cetak LPB</title>
    <style>
        .table1 {
            font-family: sans-serif;
            color: #444;
            border-collapse: collapse;
            width: 50%;
            border: 1px solid #f2f5f7;
        }

        .table1 tr th {
            background: #35A9DB;
            color: #fff;
            font-weight: normal;
        }

        .table1,
        th,
        td {
            padding: 8px 5px;
            text-align: center;
        }

        .table1 tr:hover {
            background-color: #f5f5f5;
        }

        .table1 tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div id="outtable">
        <h1>Laporan Penerimaan Barang</h1>
        <table class="table1">
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
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $no; ?></font>
                        </td>
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $lpb['potxt']; ?></font>
                        </td>
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $lpb['kodebar']; ?></font>
                        </td>
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $lpb['nabar']; ?></font>
                        </td>
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $lpb['qty_lpb']; ?></font>
                        </td>
                        <td align="center">
                            <font face="Verdana" size="1"><?php echo $lpb['sat']; ?></font>
                        </td>
                        <td align="center">
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