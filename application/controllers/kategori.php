<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "List Data Pelanggan";

        $data['data_kategori'] = $this->kategori_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $data['title'] = "Detail Data Pelanggan";
        $data['data_kategori'] = $this->kategori_model->getById($this->uri->segment('3'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('kategori/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Pelanggan";

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('kategori/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "nama_kategori" => $this->input->post('nama_kategori'),
                "apikey" => "MyKey"
            ];
            $insert = $this->kategori_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('admin');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'Gagal Menambahkan Data!!!');
                redirect('admin');
            }
        }
    }

    public function delete($id_kategori)
    {
        $delete = $this->kategori_model->delete($id_kategori);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus!');
            redirect('admin');
        } else {
            $this->session->set_flashdata('message', 'Gagal Menghapus Data!!!');
            redirect('admin');
        }
    }
}
