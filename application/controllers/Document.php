<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Faktur Penjualan';
        $data['user'] = $this->Auth_model->getUserData();
        $data['faktur'] = $this->Document_model->getAllFaktur();
        $data['faktur_user'] = $this->Document_model->getAllFakturUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/index', $data);
        $this->load->view('templates/footer');
    }

    public function detailFaktur($id)
    {
        $data['title'] = 'Faktur Penjualan';
        $data['user'] = $this->Auth_model->getUserData();
        $data['faktur'] = $this->Document_model->getFakturById($id);
        $data['detail_faktur'] = $this->Document_model->getDetailFaktur($id);
        $data['sum_item'] = $this->Document_model->sumItemFaktur($id);
        // $data['sum_total'] = $this->Document_model->sumTotal($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/detail_faktur', $data);
        $this->load->view('templates/footer');
    }

    public function createFaktur()
    {
        $data['title'] = 'Faktur Penjualan';
        $data['user'] = $this->Auth_model->getUserData();
        $data['outlet'] = $this->Document_model->getAllOutlet();
        $data['outlet_user'] = $this->Document_model->getOutlet();

        $rules = $this->Rule_model->create_new();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('document/create_faktur', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Document_model->add_faktur();
            $this->session->set_flashdata('message', 'created!');
            redirect('document');
        }
    }

    public function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->Document_model->searchProduct($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label' => $row->product,
                        'product_id' => $row->id,
                        'price' => $row->price,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function getProducts()
    {
        $name = $this->input->get('name');
        $fieldName = $this->input->get('fieldName');

        $product = $this->Document_model->getProducts($name, $fieldName);
        echo json_encode($product);
        exit;
    }

    public function delivery()
    {
        $data['title'] = 'Delivery Order';
        $data['user'] = $this->Auth_model->getUserData();
        $data['delivery'] = $this->Document_model->getAllDelivery();
        $data['delivery_user'] = $this->Document_model->getAllDeliveryUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/delivery', $data);
        $this->load->view('templates/footer');
    }

    public function detailDelivery($id)
    {
        $data['title'] = 'Delivery Order';
        $data['user'] = $this->Auth_model->getUserData();
        $data['delivery'] = $this->Document_model->getDeliveryById($id);
        $data['detail_delivery'] = $this->Document_model->getDetailDelivery($id);
        $data['sum_item'] = $this->Document_model->sumItemDelivery($id);
        // $data['sum_total'] = $this->Document_model->sumTotal($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('document/detail_delivery', $data);
        $this->load->view('templates/footer');
    }

    public function createDelivery()
    {
        $data['title'] = 'Delivery Order';
        $data['user'] = $this->Auth_model->getUserData();
        $data['outlet'] = $this->Document_model->getAllOutlet();
        $data['outlet_user'] = $this->Document_model->getOutlet();

        $rules = $this->Rule_model->create_new();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('document/create_delivery', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Document_model->add_delivery();
            $this->session->set_flashdata('message', 'created!');
            redirect('document/delivery');
        }
    }

    public function changeStatus1($id = 0)
    {
        $change = $this->Document_model->changeStatusId(array(
            'status_id' => 2
        ), $id);
        if ($change) {
            redirect('document/detailfaktur/' . $id);
        } else {
            echo 'failed to change status!';
        }
    }

    public function changeStatus2($id = 0)
    {
        $change = $this->Document_model->changeStatusId(array(
            'status_id' => 3
        ), $id);
        if ($change) {
            redirect('document/detailfaktur/' . $id);
        } else {
            echo 'failed to change status!';
        }
    }


    public function changeStatusdo1($id = 0)
    {
        $change = $this->Document_model->changeStatusDoId(array(
            'status_id' => 2
        ), $id);
        if ($change) {
            redirect('document/detaildelivery/' . $id);
        } else {
            echo 'failed to change status!';
        }
    }

    public function changeStatusdo2($id = 0)
    {
        $change = $this->Document_model->changeStatusDoId(array(
            'status_id' => 3
        ), $id);
        if ($change) {
            redirect('document/detaildelivery/' . $id);
        } else {
            echo 'failed to change status!';
        }
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get_where('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }
}
