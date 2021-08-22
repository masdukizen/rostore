<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    public function getUserLogin()
    {
        $username = $this->input->post('username');
        return $this->db->get_where('user', ['username' => $username])->row_array();
    }

    public function passwordVerify()
    {
        $user = $this->getUserLogin();
        $password = $this->input->post('password');

        return password_verify($password, $user['password']);
    }

    public function setUserData()
    {
        $user = $this->getUserLogin();
        $data = [
            'username' => $user['username'],
            'role_id' => $user['role_id'],
            'outlet_id' => $user['outlet_id']
        ];

        return $this->session->set_userdata($data);
    }

    public function getUserData()
    {
        $user = $this->session->userdata('username');

        $this->db->select('name, image, outlet_id, role_id, outlet, address, role');
        $this->db->join('outlet', 'outlet.id = user.outlet_id');
        $this->db->join('user_role', 'user_role.id = user.role_id');
        $this->db->where('username', $user);
        return $this->db->get('user')->row_array();
    }
}
