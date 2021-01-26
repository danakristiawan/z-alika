<?php

use GuzzleHttp\Client;

class User_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getUser($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'user', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findUser($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'user', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteUser($id)
    {
        $response = $this->_client->request('DELETE', 'user', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countUser()
    {
        $response = $this->_client->request('GET', 'count-user', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createUser()
    {
        $response = $this->_client->request('POST', 'user', [
            'form_params' => [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT),
                'is_active' => htmlspecialchars($this->input->post('is_active', true)),
                'date_created' => strtotime(htmlspecialchars($this->input->post('date_created', true))),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateUser($id)
    {
        $response = $this->_client->request('PUT', 'user', [
            'form_params' => [
                'nip' => htmlspecialchars($this->input->post('nip', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT),
                'is_active' => htmlspecialchars($this->input->post('is_active', true)),
                'date_created' => strtotime(htmlspecialchars($this->input->post('date_created', true))),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
