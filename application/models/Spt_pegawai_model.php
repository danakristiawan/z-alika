<?php

use GuzzleHttp\Client;

class Spt_pegawai_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'verify' => false,
            'auth' => auth()
        ]);
    }

    public function getSptPegawai($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-spt-pegawai', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findSptPegawai($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-spt-pegawai', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteSptPegawai($id)
    {
        $response = $this->_client->request('DELETE', 'data-spt-pegawai', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countSptPegawai()
    {
        $response = $this->_client->request('GET', 'count-data-spt-pegawai', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createSptPegawai()
    {
        $response = $this->_client->request('POST', 'data-spt-pegawai', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'npwp' => htmlspecialchars($this->input->post('npwp', true)),
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kdkawin' => htmlspecialchars($this->input->post('kdkawin', true)),
                'kdjab' => htmlspecialchars($this->input->post('kdjab', true)),
                'nourut' => htmlspecialchars($this->input->post('nourut', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateSptPegawai($id)
    {
        $response = $this->_client->request('PUT', 'data-spt-pegawai', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'npwp' => htmlspecialchars($this->input->post('npwp', true)),
                'kdgol' => htmlspecialchars($this->input->post('kdgol', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kdkawin' => htmlspecialchars($this->input->post('kdkawin', true)),
                'kdjab' => htmlspecialchars($this->input->post('kdjab', true)),
                'nourut' => htmlspecialchars($this->input->post('nourut', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
