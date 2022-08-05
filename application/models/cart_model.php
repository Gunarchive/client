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

    
}
