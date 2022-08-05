<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class cart_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/pemograman-3/Tugas_Besar/restServer/api/cart',
            'auth'  => ['admin', '1234']        ]);
    }

    public function getAll($id)
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'apikey' => 'MyKey',
                'id_pelanggan' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function postcart($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false, //Menghilangkan segala jenis http errors
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function delete($id_produk)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false, //Menghilangkan segala jenis http errors
                'apikey' => 'MyKey',
                'id_produk' => $id_produk
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
