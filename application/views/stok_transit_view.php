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
                            <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Home</a></div>
                            <div class="breadcrumb-item">Stok Transit</div>
                        </div>
                    </div>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Stok Barang</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>QTY PO</th>
                                                        <th>QTY LPB</th>
                                                        <th>QTY BKB</th>
                                                        <th>Sisa Stok</th>
                                                        <th>Rincian</th>
                                                        <th>Tanggal Input Barang</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    $no = 0;
                                                    foreach ($stok_gudang->result_array() as $row) {
                                                        $no++;

                                                        $kodebar = $row['kodebar'];

                                                        $query = "SELECT SUM(qty_lpb) as qtylpb,SUM(qty_po) as qtypo from lpb where kodebar='$kodebar'";
                                                        $qry = $this->db->query($query)->result_array();

                                                        foreach ($qry as $data) {
                                                            $qtylpb = $data['qtylpb'];
                                                            $qtypo = $data['qtypo'];
                                                        }

                                                        $qrybkb = "SELECT SUM(qty_bkb) as qtybkb  FROM bkb where kodebar='$kodebar'";

                                                        $result2 = $this->db->query($qrybkb)->result_array();
                                                        foreach ($result2 as $row2) {
                                                            $qtybkb = $row2['qtybkb'];
                                                        }
                                                        $saldo = $qtylpb - $qtybkb;
                                                        if ($saldo > 0) {

                                                            echo "<tr>";
                                                            echo "<td>" . $no . "</td>";
                                                            echo "<td>" . $row['kodebar'] . "</td>";
                                                            echo "<td>" . $row['nabar'] . "</td>";
                                                            echo "<td>" . $qtypo . "</td>";
                                                            echo "<td>" . $qtylpb . "</td>";
                                                            echo "<td>" . $qtybkb . "</td>";
                                                            echo "<td>" . $saldo . "</td>";
                                                            echo "<td>" . "-" . "</td>";
                                                            echo "<td>" . $row['tglinput'] . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                    ?>

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

</body>

</html>