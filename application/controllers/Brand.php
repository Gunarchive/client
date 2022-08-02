<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Brand extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Brand_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List Data Brand";

        $data['data_brand'] = $this->Brand_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('brand/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_brand)
    {
        $data['title'] = "Detail Data Brand";

        $data['data_brand'] = $this->Brand_model->getById($id_brand);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('brand/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Brand";

        $this->form_validation->set_rules('id_brand', 'ID Brand', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_brand', 'Brand', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('asal', 'Asal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('brand/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_brand" => $this->input->post('id_brand'),
                "nama_brand" => $this->input->post('nama_brand'),
                "jenis" => $this->input->post('jenis'),
                "asal" => $this->input->post('asal'),
                "kunci" => "root"
            ];
            $insert = $this->Brand_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('Brand');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('Brand');
            } else {
                $this->session->set_flashdata('message', 'Gagal Menambahkan Data!!!');
                redirect('Brand');
            }
        }
    }

    public function edit($id_brand)
    {
        $data['title'] = "Edit Data Brand";
        $data['data_brand'] = $this->Brand_model->getById($id_brand);

        $this->form_validation->set_rules('id_brand', 'ID Brand', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_brand', 'Brand', 'trim|required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
        $this->form_validation->set_rules('asal', 'Asal', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('brand/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_brand" => $this->input->post('id_brand'),
                "nama_brand" => $this->input->post('nama_brand'),
                "jenis" => $this->input->post('jenis'),
                "asal" => $this->input->post('asal'),
                "kunci" => "root"
            ];
            $update = $this->Brand_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Diubah!');
                redirect('Brand');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Kesalahan!');
                redirect('Brand');
            } else {
                $this->session->set_flashdata('message', 'Gagal Mengubah Data!!!');
                redirect('Brand');
            }
        }
    }

    public function delete($id_brand)
    {
        $delete = $this->Brand_model->delete($id_brand);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus!');
            redirect('Brand');
        } else {
            $this->session->set_flashdata('message', 'Gagal Menghapus Data!!!');
            redirect('Brand');
        }
    }
}
