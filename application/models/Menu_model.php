<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenu()
    {
        $role_id = $this->session->userdata('role_id');

        $this->db->select('user_menu.id,menu');
        $this->db->join('user_access_menu', 'user_menu.id = user_access_menu.menu_id');
        $this->db->where('user_access_menu.role_id', $role_id);
        $this->db->order_by('user_access_menu.menu_id', 'ASC');
        return $this->db->get('user_menu')->result_array();
    }
}
