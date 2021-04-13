<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok_transit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('stok_transit_model');
        if (!$this->session->userdata['auth']) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Stok Transit";
        $data['stok_gudang'] = $this->stok_transit_model->stokTransitPo();

        // $stok =  $this->stok_transit_model->stokTransit();

        // foreach ($stok->result_array as $row) {
        //     $kodebar = $row['kodebar'];

        //     $qry = $this->stok_transit_model->sumLPBPO($kodebar);

        //     foreach ($qry->result_array() as $data) {
        //         $qtylpb = $data['qtylpb'];
        //         $qtypo = $data['qtypo'];
        //     }

        //     $qtybkb = $this->stok_transit_model->qtyBKB($kodebar);

        //     foreach ($qtybkb->result_array() as $row2) {
        //         $qtybkb = $row2['qtybkb'];
        //     }

        //     $saldo = $qtylpb - $qtybkb;




        // }


        $this->load->view('stok_transit_view', $data);
    }
}
