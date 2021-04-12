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
          <li><a class="nav-link" href="#">Update PO</a></li>
          <li><a class="nav-link" href="#">Transfer SPP</a></li>
        </ul>
      </li>
    </ul>
</div>
</aside>
</div>