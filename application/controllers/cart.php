<?php

use phpDocumentor\Reflection\Types\Null_;

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
        if($this->session->userdata('id_pelanggan') == null){
            redirect('auth');
        }else{
            $id_pelanggan = $this->session->userdata('id_pelanggan');
            $data['data_cart'] = $this->cart_model->getAll($id_pelanggan);

            if($data['data_cart'] == null){
                echo '<script>alert("Belu Ada Produk, Silahkan Belanja Dulu Yaa !");window.location="'.base_url().'";</script>';
                // var_dump($data['data_cart']);
            }else{
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu');
                $this->load->view('cart/index', $data);
                $this->load->view('templates/footer');
            }
        }
    }
    public function postcart()
    {

        $data = [
            "id_produk" => $this->uri->segment('3'),
            "id_pelanggan" => $this->session->userdata('id_pelanggan'),
            "quantity" => 1,
            "apikey" => "MyKey"
        ];
        // if($data['id_produk'] == $fromdb[0]['id_produk'])
        $post = $this->cart_model->postcart($data);
        if($post){
            echo '<script>alert("Produk Dimasukan Ke cart!");window.location="'.base_url('cart').'";</script>';
        }else{
            echo '<script>alert("GAGAL Mungkin Anda Belum L!");window.location="'.base_url('cart').'";</script>';
        }
    }

    public function delete()
    {
        $id_produk = $this->uri->segment('3');
        $delete = $this->cart_model->delete($id_produk);
        if ($delete) {
            echo '<script>alert("Produk Di Hapus !");window.location="'.base_url('cart').'";</script>';
        } else {
            echo '<script>alert("GAGAL!");window.location="'.base_url('cart').'";</script>';
        }
    }
}
