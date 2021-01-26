<?php

use GuzzleHttp\Client;

class Referensi_jabatan_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getRefJabatan($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-jabatan', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findRefJabatan($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-jabatan', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteRefJabatan($id)
    {
        $response = $this->_client->request('DELETE', 'ref-jabatan', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countRefJabatan()
    {
        $response = $this->_client->request('GET', 'count-ref-jabatan', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createRefJabatan()
    {
        $response = $this->_client->request('POST', 'ref-jabatan', [
            'form_params' => [
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateRefJabatan($id)
    {
        $response = $this->_client->request('PUT', 'ref-jabatan', [
            'form_params' => [
                'kode' => htmlspecialchars($this->input->post('kode', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
