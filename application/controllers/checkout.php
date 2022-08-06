<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cart_model');
        $this->load->model('Checkout_Model');
        $this->load->model('Ongkir_Model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('id_pelanggan') == null){
            redirect('auth');
        }else{
            $id_pelanggan = $this->session->userdata('id_pelanggan');
            $data['data_cart'] = $this->cart_model->getAll($id_pelanggan);
            $data['data_cart_stat'] = $this->cart_model->getStat($id_pelanggan);
            $data['data_checkout'] = $this->Checkout_Model->getcheckoutID($id_pelanggan);
            $data['data_ongkir'] = $this->Ongkir_Model->getongkir();

            // if($data['data_checkout'] != null){
            //     echo '<script>alert("Belu Ada Produk, Silahkan Belanja Dulu Yaa !");window.location="'.base_url().'";</script>';
            //     // var_dump($data['data_cart']);
            // }else{
                $this->load->view('checkout/index', $data);
            // }
        }
    }

    public function postcheckout()
    {
        if($this->input->post('submit')){
            $data = [
                "id_pelanggan" => $this->session->userdata('id_pelanggan'),
                'tanggal_pembelian' => $this->input->post('date'),
                'id_ongkir' => $this->input->post('id_ongkir'),
                'total_pembelian' => $this->input->post('total_harga'),
                'alamat_rumah' => $this->input->post('alamat'),
                'status' => 'proses',
                "apikey" => "MyKey"
            ];
            // if($data['id_produk'] == $fromdb[0]['id_produk'])
            $post = $this->Checkout_Model->postcheckout($data);
            if($post){
                $data = [
                    "status" => 'checkout',
                    "id_pelanggan" => $this->session->userdata('id_pelanggan'),
                    "apikey" => "MyKey"
                ];
                $update = $this->cart_model->update($data);
                if($update){
                    echo '<script>alert("Pemeblian Diproses !");window.location="'.base_url('').'";</script>';
                }
            }else{
                // echo '<script>alert("GAGAL Mungkin Anda Belum L!");window.location="'.base_url('cart').'";</script>';
                var_dump($data);
            }
        }else{
            echo 'gagal';
        }
    }
}
