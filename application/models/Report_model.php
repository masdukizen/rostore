<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report_model extends CI_Model
{
    public function getAllOutlet()
    {
        $this->db->where_not_in('outlet', 'Kantor Pusat');
        return $this->db->get('outlet')->result_array();
    }

    public function getOutletById()
    {
        $outletid = $this->session->userdata('outlet_id');
        return $this->db->get_where('outlet', ['id' => $outletid])->row_array();
    }

    public function getAllFaktur()
    {
        $this->db->select('outlet');
        $this->db->select('faktur.*');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');
        return $this->db->get('faktur')->result_array();
    }

    public function generateReport()
    {
        $datefrom = $this->input->post('date_from');
        $dateto = $this->input->post('date_to');
        $outletid = $this->input->post('outlet_id');

        $this->db->select('no_faktur');
        $this->db->select('date_created');
        $this->db->select('outlet');
        $this->db->select_sum('total_price');
        $this->db->where('DATE(date_created)>=', $datefrom);
        $this->db->where('DATE(date_created)<=', $dateto);
        if ($outletid) {
            $this->db->where('outlet_id', $outletid);
        }
        $this->db->join('faktur', 'faktur.id = faktur_detail.faktur_id');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');
        $this->db->group_by('no_faktur');
        $this->db->order_by('date_created', 'desc');

        return $this->db->get('faktur_detail')->result_array();
    }

    public function grandTotal()
    {
        $datefrom = $this->input->post('date_from');
        $dateto = $this->input->post('date_to');
        $outletid = $this->input->post('outlet_id');

        $this->db->select_sum('total_price');
        $this->db->where('DATE(date_created)>=', $datefrom);
        $this->db->where('DATE(date_created)<=', $dateto);
        if ($outletid) {
            $this->db->where('outlet_id', $outletid);
        }
        $this->db->join('faktur', 'faktur.id = faktur_detail.faktur_id');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');

        return $this->db->get('faktur_detail')->result_array();
    }
}
