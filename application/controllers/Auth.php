<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_Model');
    }

    function index()
    {
        $this->load->view('login');
    }

    function proses_auth()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $user = $this->Login_Model->get_data($username, $password);
        if ($user->num_rows() == 1) {
            foreach ($user->result() as $data) {
                $user_data = array(
                   'email' => $data->email_pelanggan,
                   'nama_pelanggan' => $data->nama_pelanggan,
                   'id_pelanggan' => $data->id_pelanggan
                );
                $this->session->set_userdata($user_data);
            }
                redirect('produk');
        } else {
            $text = 'Username dan Password Salah';
            echo $this->session->set_flashdata('msg', $text);
            redirect('auth');
            }
    }
    function logout()
    {
        $_SESSION = array();
        session_destroy();
        echo '<script>alert("Belu Ada Produk, Silahkan Belanja Dulu Yaa !");window.location="'.base_url().'";</script>';
    }
}