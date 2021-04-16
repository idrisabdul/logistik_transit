<?php

class Tabel_lpb extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Tabel_lpb_model');
        if (!$this->session->userdata['auth']) {
            echo "<script>alert('Anda Harus Login Terlebih dahulu');</script>";
            redirect('login');
        }
    }

    function index($po = null)
    {
        $data['title'] = "TABEL LPB";
        $data['konten'] = "Laporan Pemasukan Barang";
        $data['tabel_lpb'] = $this->Tabel_lpb_model->get_data_lpb();


        $data['item_po'] = $this->Tabel_lpb_model->getPoLPB($po);
        $this->load->view('tabel_lpb_view', $data);
    }

    public function pdf()
    {
        $this->load->library('PdfGenerator');

        $data['tabel_lpb'] = $this->Tabel_lpb_model->get_data_lpb();
        $html = $this->load->view('lpb/cetak_listlpb_view', $data, true);

        $this->PdfGenerator->generate($html, 'lpb');
    }

    function list_po()
    {
        // $data['generate'] = $this->Tabel_lpb_model->lpb_no_lpb_desc();

        $data['title'] = "Tambah LPB";

        // $data['po'] = $this->tabel_lpb_model->get_data_po();

        // foreach ($data['po'] as $po) {

        //     $data['qtylpb'] = $this->tabel_lpb_model->getSumQtyLPB($po->noreftxt);
        //     // echo "<pre>";
        //     // var_dump($qtylpb);
        //     // echo "</pre>";
        //     // if (($qtypo - $qtylpb) == 0) {
        //     // }
        // }


        $this->load->view('add_items_view', $data);
    }
    function add_new()
    {


        $list = $this->Tabel_lpb_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {

            $nopo = $field->noreftxt;
            $sumqtypo = $this->Tabel_lpb_model->getSumQtyPO($nopo);
            $sumqtylpb = $this->Tabel_lpb_model->getSumQtyLPB($nopo);

            $total = $sumqtypo['qty'] - $sumqtylpb['qty_lpb'];
            if ($total == 0) {
                $status = "<div class='badge badge-danger'>Habis</div>";
            } elseif ($total < $sumqtypo['qty']) {
                $status = "<div class='badge badge-success'>Sebagian</div>";
            } else {
                $status = "<div class='badge badge-warning'>__</div>";
            }

            if ($total == 0) {
            } else {
                $no++;
                $row = array();
                $row[] = $no;
                $row[] = $field->namapt;
                $row[] = $field->noreftxt;
                $tanggal = date("j F Y", strtotime($field->tglpo));
                $row[] = $tanggal;
                $row[] = $field->nama_supply;
                $row[] = $status;
                $row[] = '<a type="button" href="' . base_url('tabel_lpb/tambah_lpb/' . $field->id) . '" class="btn btn-outline-info">input</a>';
            }
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Tabel_lpb_model->count_all(),
            "recordsFiltered" => $this->Tabel_lpb_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function save($id = null)
    {

        $generate = $this->Tabel_lpb_model->lpb_no_lpb_desc();
        foreach ($generate->result_array() as $rows) {

            if ($rows >= 1) {
                $nolpb = $rows['no_lpb'] + 1;
                if ($nolpb <= 9) {
                    $URUT = "0000" . $nolpb;
                } elseif ($nolpb >= 9 && $nolpb < 99) {
                    $URUT = "000" . $nolpb;
                } elseif ($nolpb >= 99 && $nolpb < 999) {
                    $URUT = "00" . $nolpb;
                } elseif ($nolpb >= 999 && $nolpb < 9999) {
                    $URUT = "0" . $nolpb;
                } elseif ($nolpb >= 9999) {
                    $URUT =  $nolpb;
                }
                $awalref = "HO-LPB/JKT/" . date('m') . "/" . date('Y') . "/" . "62" . $URUT;
            } else {
                $nolpb = 1;
                $URUT = "610000" . $nolpb;
                $awalref = "HO-LPB/JKT/" . date('m') . "/" . date('Y') . "/" . $URUT;
            }
        }





        $jumlahbarang = $this->input->post('count');


        for ($i = 1; $i <= $jumlahbarang; $i++) {
            $po = $this->input->post('po' . $i);
            $pt = $this->input->post('PT' . $i);
            $potxt = $this->input->post('potxt' . $i);
            $kodebar = $this->input->post('kodebar' . $i);
            $suplier = $this->input->post('suplier' . $i);
            $tgl = $this->input->post('tglinput' . $i);
            $nabar = $this->input->post('nabar' . $i);
            $transporter = $this->input->post('transporter' . $i);
            $merek = $this->input->post('merek' . $i);
            $sat = $this->input->post('sat' . $i);
            $qty_lpb = $this->input->post('qty_lpb' . $i);
            $qty_po =  $this->input->post('qty_po' . $i);
            $jam = $this->input->post('time' . $i);
            $sj = $this->input->post('sj' . $i);
            $asal = $this->input->post('asal' . $i);
            $petugas = $this->input->post('petugas' . $i);
            $tglinput = $this->input->post('tglinput' . $i);
            $user = $this->input->post('user' . $i);
            $periode = $this->input->post('txtperiode' . $i);
            $ket = $this->input->post('ket' . $i);
            $depart = $this->input->post('ket_dept' . $i);
            $kodept = $this->input->post('kodept' . $i);
            $datates =  array(
                'po' => $po,
                'PT' => $pt,
                'potxt' => $potxt,
                'suplier' => $suplier,
                'tgl' => $tgl,

                'kodebar' => $kodebar,
                'nabar' => $nabar,
                'merek' => $merek,
                'qty_po' => $qty_po,
                'qty_lpb' => $qty_lpb,

                'sat' => $sat,
                'jam' => $jam,
                'sj' => $sj,
                'transporter' => $transporter,
                'asal' => $asal,

                'petugas' => $petugas,
                'tgl' => $tglinput,
                'user' => $user,
                'txtperiode' => $periode,
                'thn' => date('Y'),

                'ket' => $ket,
                'no_lpb' => $nolpb,
                'lpbtxt' => $awalref,
                'qty_bkb' => "0",
                'nobkb' => "0",

                'depart' => $depart,
                'kodept' => $kodept,
            );


            /*   $data =
            # code...
            [
                'po' => $this->input->post('po'),
                'PT' => $this->input->post('PT'),
                'potxt' => $this->input->post('potxt'),
                'suplier' => $this->input->post('suplier'),
                'tgl' => $this->input->post('tgl'),

                'kodebar' => $kodebar,
                'nabar' => $this->input->post('nabar'),
                'merek' => $this->input->post('merek'),
                'qty_po' => $qty_po,
                'qty_lpb' => $qty_lpb,

                'sat' => $this->input->post('sat'),
                'jam' => $this->input->post('jam'),
                'sj' => $this->input->post('sj'),
                'transporter' => $this->input->post('transporter'),
                'asal' => $this->input->post('asal'),

                'petugas' => $this->input->post('petugas'),
                'tglinput' => $this->input->post('tglinput'),
                'user' => $this->input->post('user'),
                'txtperiode' => $this->input->post('txtperiode'),
                'thn' => date('Y'),

                'ket' => $this->input->post('ket'),
                'no_lpb' => $nolpb,
                'lpbtxt' => $awalref,
                'qty_bkb' => "0",
                'nobkb' => $this->input->post('www'),

                'depart' => $this->input->post('ket_dept'),
                'kodept' => $this->input->post('kodept')
            ]; */


            //$this->db->insert('lpb', $data);

            //-------INSERT OR UPDATE-----
            // $queryLPB = "SELECT * FROM `lpb` WHERE `kodebar` = $kodebar AND `potxt`= '$potxt' AND `merek` = '$merek'";
            // $jika_barang_ada = $this->db->query($queryLPB);

            //mengambil qty barang
            // $qty_lpb1 = $this->db->query($queryLPB)->row_array();
            // $qtylpb = $qty_lpb1['qty_lpb'];

            if ($qty_lpb != "" and $tgl != "") :


                $this->session->set_flashdata('message', '<div class="alert alert-light alert-dismissible show fade col-md-6">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      Item LPB Berhasil ditambahkan
                    </div>
                    </div>');
                $this->db->insert('lpb', $datates);


            endif;
            // ------END INSERT OR UPDATE -----



            // --------- END UPDATE SISA ITEM PO ---------

        }




        redirect('tabel_lpb');
    }

    public function items_po($lpbtxt)
    {
        $data['item_po'] = $this->Tabel_lpb_model->getPoLPB($lpbtxt);
        $this->load->view('tabel_lpb_view', $data);
    }

    public function edit_lpb($id)
    {
        $data['title'] = "Edit LPB";
        $data['po'] = $this->Tabel_lpb_model->getIdLpb($id);
        // echo "<pre>";
        // var_dump($data['po']);
        // echo "</pre>";
        // die;
        $this->load->view('lpb/edit_lpb_view', $data);
    }

    public function update($id)
    {
        $data = [
            'tgl' => $this->input->post('tgl'),
            'jam' => $this->input->post('jam'),
            'qty_lpb' => $this->input->post('qty_lpb'),
            'sj' => $this->input->post('sj'),
            'transporter' => $this->input->post('transporter'),
            'ket' => $this->input->post('ket')
        ];

        $this->Tabel_lpb_model->updateLPB($data, $id);
        $this->session->set_flashdata('message', '
        <div class="alert alert-light alert-dismissible show fade col-md-6">
        <div class="alert-body">
          <button class="close" data-dismiss="alert">
            <span>&times;</span>
          </button>
          Data LPB Berhasil diperbarui
        </div>
        </div>');
        redirect('tabel_lpb');
    }

    public function cetakPO($id)
    {
        $data['title'] = 'Cetak';

        $this->load->library('ciqrcode');

        $config['cacheable']    = true; //boolean, the default is true
        $config['cachedir']     = './assets/'; //string, the default is application/cache/
        $config['errorlog']     = './assets/'; //string, the default is application/logs/
        $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
        $config['quality']      = true; //boolean, the default is true
        $config['size']         = '1024'; //interger, the default is 1024
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);

        $po = $this->Tabel_lpb_model->getIdLpb($id);

        $item_po = $this->Tabel_lpb_model->getIdPo($id);

        foreach ($po->result_array() as $qrcode) :

            foreach ($item_po as $qr) {
                # code...

                $image_name = substr($qr['lpbtxt'], -7) . '.png'; //buat name dari qr code sesuai dengan nim
                $params['data'] = $qr['potxt']; //data yang akan di jadikan QR CODE
                $params['level'] = 'H'; //H=High
                $params['size'] = 10;
                $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
                $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
            }

        endforeach;

        $data['po'] = $this->Tabel_lpb_model->getIdLpb($id);
        $data['item_po'] = $this->Tabel_lpb_model->getIdPo($id);

        $this->load->view('lpb/cetak_po_view', $data);
    }

    public function delete_itemlpb($id)
    {
        $this->Tabel_lpb_model->deleteLPB($id);
        $this->session->set_flashdata('message', '
            <div class="alert alert-light alert-dismissible show fade col-md-6">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              Data LPB Berhasil dihapus
            </div>
            </div>');
        redirect('tabel_lpb');
    }


    public function tambah_lpb($id)
    {
        $data['title'] = "Input Penerimaan Barang Transit HO";
        $sql = "SELECT * FROM po WHERE id = $id";
        $rowpo = $this->db->query($sql)->row_array();

        $noref  = $rowpo['noreftxt'];
        $data['barang_po'] = $this->Tabel_lpb_model->getItemPO($noref);

        $data['supply'] = $rowpo['nama_supply'];
        $data['nopo'] = $rowpo['noreftxt'];
        $data['ket_dept'] = $rowpo['ket_dept'];


        // var_dump($da);
        $this->load->view('lpb/tambah_lpb_view', $data);
    }

    public function input_lpb_qrcode()
    {
        $data['title'] = "Input Penerimaan Barang Transit HO";

        $po = $this->input->post('po');
        $data = $this->Tabel_lpb_model->getNoPO($po);
        foreach ($data as $i) {
            $id = $i['id'];
        }
        // echo "<pre>";
        // var_dump($po);
        // echo "</pre>";
        // $view = $this->load->view('lpb/tambah_lpb_qrcode', $data);
        echo json_encode($id);
    }

    function test($id)
    {
        $data['title'] = "QRCODE LPB";
        $data['barang_po'] = $this->Tabel_lpb_model->getByPO($id);

        // echo "<pre>";
        // var_dump($data['barang_po']);
        // echo "</pre>";

        foreach ($data['barang_po'] as $row) {
            $data['supply'] = $row['nama_supply'];
            $data['nopo'] = $row['noref'];
        }

        $this->load->view('lpb/tambah_lpb_view', $data);
    }
}
