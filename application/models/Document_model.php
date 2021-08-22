<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document_model extends CI_Model
{
    public function getAllFaktur()
    {
        $this->db->select('faktur.*');
        $this->db->select('status');
        $this->db->select('outlet');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');
        $this->db->join('status', 'status.id = faktur.status_id');
        $this->db->order_by('date_created', 'desc');
        return $this->db->get('faktur')->result_array();
    }

    public function getAllFakturUser()
    {
        $outletid = $this->session->userdata('outlet_id');

        $this->db->select('faktur.*');
        $this->db->select('status');
        $this->db->select('outlet');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');
        $this->db->join('status', 'status.id = faktur.status_id');
        $this->db->where('outlet_id', $outletid);
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get('faktur')->result_array();
    }

    public function getDetailFaktur($id)
    {
        $this->db->select('*', 'faktur_detail.qty');
        $this->db->join('faktur_detail', 'faktur_detail.faktur_id = faktur.id');
        $this->db->join('product', 'product.id = faktur_detail.product_id');
        $this->db->where('faktur.no_faktur', $id);
        return $this->db->get('faktur')->result_array();
    }

    public function getFakturById($id)
    {
        $this->db->select('*', 'outlet.outlet');
        $this->db->join('outlet', 'outlet.id = faktur.outlet_id');
        $this->db->where('no_faktur', $id);
        return $this->db->get('faktur')->row_array();
    }

    public function getAllDelivery()
    {
        $this->db->select('do.*');
        $this->db->select('status');
        $this->db->select('outlet');
        $this->db->join('outlet', 'outlet.id = do.outlet_id');
        $this->db->join('status', 'status.id = do.status_id');
        $this->db->order_by('date_created', 'desc');
        return $this->db->get('do')->result_array();
    }

    public function getAllDeliveryUser()
    {
        $outletid = $this->session->userdata('outlet_id');

        $this->db->select('do.*');
        $this->db->select('status');
        $this->db->select('outlet');
        $this->db->join('outlet', 'outlet.id = do.outlet_id');
        $this->db->join('status', 'status.id = do.status_id');
        $this->db->where('outlet_id', $outletid);
        $this->db->order_by('date_created', 'DESC');
        return $this->db->get('do')->result_array();
    }

    public function getDetailDelivery($id)
    {
        $this->db->select('*', 'do_detail.qty');
        $this->db->join('do_detail', 'do_detail.do_id = do.id');
        $this->db->join('product', 'product.id = do_detail.product_id');
        $this->db->where('do.no_do', $id);
        return $this->db->get('do')->result_array();
    }

    public function getDeliveryById($id)
    {
        $this->db->select('*', 'outlet.outlet');
        $this->db->join('outlet', 'outlet.id = do.outlet_id');
        $this->db->where('no_do', $id);
        return $this->db->get('do')->row_array();
    }

    public function getAllOutlet()
    {
        $this->db->where_not_in('outlet', 'Kantor Pusat');
        return $this->db->get('outlet')->result_array();
    }

    public function getOutlet()
    {
        $this->db->where('id', $this->session->userdata('outlet_id'));
        return $this->db->get('outlet')->row_array();
    }

    public function add_faktur()
    {
        $this->db->trans_start();
        // insert tabel faktur
        $data = array(
            'no_faktur' => $this->input->post('no_faktur', TRUE),
            'outlet_id' => $this->input->post('outlet_id', TRUE)
        );
        $this->db->insert('faktur', $data);

        // insert tabel detail faktur
        $faktur_id = $this->db->insert_id(); // mengambil id dari tabel faktur yang baru diquery sebelumnya
        $product_id = $this->input->post('product_id', TRUE);
        $qty = $this->input->post('qty', TRUE);
        $price = $this->input->post('price', TRUE);
        $result = array();
        foreach ($product_id as $key => $value) {
            $result[] = array(
                'faktur_id' => $faktur_id,
                'product_id' => $product_id[$key],
                'qty' => $qty[$key],
                'total_price' => $qty[$key] * $price[$key]
            );
        };
        $this->db->insert_batch('faktur_detail', $result); // query multiple insert
        $this->db->trans_complete();
    }

    public function searchProduct($product)
    {
        $this->db->like('product', $product, 'both');
        $this->db->order_by('product', 'ASC');
        $this->db->limit(10);
        return $this->db->get('product')->result();
    }

    public function sumItemFaktur($id)
    {
        $this->db->select('faktur_detail.qty, total_price');
        $this->db->join('faktur', 'faktur.id = faktur_detail.faktur_id');
        $this->db->where('no_faktur', $id);
        $this->db->select_sum('qty');
        $this->db->select_sum('total_price');

        return $this->db->get('faktur_detail')->result_array();
    }

    public function sumItemDelivery($id)
    {
        $this->db->select('do_detail.qty, total_price');
        $this->db->join('do', 'do.id = do_detail.do_id');
        $this->db->where('no_do', $id);
        $this->db->select_sum('qty');
        $this->db->select_sum('total_price');

        return $this->db->get('do_detail')->result_array();
    }

    public function changeStatusId($data = array(), $id)
    {
        $this->db->set($data);
        $this->db->where('no_faktur', $id);
        return $this->db->update('faktur');
    }

    public function changeStatusDoId($data = array(), $id)
    {
        $this->db->set($data);
        $this->db->where('no_do', $id);
        return $this->db->update('do');
    }
    public function getProducts($name, $fieldName)
    {
        if (empty($fieldName)) {
            $fieldName = 'name';
        }

        $name = strtolower(trim($name));

        $this->db->select('*');
        $this->db->where("LOWER($fieldName) LIKE '$name%'");
        $this->db->limit(25);
        return $this->db->get('product')->result_array();
    }
}
