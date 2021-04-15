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
        $query_po_msal = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikmsal.po";
        $this->db->query($query_po_msal);
        $query_itempo_msal = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikmsal.item_po";
        $this->db->query($query_itempo_msal);

        // PT PEAK
        $query_po_peak = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikpeak.po";
        $this->db->query($query_po_peak);
        $query_itempo_peak = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikpeak.item_po";
        $this->db->query($query_itempo_peak);

        // PT PSAM
        $query_po_psam = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikpsam.po";
        $this->db->query($query_po_psam);
        $query_itempo_psam = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikpsam.item_po";
        $this->db->query($query_itempo_psam);

        // PT KPP
        $query_po_kpp = "INSERT INTO msalgrou_logistiktransit_ho.po SELECT * FROM msalgrou_logistikkpp.po";
        $this->db->query($query_po_kpp);
        $query_itempo_kpp = "INSERT INTO msalgrou_logistiktransit_ho.item_po SELECT * FROM msalgrou_logistikkpp.item_po";
        $this->db->query($query_itempo_kpp);

        // //query get po
        // $data_po_mapa = $db_logistik_mapa->get('po')->result_array();
        // $data_itempo_mapa = $db_logistik_mapa->get('item_po')->result_array();

        // //loping data po untuk insert po
        // foreach ($data_po_mapa as $d) :

        //     $query_id_po_mapa = "SELECT MAX(id)+1 as no_id FROM po";
        //     $generate_id_po_mapa = $this->db->query($query_id_po_mapa)->row();
        //     $no_id_po_mapa = $generate_id_po_mapa->no_id;
        //     if (empty($no_id_po_mapa)) {
        //         $no_id_po_mapa = 1;
        //     }

        //     $data_array_po_mapa = [
        //         'id' => $no_id_po_mapa,
        //         'kd_dept' => $d['kd_dept'],
        //         'ket_dept' => $d['ket_dept'],
        //         'grup' => $d['grup'],
        //         'kode_budet' => $d['kode_budet'],
        //         'kd_subbudget' => $d['kd_subbudget'],
        //         'ket_subbudget' => $d['ket_subbudget'],
        //         'kode_supply' => $d['kode_supply'],
        //         'nama_supply' => $d['nama_supply'],
        //         'kode_pemesan' => $d['kode_pemesan'],
        //         'pemesan' => $d['pemesan'],
        //         'nopo' => $d['nopo'],
        //         'nopotxt' => $d['nopotxt'],
        //         'noppo' => $d['noppo'],
        //         'noppotxt' => $d['noppotxt'],
        //         'no_refppo' => $d['no_refppo'],
        //         'tgl_refppo' => $d['tgl_refppo'],
        //         'tgl_reftxt' => $d['tgl_reftxt'],
        //         'tglpo' => $d['tglpo'],
        //         'tglpotxt' => $d['tglpotxt'],
        //         'tglppo' => $d['tglppo'],
        //         'tglppotxt' => $d['tglppotxt'],
        //         'bayar' => $d['bayar'],
        //         'tempo_bayar' => $d['tempo_bayar'],
        //         'lokasikirim' => $d['lokasikirim'],
        //         'tempo_kirim' => $d['tempo_kirim'],
        //         'lokasi_beli' => $d['lokasi_beli'],
        //         'ket' => $d['ket'],
        //         'kodept' => $d['kodept'],
        //         'namapt' => $d['namapt'],
        //         'no_acc' => $d['no_acc'],
        //         'ket_acc' => $d['ket_acc'],
        //         'periode' => $d['periode'],
        //         'periodetxt' => $d['periodetxt'],
        //         'thn' => $d['thn'],
        //         'tglisi' => $d['tglisi'],
        //         'user' => $d['user'],
        //         'ppn' => $d['ppn'],
        //         'totalbayar' => $d['totalbayar'],
        //         'ket_kirim' => $d['ket_kirim'],
        //         'lokasi' => $d['lokasi'],
        //         'noreftxt' => $d['noreftxt'],
        //         'uangmuka' => $d['uangmuka'],
        //         'voucher' => $d['voucher'],
        //         'terbayar' => $d['terbayar'],
        //         'nopp' => $d['nopp'],
        //         'batal' => $d['batal'],
        //         'kirim' => $d['kirim'],
        //     ];

        //     // var_dump($data_array_po_mapa);
        //     $this->db->insert('po', $data_array_po_mapa);
        // endforeach;

        // //loping data po untuk insert itempo
        // foreach ($data_itempo_mapa as $itempo) :

        //     $query_id_itempo_mapa = "SELECT MAX(id)+1 as no_id FROM item_po";
        //     $generate_id_itempo_mapa = $this->db->query($query_id_itempo_mapa)->row();
        //     $no_id_itempo_mapa = $generate_id_itempo_mapa->no_id;
        //     if (empty($no_id_itempo_mapa)) {
        //         $no_id_itempo_mapa = 1;
        //     }

        //     $data_array_itempo_mapa = [
        //         'id' => $no_id_itempo_mapa,
        //         'nopo' => $itempo['nopo'],
        //         'nopotxt' => $itempo['nopotxt'],
        //         'noppo' => $itempo['noppo'],
        //         'noppotxt' => $itempo['noppotxt'],
        //         'refppo' => $itempo['refppo'],
        //         'tglppo' => $itempo['tglppo'],
        //         'tglppotxt' => $itempo['tglppotxt'],
        //         'tglpo' => $itempo['tglpo'],
        //         'tglpotxt' => $itempo['tglpotxt'],
        //         'kodebar' => $itempo['kodebar'],
        //         'kodebartxt' => $itempo['kodebartxt'],
        //         'nabar' => $itempo['nabar'],
        //         'sat' => $itempo['sat'],
        //         'qty' => $itempo['qty'],
        //         'harga' => $itempo['harga'],
        //         'jumharga' => $itempo['jumharga'],
        //         'kodept' => $itempo['kodept'],
        //         'namapt' => $itempo['namapt'],
        //         'periode' => $itempo['periode'],
        //         'periodetxt' => $itempo['periodetxt'],
        //         'thn' => $itempo['thn'],
        //         'merek' => $itempo['merek'],
        //         'tglisi' => $itempo['tglisi'],
        //         'user' => $itempo['user'],
        //         'ket' => $itempo['ket'],
        //         'noref' => $itempo['noref'],
        //         'lokasi' => $itempo['lokasi'],
        //         'hargasblm' => $itempo['hargasblm'],
        //         'disc' => $itempo['disc'],
        //         'kurs' => $itempo['kurs'],
        //         'kode_budget' => $itempo['kode_budget'],
        //         'grup' => $itempo['grup'],
        //         'main_acct' => $itempo['main_acct'],
        //         'nama_main' => $itempo['nama_main'],
        //         'batal' => $itempo['batal'],
        //         'cek_pp' => $itempo['cek_pp'],
        //         'KODE_BPO' => $itempo['KODE_BPO'],
        //         'JUMLAHBPO' => $itempo['JUMLAHBPO'],
        //         'kode_bebanbpo' => $itempo['kode_bebanbpo'],
        //         'nama_bebanbpo' => $itempo['nama_bebanbpo'],
        //         'konversi' => $itempo['konversi'],
        //     ];

        //     // var_dump($data_array_itempo_mapa);
        //     $this->db->insert('item_po', $data_array_itempo_mapa);
        // endforeach;
        // //END PT MAPA



        // // PT MSAL
        // $db_logistik_msal = $this->load->database('db_logistik_msal', TRUE);
        // //query get po
        // $data_po_msal = $db_logistik_msal->get('po')->result_array();
        // $data_itempo_msal = $db_logistik_msal->get('item_po')->result_array();

        // //loping data po untuk insert po
        // foreach ($data_po_msal as $d) :

        //     $query_id_po_msal = "SELECT MAX(id)+1 as no_id FROM po";
        //     $generate_id_po_msal = $this->db->query($query_id_po_msal)->row();
        //     $no_id_po_msal = $generate_id_po_msal->no_id;
        //     if (empty($no_id_po_msal)) {
        //         $no_id_po_msal = 1;
        //     }

        //     $data_array_po_msal = [
        //         'id' => $no_id_po_msal,
        //         'kd_dept' => $d['kd_dept'],
        //         'ket_dept' => $d['ket_dept'],
        //         'grup' => $d['grup'],
        //         'kode_budet' => $d['kode_budet'],
        //         'kd_subbudget' => $d['kd_subbudget'],
        //         'ket_subbudget' => $d['ket_subbudget'],
        //         'kode_supply' => $d['kode_supply'],
        //         'nama_supply' => $d['nama_supply'],
        //         'kode_pemesan' => $d['kode_pemesan'],
        //         'pemesan' => $d['pemesan'],
        //         'nopo' => $d['nopo'],
        //         'nopotxt' => $d['nopotxt'],
        //         'noppo' => $d['noppo'],
        //         'noppotxt' => $d['noppotxt'],
        //         'no_refppo' => $d['no_refppo'],
        //         'tgl_refppo' => $d['tgl_refppo'],
        //         'tgl_reftxt' => $d['tgl_reftxt'],
        //         'tglpo' => $d['tglpo'],
        //         'tglpotxt' => $d['tglpotxt'],
        //         'tglppo' => $d['tglppo'],
        //         'tglppotxt' => $d['tglppotxt'],
        //         'bayar' => $d['bayar'],
        //         'tempo_bayar' => $d['tempo_bayar'],
        //         'lokasikirim' => $d['lokasikirim'],
        //         'tempo_kirim' => $d['tempo_kirim'],
        //         'lokasi_beli' => $d['lokasi_beli'],
        //         'ket' => $d['ket'],
        //         'kodept' => $d['kodept'],
        //         'namapt' => $d['namapt'],
        //         'no_acc' => $d['no_acc'],
        //         'ket_acc' => $d['ket_acc'],
        //         'periode' => $d['periode'],
        //         'periodetxt' => $d['periodetxt'],
        //         'thn' => $d['thn'],
        //         'tglisi' => $d['tglisi'],
        //         'user' => $d['user'],
        //         'ppn' => $d['ppn'],
        //         'totalbayar' => $d['totalbayar'],
        //         'ket_kirim' => $d['ket_kirim'],
        //         'lokasi' => $d['lokasi'],
        //         'noreftxt' => $d['noreftxt'],
        //         'uangmuka' => $d['uangmuka'],
        //         'voucher' => $d['voucher'],
        //         'terbayar' => $d['terbayar'],
        //         'nopp' => $d['nopp'],
        //         'batal' => $d['batal'],
        //         'kirim' => $d['kirim'],
        //     ];

        //     // var_dump($data_array_po_msal);
        //     $this->db->insert('po', $data_array_po_msal);
        // endforeach;

        // //loping data po untuk insert itempo
        // foreach ($data_itempo_msal as $itempo) :

        //     $query_id_itempo_msal = "SELECT MAX(id)+1 as no_id FROM item_po";
        //     $generate_id_itempo_msal = $this->db->query($query_id_itempo_msal)->row();
        //     $no_id_itempo_msal = $generate_id_itempo_msal->no_id;
        //     if (empty($no_id_itempo_msal)) {
        //         $no_id_itempo_msal = 1;
        //     }

        //     $data_array_itempo_msal = [
        //         'id' => $no_id_itempo_msal,
        //         'nopo' => $itempo['nopo'],
        //         'nopotxt' => $itempo['nopotxt'],
        //         'noppo' => $itempo['noppo'],
        //         'noppotxt' => $itempo['noppotxt'],
        //         'refppo' => $itempo['refppo'],
        //         'tglppo' => $itempo['tglppo'],
        //         'tglppotxt' => $itempo['tglppotxt'],
        //         'tglpo' => $itempo['tglpo'],
        //         'tglpotxt' => $itempo['tglpotxt'],
        //         'kodebar' => $itempo['kodebar'],
        //         'kodebartxt' => $itempo['kodebartxt'],
        //         'nabar' => $itempo['nabar'],
        //         'sat' => $itempo['sat'],
        //         'qty' => $itempo['qty'],
        //         'harga' => $itempo['harga'],
        //         'jumharga' => $itempo['jumharga'],
        //         'kodept' => $itempo['kodept'],
        //         'namapt' => $itempo['namapt'],
        //         'periode' => $itempo['periode'],
        //         'periodetxt' => $itempo['periodetxt'],
        //         'thn' => $itempo['thn'],
        //         'merek' => $itempo['merek'],
        //         'tglisi' => $itempo['tglisi'],
        //         'user' => $itempo['user'],
        //         'ket' => $itempo['ket'],
        //         'noref' => $itempo['noref'],
        //         'lokasi' => $itempo['lokasi'],
        //         'hargasblm' => $itempo['hargasblm'],
        //         'disc' => $itempo['disc'],
        //         'kurs' => $itempo['kurs'],
        //         'kode_budget' => $itempo['kode_budget'],
        //         'grup' => $itempo['grup'],
        //         'main_acct' => $itempo['main_acct'],
        //         'nama_main' => $itempo['nama_main'],
        //         'batal' => $itempo['batal'],
        //         'cek_pp' => $itempo['cek_pp'],
        //         'KODE_BPO' => $itempo['KODE_BPO'],
        //         'JUMLAHBPO' => $itempo['JUMLAHBPO'],
        //         'kode_bebanbpo' => $itempo['kode_bebanbpo'],
        //         'nama_bebanbpo' => $itempo['nama_bebanbpo'],
        //         'konversi' => $itempo['konversi'],
        //     ];

        //     // var_dump($data_array_itempo_msal);
        //     $this->db->insert('item_po', $data_array_itempo_msal);
        // endforeach;
        // //END PT MSAL



        // // PT PEAK
        // $db_logistik_peak = $this->load->database('db_logistik_peak', TRUE);
        // //query get po
        // $data_po_peak = $db_logistik_peak->get('po')->result_array();
        // $data_itempo_peak = $db_logistik_peak->get('item_po')->result_array();

        // //loping data po untuk insert po
        // foreach ($data_po_peak as $d) :

        //     $query_id_po_peak = "SELECT MAX(id)+1 as no_id FROM po";
        //     $generate_id_po_peak = $this->db->query($query_id_po_peak)->row();
        //     $no_id_po_peak = $generate_id_po_peak->no_id;
        //     if (empty($no_id_po_peak)) {
        //         $no_id_po_peak = 1;
        //     }

        //     $data_array_po_peak = [
        //         'id' => $no_id_po_peak,
        //         'kd_dept' => $d['kd_dept'],
        //         'ket_dept' => $d['ket_dept'],
        //         'grup' => $d['grup'],
        //         'kode_budet' => $d['kode_budet'],
        //         'kd_subbudget' => $d['kd_subbudget'],
        //         'ket_subbudget' => $d['ket_subbudget'],
        //         'kode_supply' => $d['kode_supply'],
        //         'nama_supply' => $d['nama_supply'],
        //         'kode_pemesan' => $d['kode_pemesan'],
        //         'pemesan' => $d['pemesan'],
        //         'nopo' => $d['nopo'],
        //         'nopotxt' => $d['nopotxt'],
        //         'noppo' => $d['noppo'],
        //         'noppotxt' => $d['noppotxt'],
        //         'no_refppo' => $d['no_refppo'],
        //         'tgl_refppo' => $d['tgl_refppo'],
        //         'tgl_reftxt' => $d['tgl_reftxt'],
        //         'tglpo' => $d['tglpo'],
        //         'tglpotxt' => $d['tglpotxt'],
        //         'tglppo' => $d['tglppo'],
        //         'tglppotxt' => $d['tglppotxt'],
        //         'bayar' => $d['bayar'],
        //         'tempo_bayar' => $d['tempo_bayar'],
        //         'lokasikirim' => $d['lokasikirim'],
        //         'tempo_kirim' => $d['tempo_kirim'],
        //         'lokasi_beli' => $d['lokasi_beli'],
        //         'ket' => $d['ket'],
        //         'kodept' => $d['kodept'],
        //         'namapt' => $d['namapt'],
        //         'no_acc' => $d['no_acc'],
        //         'ket_acc' => $d['ket_acc'],
        //         'periode' => $d['periode'],
        //         'periodetxt' => $d['periodetxt'],
        //         'thn' => $d['thn'],
        //         'tglisi' => $d['tglisi'],
        //         'user' => $d['user'],
        //         'ppn' => $d['ppn'],
        //         'totalbayar' => $d['totalbayar'],
        //         'ket_kirim' => $d['ket_kirim'],
        //         'lokasi' => $d['lokasi'],
        //         'noreftxt' => $d['noreftxt'],
        //         'uangmuka' => $d['uangmuka'],
        //         'voucher' => $d['voucher'],
        //         'terbayar' => $d['terbayar'],
        //         'nopp' => $d['nopp'],
        //         'batal' => $d['batal'],
        //         'kirim' => $d['kirim'],
        //     ];

        //     // var_dump($data_array_po_peak);
        //     $this->db->insert('po', $data_array_po_peak);
        // endforeach;

        // //loping data po untuk insert itempo
        // foreach ($data_itempo_peak as $itempo) :

        //     $query_id_itempo_peak = "SELECT MAX(id)+1 as no_id FROM item_po";
        //     $generate_id_itempo_peak = $this->db->query($query_id_itempo_peak)->row();
        //     $no_id_itempo_peak = $generate_id_itempo_peak->no_id;
        //     if (empty($no_id_itempo_peak)) {
        //         $no_id_itempo_peak = 1;
        //     }

        //     $data_array_itempo_peak = [
        //         'id' => $no_id_itempo_peak,
        //         'nopo' => $itempo['nopo'],
        //         'nopotxt' => $itempo['nopotxt'],
        //         'noppo' => $itempo['noppo'],
        //         'noppotxt' => $itempo['noppotxt'],
        //         'refppo' => $itempo['refppo'],
        //         'tglppo' => $itempo['tglppo'],
        //         'tglppotxt' => $itempo['tglppotxt'],
        //         'tglpo' => $itempo['tglpo'],
        //         'tglpotxt' => $itempo['tglpotxt'],
        //         'kodebar' => $itempo['kodebar'],
        //         'kodebartxt' => $itempo['kodebartxt'],
        //         'nabar' => $itempo['nabar'],
        //         'sat' => $itempo['sat'],
        //         'qty' => $itempo['qty'],
        //         'harga' => $itempo['harga'],
        //         'jumharga' => $itempo['jumharga'],
        //         'kodept' => $itempo['kodept'],
        //         'namapt' => $itempo['namapt'],
        //         'periode' => $itempo['periode'],
        //         'periodetxt' => $itempo['periodetxt'],
        //         'thn' => $itempo['thn'],
        //         'merek' => $itempo['merek'],
        //         'tglisi' => $itempo['tglisi'],
        //         'user' => $itempo['user'],
        //         'ket' => $itempo['ket'],
        //         'noref' => $itempo['noref'],
        //         'lokasi' => $itempo['lokasi'],
        //         'hargasblm' => $itempo['hargasblm'],
        //         'disc' => $itempo['disc'],
        //         'kurs' => $itempo['kurs'],
        //         'kode_budget' => $itempo['kode_budget'],
        //         'grup' => $itempo['grup'],
        //         'main_acct' => $itempo['main_acct'],
        //         'nama_main' => $itempo['nama_main'],
        //         'batal' => $itempo['batal'],
        //         'cek_pp' => $itempo['cek_pp'],
        //         'KODE_BPO' => $itempo['KODE_BPO'],
        //         'JUMLAHBPO' => $itempo['JUMLAHBPO'],
        //         'kode_bebanbpo' => $itempo['kode_bebanbpo'],
        //         'nama_bebanbpo' => $itempo['nama_bebanbpo'],
        //         'konversi' => $itempo['konversi'],
        //     ];

        //     // var_dump($data_array_itempo_peak);
        //     $this->db->insert('item_po', $data_array_itempo_peak);
        // endforeach;
        // //END PT PEAK



        // // PT PSAM
        // $db_logistik_psam = $this->load->database('db_logistik_psam', TRUE);
        // //query get po
        // $data_po_psam = $db_logistik_psam->get('po')->result_array();
        // $data_itempo_psam = $db_logistik_psam->get('item_po')->result_array();

        // //loping data po untuk insert po
        // foreach ($data_po_psam as $d) :

        //     $query_id_po_psam = "SELECT MAX(id)+1 as no_id FROM po";
        //     $generate_id_po_psam = $this->db->query($query_id_po_psam)->row();
        //     $no_id_po_psam = $generate_id_po_psam->no_id;
        //     if (empty($no_id_po_psam)) {
        //         $no_id_po_psam = 1;
        //     }

        //     $data_array_po_psam = [
        //         'id' => $no_id_po_psam,
        //         'kd_dept' => $d['kd_dept'],
        //         'ket_dept' => $d['ket_dept'],
        //         'grup' => $d['grup'],
        //         'kode_budet' => $d['kode_budet'],
        //         'kd_subbudget' => $d['kd_subbudget'],
        //         'ket_subbudget' => $d['ket_subbudget'],
        //         'kode_supply' => $d['kode_supply'],
        //         'nama_supply' => $d['nama_supply'],
        //         'kode_pemesan' => $d['kode_pemesan'],
        //         'pemesan' => $d['pemesan'],
        //         'nopo' => $d['nopo'],
        //         'nopotxt' => $d['nopotxt'],
        //         'noppo' => $d['noppo'],
        //         'noppotxt' => $d['noppotxt'],
        //         'no_refppo' => $d['no_refppo'],
        //         'tgl_refppo' => $d['tgl_refppo'],
        //         'tgl_reftxt' => $d['tgl_reftxt'],
        //         'tglpo' => $d['tglpo'],
        //         'tglpotxt' => $d['tglpotxt'],
        //         'tglppo' => $d['tglppo'],
        //         'tglppotxt' => $d['tglppotxt'],
        //         'bayar' => $d['bayar'],
        //         'tempo_bayar' => $d['tempo_bayar'],
        //         'lokasikirim' => $d['lokasikirim'],
        //         'tempo_kirim' => $d['tempo_kirim'],
        //         'lokasi_beli' => $d['lokasi_beli'],
        //         'ket' => $d['ket'],
        //         'kodept' => $d['kodept'],
        //         'namapt' => $d['namapt'],
        //         'no_acc' => $d['no_acc'],
        //         'ket_acc' => $d['ket_acc'],
        //         'periode' => $d['periode'],
        //         'periodetxt' => $d['periodetxt'],
        //         'thn' => $d['thn'],
        //         'tglisi' => $d['tglisi'],
        //         'user' => $d['user'],
        //         'ppn' => $d['ppn'],
        //         'totalbayar' => $d['totalbayar'],
        //         'ket_kirim' => $d['ket_kirim'],
        //         'lokasi' => $d['lokasi'],
        //         'noreftxt' => $d['noreftxt'],
        //         'uangmuka' => $d['uangmuka'],
        //         'voucher' => $d['voucher'],
        //         'terbayar' => $d['terbayar'],
        //         'nopp' => $d['nopp'],
        //         'batal' => $d['batal'],
        //         'kirim' => $d['kirim'],
        //     ];

        //     // var_dump($data_array_po_psam);
        //     $this->db->insert('po', $data_array_po_psam);
        // endforeach;

        // //loping data po untuk insert itempo
        // foreach ($data_itempo_psam as $itempo) :

        //     $query_id_itempo_psam = "SELECT MAX(id)+1 as no_id FROM item_po";
        //     $generate_id_itempo_psam = $this->db->query($query_id_itempo_psam)->row();
        //     $no_id_itempo_psam = $generate_id_itempo_psam->no_id;
        //     if (empty($no_id_itempo_psam)) {
        //         $no_id_itempo_psam = 1;
        //     }

        //     $data_array_itempo_psam = [
        //         'id' => $no_id_itempo_psam,
        //         'nopo' => $itempo['nopo'],
        //         'nopotxt' => $itempo['nopotxt'],
        //         'noppo' => $itempo['noppo'],
        //         'noppotxt' => $itempo['noppotxt'],
        //         'refppo' => $itempo['refppo'],
        //         'tglppo' => $itempo['tglppo'],
        //         'tglppotxt' => $itempo['tglppotxt'],
        //         'tglpo' => $itempo['tglpo'],
        //         'tglpotxt' => $itempo['tglpotxt'],
        //         'kodebar' => $itempo['kodebar'],
        //         'kodebartxt' => $itempo['kodebartxt'],
        //         'nabar' => $itempo['nabar'],
        //         'sat' => $itempo['sat'],
        //         'qty' => $itempo['qty'],
        //         'harga' => $itempo['harga'],
        //         'jumharga' => $itempo['jumharga'],
        //         'kodept' => $itempo['kodept'],
        //         'namapt' => $itempo['namapt'],
        //         'periode' => $itempo['periode'],
        //         'periodetxt' => $itempo['periodetxt'],
        //         'thn' => $itempo['thn'],
        //         'merek' => $itempo['merek'],
        //         'tglisi' => $itempo['tglisi'],
        //         'user' => $itempo['user'],
        //         'ket' => $itempo['ket'],
        //         'noref' => $itempo['noref'],
        //         'lokasi' => $itempo['lokasi'],
        //         'hargasblm' => $itempo['hargasblm'],
        //         'disc' => $itempo['disc'],
        //         'kurs' => $itempo['kurs'],
        //         'kode_budget' => $itempo['kode_budget'],
        //         'grup' => $itempo['grup'],
        //         'main_acct' => $itempo['main_acct'],
        //         'nama_main' => $itempo['nama_main'],
        //         'batal' => $itempo['batal'],
        //         'cek_pp' => $itempo['cek_pp'],
        //         'KODE_BPO' => $itempo['KODE_BPO'],
        //         'JUMLAHBPO' => $itempo['JUMLAHBPO'],
        //         'kode_bebanbpo' => $itempo['kode_bebanbpo'],
        //         'nama_bebanbpo' => $itempo['nama_bebanbpo'],
        //         'konversi' => $itempo['konversi'],
        //     ];

        //     // var_dump($data_array_itempo_psam);
        //     $this->db->insert('item_po', $data_array_itempo_psam);
        // endforeach;
        // //END PT PSAM




        // // PT KPP
        // $db_logistik_kpp = $this->load->database('db_logistik_kpp', TRUE);
        // //query get po
        // $data_po_kpp = $db_logistik_kpp->get('po')->result_array();
        // $data_itempo_kpp = $db_logistik_kpp->get('item_po')->result_array();

        // //loping data po untuk insert po
        // foreach ($data_po_kpp as $d) :

        //     $query_id_po_kpp = "SELECT MAX(id)+1 as no_id FROM po";
        //     $generate_id_po_kpp = $this->db->query($query_id_po_kpp)->row();
        //     $no_id_po_kpp = $generate_id_po_kpp->no_id;
        //     if (empty($no_id_po_kpp)) {
        //         $no_id_po_kpp = 1;
        //     }

        //     $data_array_po_kpp = [
        //         'id' => $no_id_po_kpp,
        //         'kd_dept' => $d['kd_dept'],
        //         'ket_dept' => $d['ket_dept'],
        //         'grup' => $d['grup'],
        //         'kode_budet' => $d['kode_budet'],
        //         'kd_subbudget' => $d['kd_subbudget'],
        //         'ket_subbudget' => $d['ket_subbudget'],
        //         'kode_supply' => $d['kode_supply'],
        //         'nama_supply' => $d['nama_supply'],
        //         'kode_pemesan' => $d['kode_pemesan'],
        //         'pemesan' => $d['pemesan'],
        //         'nopo' => $d['nopo'],
        //         'nopotxt' => $d['nopotxt'],
        //         'noppo' => $d['noppo'],
        //         'noppotxt' => $d['noppotxt'],
        //         'no_refppo' => $d['no_refppo'],
        //         'tgl_refppo' => $d['tgl_refppo'],
        //         'tgl_reftxt' => $d['tgl_reftxt'],
        //         'tglpo' => $d['tglpo'],
        //         'tglpotxt' => $d['tglpotxt'],
        //         'tglppo' => $d['tglppo'],
        //         'tglppotxt' => $d['tglppotxt'],
        //         'bayar' => $d['bayar'],
        //         'tempo_bayar' => $d['tempo_bayar'],
        //         'lokasikirim' => $d['lokasikirim'],
        //         'tempo_kirim' => $d['tempo_kirim'],
        //         'lokasi_beli' => $d['lokasi_beli'],
        //         'ket' => $d['ket'],
        //         'kodept' => $d['kodept'],
        //         'namapt' => $d['namapt'],
        //         'no_acc' => $d['no_acc'],
        //         'ket_acc' => $d['ket_acc'],
        //         'periode' => $d['periode'],
        //         'periodetxt' => $d['periodetxt'],
        //         'thn' => $d['thn'],
        //         'tglisi' => $d['tglisi'],
        //         'user' => $d['user'],
        //         'ppn' => $d['ppn'],
        //         'totalbayar' => $d['totalbayar'],
        //         'ket_kirim' => $d['ket_kirim'],
        //         'lokasi' => $d['lokasi'],
        //         'noreftxt' => $d['noreftxt'],
        //         'uangmuka' => $d['uangmuka'],
        //         'voucher' => $d['voucher'],
        //         'terbayar' => $d['terbayar'],
        //         'nopp' => $d['nopp'],
        //         'batal' => $d['batal'],
        //         'kirim' => $d['kirim'],
        //     ];

        //     // var_dump($data_array_po_kpp);
        //     $this->db->insert('po', $data_array_po_kpp);
        // endforeach;

        // //loping data po untuk insert itempo
        // foreach ($data_itempo_kpp as $itempo) :

        //     $query_id_itempo_kpp = "SELECT MAX(id)+1 as no_id FROM item_po";
        //     $generate_id_itempo_kpp = $this->db->query($query_id_itempo_kpp)->row();
        //     $no_id_itempo_kpp = $generate_id_itempo_kpp->no_id;
        //     if (empty($no_id_itempo_kpp)) {
        //         $no_id_itempo_kpp = 1;
        //     }

        //     $data_array_itempo_kpp = [
        //         'id' => $no_id_itempo_kpp,
        //         'nopo' => $itempo['nopo'],
        //         'nopotxt' => $itempo['nopotxt'],
        //         'noppo' => $itempo['noppo'],
        //         'noppotxt' => $itempo['noppotxt'],
        //         'refppo' => $itempo['refppo'],
        //         'tglppo' => $itempo['tglppo'],
        //         'tglppotxt' => $itempo['tglppotxt'],
        //         'tglpo' => $itempo['tglpo'],
        //         'tglpotxt' => $itempo['tglpotxt'],
        //         'kodebar' => $itempo['kodebar'],
        //         'kodebartxt' => $itempo['kodebartxt'],
        //         'nabar' => $itempo['nabar'],
        //         'sat' => $itempo['sat'],
        //         'qty' => $itempo['qty'],
        //         'harga' => $itempo['harga'],
        //         'jumharga' => $itempo['jumharga'],
        //         'kodept' => $itempo['kodept'],
        //         'namapt' => $itempo['namapt'],
        //         'periode' => $itempo['periode'],
        //         'periodetxt' => $itempo['periodetxt'],
        //         'thn' => $itempo['thn'],
        //         'merek' => $itempo['merek'],
        //         'tglisi' => $itempo['tglisi'],
        //         'user' => $itempo['user'],
        //         'ket' => $itempo['ket'],
        //         'noref' => $itempo['noref'],
        //         'lokasi' => $itempo['lokasi'],
        //         'hargasblm' => $itempo['hargasblm'],
        //         'disc' => $itempo['disc'],
        //         'kurs' => $itempo['kurs'],
        //         'kode_budget' => $itempo['kode_budget'],
        //         'grup' => $itempo['grup'],
        //         'main_acct' => $itempo['main_acct'],
        //         'nama_main' => $itempo['nama_main'],
        //         'batal' => $itempo['batal'],
        //         'cek_pp' => $itempo['cek_pp'],
        //         'KODE_BPO' => $itempo['KODE_BPO'],
        //         'JUMLAHBPO' => $itempo['JUMLAHBPO'],
        //         'kode_bebanbpo' => $itempo['kode_bebanbpo'],
        //         'nama_bebanbpo' => $itempo['nama_bebanbpo'],
        //         'konversi' => $itempo['konversi'],
        //     ];

        //     // var_dump($data_array_itempo_kpp);
        //     $this->db->insert('item_po', $data_array_itempo_kpp);
        // endforeach;
        // //END PT KPP

        echo "PO BERHASIL DI UPDATE! <br>";
        echo "<a class='btn btn-danger' href='Home'>BACK TO HOME</a>";
    }
}

/* End of file Controllername.php */
