<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    public function index()
    {
        $data['title'] = 'Login Page';
        if ($this->session->userdata('auth')) {
            redirect('home');
        }

        $this->load->view('cek_login_view', $data);
    }

    public function login()
    {
        $password = $this->input->post('password');
        $periode = $this->input->post('periode');

        $newDate = date("Ym", strtotime($periode));
        $user = $this->login_model->login($password);

        if ($user == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">User tidak ditemukan</div>');
            redirect('login');
        } else {
            if ($password == $user->KUNCI) {
                $data = [
                    'auth' => true,
                    'nama' => $user->NAMA,
                    'level' => $user->userlevelid,
                    'periode' => $newDate
                ];

                $this->session->set_userdata($data);
                redirect('tabel_lpb');
            } else {
                $this->session->set_flashdata('pesan', 'Password tidak ditemukan');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
