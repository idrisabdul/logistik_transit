<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Logistik Transit HO
    </div>
</footer>
<script type="text/javascript" src="<?= base_url('') ?>vendor/qrcode/minified/html5-qrcode.min.js"></script>

<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url() ?>/assets/js/stisla.js"></script>

<!-- JS Libraies -->
<!-- JS Libraies -->
<script src="<?= base_url() ?>/assets/modules/dist/js/iziToast.min.js"></script>
<!-- Page Specific JS File -->
<script src="<?= base_url() ?>/assets/js/page/modules-toastr.js"></script>

<!-- Template JS File -->
<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
<script src="<?= base_url() ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->

<!-- Datatables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"></script>

<!-- QRCODE MAS ALI -->
<script src="<?php echo base_url() ?>assets/qrcode/dist/js/qrcode-reader.min.js?v=20190604"></script>