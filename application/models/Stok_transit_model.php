<?php

class Stok_transit_model extends CI_Model
{
    public function stokTransit()
    {
        $this->db->group_by('kodebar');
        $this->db->order_by('nabar', 'ASC');
        return $this->db->get('lpb');
    }

    public function sumLPBPO($kodebar)
    {
        $this->db->query()('SUM(qty_lpb) as qtylpb,SUM(qty_po) as qtypo');
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
