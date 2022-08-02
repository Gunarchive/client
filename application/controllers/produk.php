<?php
defined('BASEPATH') or exit('No direct script access allowed');

class produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->library('form_validation');
        $this->load->model('kategori_model');

    }

    public function index()
    {
        $data['title'] = "List Data Sepatu";
        $data['data_produk'] = $this->produk_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('produk/index', $data);

        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $data['title'] = "Detail Data Sepatu";

        $data['data_produk'] = $this->produk_model->getById($this->uri->segment('3'));

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('produk/detail', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_sepatu)
    {
        $data['title'] = "Edit Data Sepatu";
        $data['data_sepatu'] = $this->produk_model->getById($id_sepatu);

        $this->form_validation->set_rules('id_produk', 'ID produk', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
        $this->form_validation->set_rules('harga_produk', 'harga produk', 'trim|required|numeric');
        $this->form_validation->set_rules('berat_produk', 'berat_produk', 'trim|required|numeric');
        $this->form_validation->set_rules('foto_produk', 'foto_produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi_produk', 'deskripsi produk', 'trim|required');
        $this->form_validation->set_rules('stok_produk', 'stok_produk', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('sepatu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_produk" => $this->input->post('id_produk'),
                "nama_produk" => $this->input->post('nama_produk'),
                "harga_produk" => $this->input->post('harga_produk'),
                "berat_produk" => $this->input->post('berat_produk'),
                "foto_produk" => $this->input->post('foto_produk'),
                "deskripsi_produk" => $this->input->post('deskripsi_produk'),
                "stok_produk" => $this->input->post('stok_produk'),
                "nama_kategori" => $this->input->post('nama_kategori'),
                "apikey" => "MyKey"
            ];
            $update = $this->produk_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Diubah!');
                redirect('Sepatu');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Kesalahan!');
                redirect('Sepatu');
            } else {
                $this->session->set_flashdata('message', 'Gagal Mengubah Data!!!');
                redirect('Sepatu');
            }
        }
    }

    public function delete($id_sepatu)
    {
        $delete = $this->produk_model->delete($id_sepatu);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus!');
            redirect('Sepatu');
        } else {
            $this->session->set_flashdata('message', 'Gagal Menghapus Data!!!');
            redirect('Sepatu');
        }
    }
}
