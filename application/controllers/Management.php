<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'User Account';
        $data['user'] = $this->Auth_model->getUserData();
        $data['allUser'] = $this->Management_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('management/index', $data);
        $this->load->view('templates/footer');
    }

    public function registration()
    {
        $data['title'] = 'User Account';
        $data['user'] = $this->Auth_model->getUserData();
        $data['outlet'] = $this->Management_model->getAllOutlet();

        $rules = $this->Rule_model->registration();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/add_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->registerUser();
            $this->session->set_flashdata('message', 'added!');
            redirect('management');
        }
    }

    public function edit_user($username)
    {
        $data['title'] = 'User Account';
        $data['user'] = $this->Auth_model->getUserData();
        $data['outlet'] = $this->Management_model->getAllOutlet();
        $data['user_data'] = $this->Management_model->getUserById($username);

        $rules = $this->Rule_model->edit_user();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->editUser();
            $this->session->set_flashdata('message', 'updated!');
            redirect('management');
        }
    }

    public function delete_user($username)
    {
        $this->Management_model->deleteUser($username);
        $this->session->set_flashdata('message', 'deleted!');
        redirect('management');
    }

    public function product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->Auth_model->getUserData();
        $data['allProduct'] = $this->Management_model->getAllProduct();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('management/product', $data);
        $this->load->view('templates/footer');
    }

    public function add_product()
    {
        $data['title'] = 'Product';
        $data['user'] = $this->Auth_model->getUserData();
        $data['type'] = $this->Management_model->getProductType();

        $rules = $this->Rule_model->add_product();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/add_product', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->addProduct();
            $this->session->set_flashdata('message', 'added!');
            redirect('management/product');
        }
    }

    public function edit_product($id)
    {
        $data['title'] = 'Product';
        $data['user'] = $this->Auth_model->getUserData();
        $data['type'] = $this->Management_model->getProductType();
        $data['product_data'] = $this->Management_model->getProductById($id);

        $rules = $this->Rule_model->edit_product();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/edit_product', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->editProduct($id);
            $this->session->set_flashdata('message', 'updated!');
            redirect('management/product');
        }
    }

    public function delete_product($id)
    {
        $this->Management_model->deleteProduct($id);
        $this->session->set_flashdata('message', 'deleted!');
        redirect('management/product');
    }

    public function outlet()
    {
        $data['title'] = 'Outlet';
        $data['user'] = $this->Auth_model->getUserData();
        $data['allOutlet'] = $this->Management_model->getAllOutlet();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('management/outlet', $data);
        $this->load->view('templates/footer');
    }

    public function add_outlet()
    {
        $data['title'] = 'Outlet';
        $data['user'] = $this->Auth_model->getUserData();

        $rules = $this->Rule_model->add_outlet();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/add_outlet', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->addOutlet();
            $this->session->set_flashdata('message', 'added!');
            redirect('management/outlet');
        }
    }

    public function edit_outlet($id)
    {
        $data['title'] = 'Outlet';
        $data['user'] = $this->Auth_model->getUserData();
        $data['outlet_data'] = $this->Management_model->getOutletById($id);

        $rules = $this->Rule_model->edit_outlet();
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('management/edit_outlet', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Management_model->editOutlet($id);
            $this->session->set_flashdata('message', 'updated!');
            redirect('management/outlet');
        }
    }

    public function delete_outlet($id)
    {
        $this->Management_model->deleteOutlet($id);
        $this->session->set_flashdata('message', 'deleted!');
        redirect('management/outlet');
    }
}
