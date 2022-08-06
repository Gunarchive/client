<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Checkout_Model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/pemograman-3/Tugas_Besar/restServer/api/checkout',
            'auth'  => ['admin', '1234']        ]);
    }

    public function getcheckout($id)
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

    public function getcheckoutID($id)
    {
        $response = $this->_guzzle->request('GET', 'checkout/ID', [
            'query' => [
                'apikey' => 'MyKey',
                'id_checkout' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function postcheckout($data)
    {
        
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false, //Menghilangkan segala jenis http errors
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function update($data)
    {
        $response = $this->_guzzle->request('PUT', '', [
            'http_errors' => false, //Menghilangkan segala jenis http errors
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}