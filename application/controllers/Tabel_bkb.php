<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tabel_bkb extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('tabel_lpb_model');
        $this->load->model('tabel_bkb_model');
        if (!$this->session->userdata['auth']) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = "Tabel BKB";
        $data['data_bkb'] = $this->tabel_lpb_model->get_data_bkb();
        $this->load->view('tabel_bkb_view', $data);
    }

    public function pdf()
    {
        $this->load->library('pdfgenerator');

        $data['tabel_bkb'] = $this->tabel_lpb_model->get_data_bkb();
        $html = $this->load->view('bkb/cetak_listbkb_view', $data, true);

        $this->pdfgenerator->generate($html, 'laporan_bkb');
    }

    public function tabel_lpb_distinct()
    {
        $data['title'] = 'Daftar Barang Transit';
        $data['data_lpb'] = $this->tabel_lpb_model->get_data_lpb_distinct();
        $this->load->view('input_bkb_view', $data);
    }

    public function save()
    {
        $generate = $this->tabel_bkb_model->getUrutBKB();

        foreach ($generate as $rows) {
            if ($rows >= 1) {
                $nobkb = $rows['nobkb'] + 1;
                if ($nobkb <= 9) {
                    $URUT = "0000" . $nobkb;
                } elseif ($nobkb >= 9 && $nobkb < 99) {
                    $URUT = "000" . $nobkb;
                } elseif ($nobkb >= 99 && $nobkb < 999) {
                    $URUT = "00" . $nobkb;
                } elseif ($nobkb >= 999 && $nobkb < 9999) {
                    $URUT = "0" . $nobkb;
                } elseif ($nobkb >= 9999) {
                    $URUT =  $nobkb;
                }
            } else {
                $nobkb = 1;
                $URUT = "0000" . $nobkb;
            }

            $data['nobkb'] = $nobkb;
            $awalref = "HO-BKB/JKT/" . date('m') . "/" . date('Y') . "/" . "61" . $URUT;
        }

        // $qty_lpb = $this->input->post('qty_lpb');
        // $qty_bkb = $this->input->post('qty_bkb');
        // $kodebar = $this->input->post('kodebar');

        $jumlah_barang = $this->input->post('count');

        for ($i = 1; $i <= $jumlah_barang; $i++) {
            $pt = $this->input->post('PT' . $i);
            $tgl = $this->input->post('tgl' . $i);
            $jam = $this->input->post('jam' . $i);
            $nopo = $this->input->post('nopo' . $i);
            $kodebar = $this->input->post('kodebar' . $i);
            $qty_lpb = $this->input->post('qty_lpb' . $i);
            $qty_bkb = $this->input->post('qty_bkb' . $i);
            $edit = $this->input->post('edit');
            $nopotxt = $this->input->post('nopotxt' . $i);
            $suplier = $this->input->post('suplier' . $i);
            $nabar = $this->input->post('nabar' . $i);
            $sat = $this->input->post('sat' . $i);
            $kondisi = $this->input->post('kondisi' . $i);
            $transport = $this->input->post('transport' . $i);
            $pengirim = $this->input->post('pengirim' . $i);
            $nopol = $this->input->post('nopol' . $i);
            $tujuan = $this->input->post('tujuan' . $i);
            $ket = $this->input->post('ket' . $i);
            $tglinput = $this->input->post('tglinput' . $i);
            $depart = $this->input->post('depart' . $i);
            $kodept = $this->input->post('kodept' . $i);
            $data = array(
                'PT' => $pt,
                'nobkb' => $nobkb,
                'nobkbtxt' => $awalref,
                'tgl' => $tglinput,
                'jam' => $jam,

                'nopo' => $nopo,
                'nopotxt' => $nopotxt,
                'suplier' => $suplier,
                'kodebar' => $kodebar,
                'nabar' => $nabar,

                'qty_lpb' => $qty_lpb,
                'sat' => $sat,
                'qty_bkb' => $qty_bkb,
                'kondisi' => $kondisi,
                'transport' => $transport,

                'pengirim' => $pengirim,
                'nopol' => $nopol,
                'tujuan' => $tujuan,
                'ket' => $ket,
                'periodetxt' => $this->session->userdata('periode'),

                'thn' => date('Y'),
                // 'tglinput' => $tglinput,
                'user' => $this->session->userdata('nama'),
                'depart' => $depart,
                'kodept' => $kodept
            );

            $barang = $this->tabel_bkb_model->getRowsLpb($kodebar);

            $row = $this->tabel_bkb_model->getRowsLpb($kodebar)->row_array();

            if ($qty_bkb <> "" and $tgl == null) :


                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">BKB Diinput</div>');
                $this->db->insert('bkb', $data);


            endif;
        }
        redirect('tabel_bkb');


        // $qtylpb = $qty_lpb - $qty_bkb;
        // //$this->load->view('input_bkb_view', $data);
        // //$qry = "UPDATE `lpb` SET `qty_lpb` = $qtylpb WHERE `kodebar` = $kodebar";
        // //$this->db->query($qry);

        // $itembkb = $this->tabel_bkb_model->itemBKB($kodebar);
        // $qtybkb = $itembkb['qty_bkb'];


    }

    function edit_bkb($bkbtxt)
    {
        $data['title'] = 'Edit BKB';
        $data['bkbtxt'] = $this->tabel_bkb_model->getIdBKB($bkbtxt);
        $this->load->view('bkb/edit_bkb_view', $data);
    }

    public function cetakBKB($id)
    {
        $data['title'] = 'Cetak BKB';

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/bkb_qrcode/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $cetakbkb = $this->tabel_bkb_model->getIdBKB($id);

        $item_bkb = $this->tabel_bkb_model->getnoBkbItem($id);

        foreach ($cetakbkb as $qrcode) :

            foreach ($item_bkb as $qr) {
                # code...

                $image_name = substr($qr['nobkbtxt'], -8) . '.png'; //buat name dari qr code
                $params['data'] = $qr['nopotxt']; //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            }

        endforeach;

        $data['cetakbkb'] = $this->tabel_bkb_model->getIdBKB($id);
        $data['item_bkb'] = $this->tabel_bkb_model->getnoBkbItem($id);

        $this->load->view('bkb/cetak_bkb_view', $data);
    }

    public function updateBKB($id)
    {
        $data = [
            'kondisi' => $this->input->post('kondisi'),
            'tgl' => $this->input->post('tgl'),
            'jam' => $this->input->post('jam'),
            'qty_bkb' => $this->input->post('qty_bkb'),
            'transport' => $this->input->post('transport'),
            'pengirim' => $this->input->post('pengirim'),
            'nopol' => $this->input->post('nopol'),
            'ket' => $this->input->post('ket'),
        ];

        $this->tabel_bkb_model->updateBKB($data, $id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-light alert-dismissible show fade col-md-6">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          Data BKB Berhasil diperbarui
        </div>
        </div>');
        redirect('tabel_bkb');
    }

    public function delete_itembkb($id)
    {
        $this->tabel_bkb_model->deleteBKB($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-light alert-dismissible show fade col-md-6">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              Data LPB Berhasil dihapus
            </div>
            </div>');
        redirect('tabel_bkb');
    }

    public function tampil_input_bkb($id)
    {
        $data['title'] = 'Input BKB';

        $data['barang_item_bkb'] = $this->tabel_bkb_model->getItemBKB($id)->result_array();

        foreach ($data['barang_item_bkb'] as $row) {
            $data['nopo'] = $row['potxt'];
            $data['suplier'] = $row['suplier'];
        }

        // echo "<pre>";
        // var_dump($data['barang_item_bkb']);
        // echo "</pre>";

        $this->load->view('bkb/tampil_bkb_view', $data);
    }

    public function input_bkb_qrcode()
    {
        $data['title'] = "Input Penerimaan Barang Transit HO";

        $po = $this->input->post('po');
        $data = $this->tabel_lpb_model->getNoLPB($po);
        foreach ($data as $i) {
            $id = $i['id'];
        }
        // echo "<pre>";
        // var_dump($po);
        // echo "</pre>";
        // $view = $this->load->view('lpb/tambah_lpb_qrcode', $data);
        echo json_encode($id);
    }
}
