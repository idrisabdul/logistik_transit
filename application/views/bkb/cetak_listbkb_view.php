<!-- <!DOCTYPE html>
<html>

<head>
    <title>Cetak BKB</title>
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
        <h1>Bukti Keluar Barang</h1>
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
                        <font face="Verdana" size="1">Kode Barang</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">Nama Barang</font>
                    </th>
                    <th align="center">
                        <font face="Verdana" size="1">QTY BKB</font>
                    </th>
                    <th align="center" width="76">
                        <font face="Verdana" size="1">Satuan</font>
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

</html> -->

<style>
    table {
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,

    th {
        background-color: #4CAF50;
        color: white;
    }
</style>

<h1>Bukti Keluar Barang</h1>
<br>

<table style="width:100%; border: 1px;">
    <tr>
        <th>
            NO
        </th>
        <th>
            No PO
        </th>
        <th>
            Nama Barang
        </th>
        <th>
            QTY BKB
        </th>
        <th>
            Satuan
        </th>
        <th>
            No BKB
        </th>
    </tr>

    <?php $no = 1; ?>
    <?php foreach ($tabel_bkb->result_array() as $bkb) : ?>
        <tr>
            <td>
                <?php echo $no; ?>
            </td>
            <td>
                <?php echo $bkb['nopotxt']; ?>
            </td>
            <td>
                <?php echo $bkb['nabar']; ?>
            </td>
            <td>
                <?php echo $bkb['qty_bkb']; ?>
            </td>
            <td>
                <?php echo $bkb['sat']; ?>
            </td>
            <td>
                <?php echo $bkb['nobkbtxt']; ?>
            </td>
        </tr>
        <?php $no++; ?>
    <?php endforeach; ?>
</table>