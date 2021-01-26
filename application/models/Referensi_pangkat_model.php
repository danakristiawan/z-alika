<?php

use GuzzleHttp\Client;

class Referensi_pangkat_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getRefPangkat($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-pangkat', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findRefPangkat($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-pangkat', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteRefPangkat($id)
    {
        $response = $this->_client->request('DELETE', 'ref-pangkat', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countRefPangkat()
    {
        $response = $this->_client->request('GET', 'count-ref-pangkat', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createRefPangkat()
    {
        $response = $this->_client->request('POST', 'ref-pangkat', [
            'form_params' => [
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'nmgol' => htmlspecialchars($this->input->post('nmgol', true)),
                'kdgapok' => htmlspecialchars($this->input->post('kdgapok', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateRefPangkat($id)
    {
        $response = $this->_client->request('PUT', 'ref-pangkat', [
            'form_params' => [
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'nmgol' => htmlspecialchars($this->input->post('nmgol', true)),
                'kdgapok' => htmlspecialchars($this->input->post('kdgapok', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
