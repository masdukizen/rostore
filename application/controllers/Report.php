<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Sales Report';
        $data['user'] = $this->Auth_model->getUserData();
        $this->load->model('Report_model');
        $data['outlet'] = $this->Report_model->getAllOutlet();
        $data['outlet_user'] = $this->Report_model->getOutletById();
        $data['faktur'] = $this->Report_model->getAllFaktur();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('report/index', $data);
        $this->load->view('templates/footer');
    }

    public function generate()
    {
        $this->load->model('Report_model');
        $data['tes'] = $this->Report_model->generateReport();
        $data['grandtotal'] = $this->Report_model->grandTotal();
        // $data['sum'] = $this->Report_model->sumFaktur();
        $this->load->view('report/print', $data);
    }
}
