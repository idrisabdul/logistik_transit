<?php

class Tabel_bkb_model extends CI_Model
{
    public function getIdBKB($id)
    {
        return $this->db->get_where('bkb', ['ID' => $id])->result_array();
    }

    public function updateBKB($data, $id)
    {
        return $this->db->update('bkb', $data, ['ID' => $id]);
    }

    public function getUrutBKB()
    {
        $this->db->order_by('nobkb', 'desc');
        $this->db->limit(1);
        return $this->db->get('bkb')->result_array();
    }

    public function deleteBKB($id)
    {
        $this->db->delete('bkb', ['ID' => $id]);
    }

    public function itemBKB($kodebar)
    {
        $this->db->get_where('bkb', ['kodebar' => $kodebar])->row_array();
    }

    public function getItemBKB($id)
    {
        $getItem = $this->db->get_where('lpb', ['id' => $id])->row_array();
        $this->db->group_by('nabar');
        //$this->db->select_sum('qty_lpb');
        return $this->db->get_where('lpb', ['potxt' => $getItem['potxt']]);
    }


    public function getQtyBkb($kodebar)
    {
        $this->db->select_sum('qty_bkb');
        return $this->db->get_where('bkb', ['kodebar' => $kodebar])->row_array();
    }

    public function getQtyLpb($kodebar)
    {
        $this->db->select_sum('qty_lpb');
        return $this->db->get_where('lpb', ['kodebar' => $kodebar])->row_array();
    }

    public function getRowsLpb($kodebar)
    {
        return $this->db->get_where('bkb', ['kodebar' => $kodebar]);
    }

    function getnoBkbItem($id)
    {
        $cari = $this->db->get_where('bkb', ['ID' => $id])->row_array();

        return $this->db->get_where('bkb', ['nobkbtxt' => $cari['nobkbtxt']])->result_array();
    }
}
