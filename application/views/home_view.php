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
                                    <div class="card-header">
                                        <h4><?= $title ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-info" role="alert">Selamat datang di Aplikasi Logistik Transit HO</div>
                                        <div style="height: 300px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</body>

</html>