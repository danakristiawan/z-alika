<?php

use GuzzleHttp\Client;

class Unit_pegawai_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getUnitPegawai($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-unit-pegawai', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findUnitPegawai($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-unit-pegawai', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteUnitPegawai($id)
    {
        $response = $this->_client->request('DELETE', 'data-unit-pegawai', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countUnitPegawai()
    {
        $response = $this->_client->request('GET', 'count-data-unit-pegawai', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createUnitPegawai()
    {
        $response = $this->_client->request('POST', 'data-unit-pegawai', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateUnitPegawai($id)
    {
        $response = $this->_client->request('PUT', 'data-unit-pegawai', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
