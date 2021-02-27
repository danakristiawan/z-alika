<?php

use GuzzleHttp\Client;

class Satker_model extends CI_Model
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

    public function getSatker($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-satker', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findSatker($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-satker', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteSatker($id)
    {
        $response = $this->_client->request('DELETE', 'data-satker', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countSatker()
    {
        $response = $this->_client->request('GET', 'count-data-satker', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createSatker()
    {
        $response = $this->_client->request('POST', 'data-satker', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nmsatker' => htmlspecialchars($this->input->post('nmsatker', true)),
                'header1' => htmlspecialchars($this->input->post('header1', true)),
                'header2' => htmlspecialchars($this->input->post('header2', true)),
                'subheader1' => htmlspecialchars($this->input->post('subheader1', true)),
                'subheader2' => htmlspecialchars($this->input->post('subheader2', true)),
                'subheader3' => htmlspecialchars($this->input->post('subheader3', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateSatker($id)
    {
        $response = $this->_client->request('PUT', 'data-satker', [
            'form_params' => [
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'nmsatker' => htmlspecialchars($this->input->post('nmsatker', true)),
                'header1' => htmlspecialchars($this->input->post('header1', true)),
                'header2' => htmlspecialchars($this->input->post('header2', true)),
                'subheader1' => htmlspecialchars($this->input->post('subheader1', true)),
                'subheader2' => htmlspecialchars($this->input->post('subheader2', true)),
                'subheader3' => htmlspecialchars($this->input->post('subheader3', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
