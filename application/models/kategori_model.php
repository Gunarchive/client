<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class kategori_model extends CI_Model
{

    private $_guzzle;

    public function __construct()
    {
        parent::__construct();
        $this->_guzzle = new Client([
            'base_uri' => 'http://localhost/Tugas_besar_pemg/restServer/API/kategori',
            'auth'  => ['admin', '1234']        ]);
    }

    public function getAll()
    {
        $response = $this->_guzzle->request('GET', '', [
            'query' => [
                'apikey' => 'MyKey'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function getById($id_kategori)
    {
        $response = $this->_guzzle->request('GET', 'kategori/kategoriID', [
            'query' => [
                'apikey' => 'MyKey',
                'id_kategori' => $id_kategori
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result['data'];
    }

    public function save($data)
    {
        $response = $this->_guzzle->request('POST', '', [
            'http_errors' => false, //Menghilangkan segala jenis http errors
            'form_params' => $data
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }

    public function delete($id_kategori)
    {
        $response = $this->_guzzle->request('DELETE', '', [
            'form_params' => [
                'http_errors' => false, //Menghilangkan segala jenis http errors
                'apikey' => 'MyKey',
                'id_kategori' => $id_kategori
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), TRUE);

        return $result;
    }
}
