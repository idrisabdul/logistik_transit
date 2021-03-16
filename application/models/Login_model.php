<?php

class Login_model extends CI_Model
{

    public function login($kunci)
    {
        return $this->db->get_where('kunci', ['KUNCI' => $kunci])->row();
    }
}
