<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cart extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List Data Pelanggan";

        $data['data_cart'] = $this->cart_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('cart/index', $data);
        $this->load->view('templates/footer');
    }


}
