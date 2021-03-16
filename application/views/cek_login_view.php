<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('_partials/header'); ?>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>/assets/img/logo.jpg" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <?= $this->session->flashdata('message'); ?>
                            <div class="card-body">
                                <form method="post" action="<?= base_url('login/login') ?>" class="needs-validation" novalidate="">
                                    <div class="form-group" class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group" class="d-block">
                                        <label for="password" class="control-label">Periode</label>
                                        <input id="periode" type="date" class="form-control" name="periode" tabindex="2" value="<?= date("Y-m-d"); ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <button class=" btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
        </section>
    </div>

</body>

</html>