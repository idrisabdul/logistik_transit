<style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }

  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    font: 14px arial;
  }
</style>

<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand mb-2">
      <img src="<?= base_url() ?>/assets/img/logo.jpg" width="50" alt="">
      <h6 style="color:royalblue;">Logistik Transit HO</h6>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="menu.htm">MSAL</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li><a class="nav-link" href="<?= base_url('home'); ?>"><i class="fas fa-home"></i> <span>Home</span></a></li>
      <li class="menu-header">Starter</li>
      <li><a class="nav-link" href="<?= base_url('tabel_lpb') ?>"><i class="far fa-plus-square"></i> <span>Terima Barang</span></a></li>
      <li><a class="nav-link" href="<?= base_url('tabel_bkb') ?>"><i class="fas fa-share-square"></i> <span>Keluar Barang</span></a></li>
      <li><a class="nav-link" href="<?= base_url('stok_transit') ?>"><i class="fas fa-cubes"></i> <span>Stok Transit</span></a></li>
      <li class="nav-item dropdown active">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Utility</span></a>
        <ul class="dropdown-menu">
          <li><a class="nav-link" href="#">Password</a></li>
          <li><a class="nav-link" onclick="updatePo('Update_po')" href="#">Update PO</a></li>
          <li><a class="nav-link" href="#">Transfer SPP</a></li>
        </ul>
      </li>
    </ul>
</div>
</aside>
</div>

<div class="modal fade" id="updatePoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Update PO akan membutuhkan waktu beberapa saat</div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-updatePo" class="btn btn-danger" href="#">OK</a>
      </div>
    </div>
  </div>
</div>

<div class="preloader">
  <div class="loading">
    <img src="<?= base_url() ?>assets/img/loadpo.gif" width="80">
    <p>Harap Tunggu</p>
  </div>
</div>

<script src="<?= base_url() ?>/assets/js/scripts.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

<script>
  function updatePo(url) {
    $('#btn-updatePo').attr('href', url);
    $('#updatePoModal').modal();
  }
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('.preloader').fadeOut();
  });
</script>