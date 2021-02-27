<?php

use GuzzleHttp\Client;

class Lain_model extends CI_Model
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

    public function getLain($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-lain', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findLain($keyword1 = null, $keyword2 = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-lain', [
            'query' => [
                'keyword1' => $keyword1,
                'keyword2' => $keyword2,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteLain($id)
    {
        $response = $this->_client->request('DELETE', 'data-lain', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countLain()
    {
        $response = $this->_client->request('GET', 'count-data-lain', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createLain()
    {
        $response = $this->_client->request('POST', 'data-lain', [
            'form_params' => [
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'bruto' => htmlspecialchars($this->input->post('bruto', true)),
                'pph' => htmlspecialchars($this->input->post('pph', true)),
                'netto' => htmlspecialchars($this->input->post('netto', true)),
                'jenis' => htmlspecialchars($this->input->post('jenis', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'tanggal' => strtotime(htmlspecialchars($this->input->post('tanggal', true))),
                'nospm' => htmlspecialchars($this->input->post('nospm', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateLain($id)
    {
        $response = $this->_client->request('PUT', 'data-lain', [
            'form_params' => [
                'bulan' => htmlspecialchars($this->input->post('bulan', true)),
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'bruto' => htmlspecialchars($this->input->post('bruto', true)),
                'pph' => htmlspecialchars($this->input->post('pph', true)),
                'netto' => htmlspecialchars($this->input->post('netto', true)),
                'jenis' => htmlspecialchars($this->input->post('jenis', true)),
                'uraian' => htmlspecialchars($this->input->post('uraian', true)),
                'tanggal' => strtotime(htmlspecialchars($this->input->post('tanggal', true))),
                'nospm' => htmlspecialchars($this->input->post('nospm', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
