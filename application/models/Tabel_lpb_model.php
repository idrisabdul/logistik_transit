<?php

class Tabel_lpb_model extends CI_Model
{
    public function get_data_lpb()
    {
        $this->db->order_by('no_lpb', 'desc');
        $result = $this->db->get('lpb');
        return $result;
    }

    //FUNGSI INI UNTUK MENAMPILKAN DATA PO //
    public function get_data_po()
    {
        $this->db->select('*');
        $this->db->from('po');
        $this->db->group_by('noreftxt');
        $this->db->join('item_po', 'item_po.noref=po.noreftxt');

        $query = $this->db->get();
        return $query->result();
        //return $this->db->get('po');
    }

    public function getByPO($id)
    {
        $cari_po = $this->db->get_where('item_po', ['id' => $id])->row_array();
        $this->db->select('*');
        $this->db->join('po', 'item_po.noref=po.noreftxt');
        return $this->db->get_where('item_po', ['noref' => $cari_po['noref']])->result_array();
    }

    //SELECT * FROM `lpb` where `po` = $po ORDER BY `nabar` ASC
    //Menampilkan data barang berdasarkan PO di cetak LPB
    public function getPoLPB($lpbtxt)
    {
        $this->db->select('*');
        $this->db->from('lpb');
        $this->db->where('lpbtxt', $lpbtxt);
        return $this->db->get();
    }

    public function get_data_bkb()
    {
        $this->db->order_by('nobkb', 'desc');
        return $this->db->get('bkb');
    }

    function get_data_lpb_distinct()
    {
        return $this->db->query("SELECT DISTINCT (potxt) as potxt,suplier,id FROM lpb GROUP BY potxt order by potxt desc")->result_array();
        // $this->db->select('DISTINCT(potxt), suplier, nabar, kodebar, qty_lpb, sat, PT, nobkb, tgl, po, txtperiode, depart, kodept, lpbtxt, qty_bkb');
        // $this->db->order_by('potxt', 'DESC');
        // $this->db->group_by('nabar');
        // return $this->db->get('lpb');
    }

    function getIdLpb($id)
    {
        return  $this->db->get_where('lpb', ['id' => $id]);
    }

    public function updateLPB($data, $id)
    {
        $this->db->update('lpb', $data, ['id' => $id]);
    }

    function getIdPo($id)
    {
        $cari = $this->db->get_where('lpb', ['id' => $id])->row_array();

        return $this->db->get_where('lpb', ['lpbtxt' => $cari['lpbtxt']])->result_array();
    }

    public function lpb_no_lpb_desc()
    {
        $this->db->select('*');
        $this->db->order_by('no_lpb', 'DESC');
        $this->db->limit('1');
        return $this->db->get('lpb');
    }

    public function deleteLPB($id)
    {
        $this->db->delete('lpb', ['id' => $id]);
    }

    public function getQtyLPB($kodebar, $merek, $potxt)
    {
        //SELECT SUM(qty_lpb) FROM `lpb` WHERE kodebar = '102505420000012'

        $this->db->select_sum('qty_lpb');
        $this->db->where('kodebar', $kodebar);
        $this->db->where('merek', $merek);
        $this->db->where('potxt', $potxt);
        return $this->db->get('lpb')->row_array();
    }

    public function getSumQtyLPB($potxt)
    {
        $this->db->select_sum('qty_lpb');
        return $this->db->get_where('lpb', ['potxt' => $potxt])->row_array();
    }
    public function getSumQtyPO($potxt)
    {
        $this->db->select_sum('qty');
        return $this->db->get_where('item_po', ['noref' => $potxt])->row_array();
    }

    public function updateItemLPB($data, $kodebar, $potxt, $merek)
    {
        $this->db->set($data);
        $this->db->where('kodebar', $kodebar);
        $this->db->where('potxt', $potxt);
        $this->db->where('merek', $merek);
        return $this->db->update('lpb');
    }
}
