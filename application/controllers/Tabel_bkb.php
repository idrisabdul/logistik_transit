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

    public function tabel_lpb_distinct()
    {


        $data['title'] = 'Input BKB';
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

        $qty_lpb = $this->input->post('qty_lpb');
        $qty_bkb = $this->input->post('qty_bkb');
        $kodebar = $this->input->post('kodebar');

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
            $data = [
                'PT' => $pt,
                'nobkb' => $nobkb,
                'nobkbtxt' => $awalref,
                'tgl' => $tgl,
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
                'tglinput' => $tglinput,
                'user' => $this->session->userdata('nama'),
                'depart' => $depart,
                'kodept' => $kodept
            ];

            $barang = $this->tabel_bkb_model->getRowsLpb($kodebar);

            $row = $this->tabel_bkb_model->getRowsLpb($kodebar)->row_array();

            if ($qty_bkb <> "" or $qty_bkb <> 0) :

                if ($barang->num_rows() > 0) {
                    $bkbedit = $this->input->post('bkb');
                    $updateqtybkb = $qty_bkb + $row['qty_bkb'];
                    $dataupdate = [
                        'tgl' => $tgl,
                        'jam' => $jam,

                        'nopo' => $nopo,
                        'nopotxt' => $nopotxt,
                        'suplier' => $suplier,
                        'kodebar' => $kodebar,
                        'nabar' => $nabar,

                        'qty_lpb' => $qty_lpb,
                        'sat' => $sat,
                        'qty_bkb' => $updateqtybkb,
                        'kondisi' => $kondisi,
                        'transport' => $transport,

                        'pengirim' => $pengirim,
                        'nopol' => $nopol,
                        'tujuan' => $tujuan,
                        'ket' => $ket,
                        'periodetxt' => $this->session->userdata('periode'),

                        'thn' => date('Y'),
                        'user' => $this->session->userdata('user'),
                        'depart' => $depart,
                        'kodept' => $kodept
                    ];
                    $this->db->update('bkb', $dataupdate, ['kodebar' => $kodebar]);
                    $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">BKB Diupdate</div>');
                    redirect('tabel_bkb');
                } else {
                    $this->db->insert('bkb', $data);
                    $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">BKB Diinput</div>');
                    redirect('tabel_bkb');
                    echo "<script>alert('Berhasil berhasil diinput')</script>";
                }

            endif;
        }


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
        $data['barang_item_bkb'] = $this->tabel_bkb_model->getItemBKB($id)->result_array();

        $data['title'] = 'Input BKB';
        // echo "<pre>";
        // var_dump($data['barang_item_bkb']);
        // echo "</pre>";

        $this->load->view('bkb/tampil_bkb_view', $data);
    }
}
