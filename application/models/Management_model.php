<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management_model extends CI_Model
{

    public function getAllUser()
    {
        $this->db->select('*', 'outlet.outlet');
        $this->db->join('outlet', 'user.outlet_id = outlet.id');
        $this->db->where('role_id', '2');
        return $this->db->get('user')->result_array();
    }

    public function getAllOutlet()
    {
        $this->db->where_not_in('outlet', 'Kantor Pusat');
        return $this->db->get('outlet')->result_array();
    }

    public function getUserById($username)
    {
        $this->db->select('user.id,username,name,outlet_id');
        $this->db->select('outlet');
        $this->db->join('outlet', 'user.outlet_id = outlet.id');
        $this->db->where('username', $username);
        return $this->db->get('user')->row_array();
    }

    public function registerUser()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'name' => htmlspecialchars($this->input->post('name', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'outlet_id' => htmlspecialchars($this->input->post('outlet', true)),
        ];

        $this->db->insert('user', $data);
    }

    public function editUser()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'outlet_id' => htmlspecialchars($this->input->post('outlet', true))
        ];

        $this->db->where('username', $this->input->post('username'));
        $this->db->update('user', $data);
    }

    public function deleteUser($username)
    {
        $this->db->where('username', $username);
        $this->db->delete('user');
    }

    public function getAllProduct()
    {
        $this->db->select('product.*');
        $this->db->select('product_type.type');
        $this->db->join('product_type', 'product.type_id = product_type.id');
        $this->db->order_by('type', 'ASC');
        return $this->db->get('product')->result_array();
    }

    public function getProductType()
    {
        return $this->db->get('product_type')->result_array();
    }

    public function addProduct()
    {
        $data = [
            'product' => htmlspecialchars($this->input->post('product')),
            'price' => $this->input->post('price'),
            'type_id' => $this->input->post('type')
        ];

        $this->db->insert('product', $data);
    }

    public function getProductById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('product')->row_array();
    }

    public function editProduct($id)
    {
        $data = [
            'product' => htmlspecialchars($this->input->post('product', true)),
            'price' => ($this->input->post('price')),
            'type_id' => ($this->input->post('type'))
        ];

        $this->db->where('id', $id);
        $this->db->update('product', $data);
    }

    public function deleteProduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
    }

    public function addOutlet()
    {
        $data = [
            'outlet' => htmlspecialchars($this->input->post('outlet', true)),
            'address' => htmlspecialchars($this->input->post('address', true))
        ];

        $this->db->insert('outlet', $data);
    }

    public function getOutletById($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('outlet')->row_array();
    }

    public function editOutlet($id)
    {
        $data = [
            'outlet' => htmlspecialchars($this->input->post('outlet', true)),
            'address' => htmlspecialchars($this->input->post('address', true)),
        ];

        $this->db->where('id', $id);
        $this->db->update('outlet', $data);
    }

    public function deleteOutlet($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('outlet');
    }
}
