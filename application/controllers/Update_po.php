<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Update_po extends CI_Controller
{

    public function __construct()
    {
        // menjalankan method ketika class Auth dijalankan
        parent::__construct();
    }

    public function index()
    {
        $this->db->empty_table('po');
        $this->db->empty_table('item_po');

        // PT MAPA
        $query_po_mapa = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikmapa.po";
        $this->db->query($query_po_mapa);
        $query_itempo_mapa = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikmapa.item_po";
        $this->db->query($query_itempo_mapa);

        // PT MSAL
        $query_po_msal = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT id, kd_dept, ket_dept, grup, kode_budget, kd_subbudget, ket_subbudget, kode_supply, nama_supply, kode_pemesan, pemesan, nopo, nopotxt, noppo, noppotxt, no_refppo, tgl_refppo, tgl_reftxt, tglpo, tglpotxt, tglppo, tglpotxt, bayar, tempo_bayar, lokasikirim, tempo_kirim, lokasi_beli, ket, kodept, namapt, no_acc, ket_acc, periode, periodetxt, thn, tglisi, user, ppn, totalbayar, ket_kirim, lokasi, noreftxt, uangmuka, voucher, terbayar, nopp, batal, kirim FROM msalgrou_logistikmsal.po";
        $this->db->query($query_po_msal);
        $query_itempo_msal = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikmsal.item_po";
        $this->db->query($query_itempo_msal);

        // PT PEAK
        $query_po_peak = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikpeak.po";
        $this->db->query($query_po_peak);
        $query_itempo_peak = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikpeak.item_po";
        $this->db->query($query_itempo_peak);

        // PT PSAM
        $query_po_psam = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT id, kd_dept, ket_dept, grup, kode_budget, kd_subbudget, ket_subbudget, kode_supply, nama_supply, kode_pemesan, pemesan, nopo, nopotxt, noppo, noppotxt, no_refppo, tgl_refppo, tgl_reftxt, tglpo, tglpotxt, tglppo, tglpotxt, bayar, tempo_bayar, lokasikirim, tempo_kirim, lokasi_beli, ket, kodept, namapt, no_acc, ket_acc, periode, periodetxt, thn, tglisi, user, ppn, totalbayar, ket_kirim, lokasi, noreftxt, uangmuka, voucher, terbayar, nopp, batal, kirim FROM msalgrou_logistikpsam.po";
        $this->db->query($query_po_psam);
        $query_itempo_psam = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikpsam.item_po";
        $this->db->query($query_itempo_psam);

        // PT KPP
        $query_po_kpp = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT id, kd_dept, ket_dept, grup, kode_budget, kd_subbudget, ket_subbudget, kode_supply, nama_supply, kode_pemesan, pemesan, nopo, nopotxt, noppo, noppotxt, no_refppo, tgl_refppo, tgl_reftxt, tglpo, tglpotxt, tglppo, tglpotxt, bayar, tempo_bayar, lokasikirim, tempo_kirim, lokasi_beli, ket, kodept, namapt, no_acc, ket_acc, periode, periodetxt, thn, tglisi, user, ppn, totalbayar, ket_kirim, lokasi, noreftxt, uangmuka, voucher, terbayar, nopp, batal, kirim FROM msalgrou_logistikkpp.po";
        $this->db->query($query_po_kpp);
        $query_itempo_kpp = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikkpp.item_po";
        $this->db->query($query_itempo_kpp);

        echo "PO BERHASIL DI UPDATE! <br>";
        echo "<a class='btn btn-danger' href='Home'>BACK TO HOME</a>";
    }
}

/* End of file Controllername.php */
