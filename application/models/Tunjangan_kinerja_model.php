<?php

use GuzzleHttp\Client;

class Tunjangan_kinerja_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getTukin($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-tukin', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findTukin($keyword1 = null, $keyword2 = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-tukin', [
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

    public function deleteTukin($id)
    {
        $response = $this->_client->request('DELETE', 'data-tukin', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countTukin()
    {
        $response = $this->_client->request('GET', 'count-data-tukin', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
