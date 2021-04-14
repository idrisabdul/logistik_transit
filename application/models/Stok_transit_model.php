<?php

class Stok_transit_model extends CI_Model
{
    public function stokTransit()
    {
        $this->db->group_by('kodebar');
        $this->db->order_by('no_lpb', 'desc');
        return $this->db->get('lpb');
    }

    public function stokTransitPo()
    {
        $this->db->select('*');
        $this->db->group_by('kodebar');
        $this->db->order_by('no_lpb', 'desc');
        $this->db->from('lpb');
        $this->db->join('po', 'po.noreftxt=lpb.potxt');
        return $this->db->get();
    }

    public function sumLPBPO($kodebar)
    {
        $this->db->query('SUM(qty_lpb) as qtylpb,SUM(qty_po) as qtypo');
        $this->db->from('lpb');
        return $this->db->where('kodebar', $kodebar);
    }

    public function qtyBKB($kodebar)
    {
        $this->db->select_sum('qty_bkb', 'qtybkb');
        $this->db->from('bkb');
        return $this->db->where('kodebar', $kodebar);
    }
}
