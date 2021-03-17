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
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Home</h1>
                    </div>


                    <div class="section-body">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="owl-carousel owl-theme" id="products-carousel">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                    <div class="card card-statistic-1">
                                                        <div class="card-icon bg-success">
                                                            <i class="fas fa-box"></i>
                                                        </div>
                                                        <div class="card-wrap">
                                                            <div class="card-header">
                                                                <h4>Total LPB</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <?= strval($jumlahlpb); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                    <div class="card card-statistic-1">
                                                        <div class="card-icon bg-danger">
                                                            <i class="fas fa-truck"></i>
                                                        </div>
                                                        <div class="card-wrap">
                                                            <div class="card-header">
                                                                <h4>Total BKB</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <?= $jumlahbkb; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                    <div class="card card-statistic-1">
                                                        <div class="card-icon bg-warning">
                                                            <i class="far fa-credit-card"></i>
                                                        </div>
                                                        <div class="card-wrap">
                                                            <div class="card-header">
                                                                <h4>Daftar PO</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <?= $jumlahpo; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                                                    <div class="card card-statistic-1">
                                                        <div class="card-icon bg-primary">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                        <div class="card-wrap">
                                                            <div class="card-header">
                                                                <h4>Users</h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <?= $this->session->userdata('nama'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <h2 class="section-title my-3 col-md-6">Stok Transit</h2>
                                            <div class="col-md-4"></div>
                                            <a href="<?= base_url('stok_transit'); ?>">Lihat Detail<i class="fas fa-chevron-right my-3"></i></a>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-sm" id="example">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Barang</th>
                                                        <th>Nama Barang</th>
                                                        <th>QTY PO</th>
                                                        <th>QTY LPB</th>
                                                        <th>QTY BKB</th>
                                                        <th>Sisa Stok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php


                                                    $no = 0;
                                                    foreach ($stok_gudang->result_array() as $row) {
                                                        $no = $no + 1;

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
                            <div class="col col-md col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="section-title my-3">Menu Cepat</h2>

                                        <div class="row mt-1">
                                            <div class="col-md">
                                                <a href="<?= base_url('tabel_lpb/add_new') ?>">
                                                    <div class="card card-hero">
                                                        <div class="card-header">
                                                            <div class="card-icon">
                                                                <i class="far fa-edit"></i>
                                                            </div>
                                                            <h5>Input LPB</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md">
                                                <a href="<?= base_url('tabel_bkb/tabel_lpb_distinct') ?>">
                                                    <div class="card bg-danger card-hero">
                                                        <div class="card-header">
                                                            <div class="card-icon">
                                                                <i class="fas fa-truck"></i>
                                                            </div>
                                                            <h5>Input BKB</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- Footer -->
            <?php $this->load->view('_partials/footer.php'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#example').DataTable({
                        "lengthMenu": [
                            [5],
                            [5]
                        ]
                    });
                });
            </script>
        </div>
    </div>

</body>

</html>