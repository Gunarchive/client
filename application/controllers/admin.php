<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
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
        $data['title'] = "List Data admin";

        $data['data_produk'] = $this->produk_model->getAll();
        $data['data_kategori'] = $this->kategori_model->getAll();



        $this->load->view('admin/index', $data);
    }

    public function detail($id_produk)
    {
        $data['title'] = "Detail Data admin";

        $data['data_produk'] = $this->produk_model->getById($id_produk);        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('admin/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add_produk()
    {
        $data['title'] = "Tambah Data Sepatu";
        $data['data_kategori'] = $this->kategori_model->getAll();

        $this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
        $this->form_validation->set_rules('harga_produk', 'harga produk', 'trim|required|numeric');
        $this->form_validation->set_rules('berat_produk', 'berat produk', 'trim|required|numeric');
        $this->form_validation->set_rules('foto_produk', 'foto_produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi_produk', 'deskripsi produk', 'trim|required');
        $this->form_validation->set_rules('stok_produk', 'stok_produk', 'trim|required|numeric');
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('admin/add_produk', $data);
        $this->load->view('templates/footer');

        if ($this->input->post('submit')) {
            $data = [
                "nama_produk" => $this->input->post('nama_produk'),
                "harga_produk" => $this->input->post('harga_produk'),
                "berat_produk" => $this->input->post('berat_produk'),
                "foto_produk" => $this->input->post('foto_produk'),
                "deskripsi_produk" => $this->input->post('deskripsi_produk'),
                "stok_produk" => $this->input->post('stok_produk'),
                "id_kategori" => $this->input->post('id_kategori'),
                "apikey" => "MyKey"
            ];
            $insert = $this->produk_model->save($data);
            if ($insert['status'] === 200) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('admin');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'Gagal Menambahkan Data!!!');
                redirect('admin');
            }
            
        } else {
           
        }
    }

    public function edit_produk()
    {
        $data['title'] = "Tambah Data Sepatu";
        $data['data_kategori'] = $this->kategori_model->getAll();
        $data['data_produk'] = $this->produk_model->getById($this->uri->segment('3'));

        $this->form_validation->set_rules('nama_produk', 'nama produk', 'trim|required');
        $this->form_validation->set_rules('harga_produk', 'harga produk', 'trim|required|numeric');
        $this->form_validation->set_rules('berat_produk', 'berat produk', 'trim|required|numeric');
        $this->form_validation->set_rules('foto_produk', 'foto_produk', 'trim|required');
        $this->form_validation->set_rules('deskripsi_produk', 'deskripsi produk', 'trim|required');
        $this->form_validation->set_rules('stok_produk', 'stok_produk', 'trim|required|numeric');
        $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('templates/footer');

        if ($this->input->post('submit')) {
            $data = [
                "id_produk" => $this->uri->segment('3'),
                "nama_produk" => $this->input->post('nama_produk'),
                "harga_produk" => $this->input->post('harga_produk'),
                "berat_produk" => $this->input->post('berat_produk'),
                "foto_produk" => $this->input->post('foto_produk'),
                "deskripsi_produk" => $this->input->post('deskripsi_produk'),
                "stok_produk" => $this->input->post('stok_produk'),
                "id_kategori" => $this->input->post('id_kategori'),
                "apikey" => "MyKey"
            ];
            $update = $this->produk_model->update($data);
            if ($update) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('admin');
            } elseif ($update['status'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('admin');
            } else {
                $this->session->set_flashdata('message', 'Gagal Menambahkan Data!!!');
                // redirect('admin');
            }
            
        } else {
           
        }
    }

    public function add_kategori()
    {
        $data['title'] = "Tambah Data kategori";

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('admin/add_kategori', $data);
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

    public function edit($id_pemasok)
    {
        $data['title'] = "Edit Data Pemasok";
        $data['data_pemasok'] = $this->Pemasok_model->getById($id_pemasok);

        $this->form_validation->set_rules('id_pemasok', 'ID Pemasok', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pemasok', 'Pemasok', 'trim|required');
        $this->form_validation->set_rules('alamat_pemasok', 'Alamat Pemasok', 'trim|required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('pemasok/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                "id_pemasok" => $this->input->post('id_pemasok'),
                "nama_pemasok" => $this->input->post('nama_pemasok'),
                "alamat_pemasok" => $this->input->post('alamat_pemasok'),
                "no_hp" => $this->input->post('no_hp'),
                "kunci" => "root"
            ];
            $update = $this->Pemasok_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Diubah!');
                redirect('Pemasok');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Kesalahan!');
                redirect('Pemasok');
            } else {
                $this->session->set_flashdata('message', 'Gagal Mengubah Data!!!');
                redirect('Pemasok');
            }
        }
    }

    public function delete_produk($id_produk)
    {
        $delete = $this->produk_model->delete($id_produk);
        if ($delete['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus!');
            redirect('admin');
        } else {
            $this->session->set_flashdata('message', 'Gagal Menghapus Data!!!');
            redirect('admin');
        }
    }


    public function delete_kategori($id_kategori)
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

