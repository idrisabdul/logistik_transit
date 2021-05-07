<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('stok_transit_model');
        $this->load->model('tabel_lpb_model');
        if (!$this->session->userdata('userlogin')) {
            // redirect('login');
            redirect('https://192.168.1.231/msal-login/Login');
        }
        if (!$this->session->userdata('periode')) {
            // redirect('login');
            redirect('https://192.168.1.231/logistik_transit_ho');
        }
    }

    public function index()
    {
        $data['title'] = "Home";

        $lpb = $this->tabel_lpb_model->get_data_lpb();
        $bkb = $this->tabel_lpb_model->get_data_bkb();
        $po = $this->db->query("SELECT * FROM po");


        $data['jumlahlpb'] = $lpb->num_rows();
        $data['jumlahbkb'] = $bkb->num_rows();
        $data['jumlahpo'] = $po->num_rows();
        $data['stok_gudang'] = $this->stok_transit_model->stokTransit();


        $this->load->view('home_view', $data);
    }
}
