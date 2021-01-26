<?php

use GuzzleHttp\Client;

class Profil_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getProfil($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-profil', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findProfil($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'data-profil', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteProfil($id)
    {
        $response = $this->_client->request('DELETE', 'data-profil', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countProfil()
    {
        $response = $this->_client->request('GET', 'count-data-profil', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createProfil()
    {
        $response = $this->_client->request('POST', 'data-profil', [
            'form_params' => [
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'no_skp' => htmlspecialchars($this->input->post('no_skp', true)),
                'nama_ttd_skp' => htmlspecialchars($this->input->post('nama_ttd_skp', true)),
                'nip_ttd_skp' => htmlspecialchars($this->input->post('nip_ttd_skp', true)),
                'jab_ttd_skp' => htmlspecialchars($this->input->post('jab_ttd_skp', true)),
                'nama_ttd_kp4' => htmlspecialchars($this->input->post('nama_ttd_kp4', true)),
                'nip_ttd_kp4' => htmlspecialchars($this->input->post('nip_ttd_kp4', true)),
                'jab_ttd_kp4' => htmlspecialchars($this->input->post('jab_ttd_kp4', true)),
                'npwp_bendahara' => htmlspecialchars($this->input->post('npwp_bendahara', true)),
                'nama_bendahara' => htmlspecialchars($this->input->post('nama_bendahara', true)),
                'nip_bendahara' => htmlspecialchars($this->input->post('nip_bendahara', true)),
                'tgl_spt' => strtotime(htmlspecialchars($this->input->post('tgl_spt', true))),
                'file' => htmlspecialchars($this->input->post('file', true)),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateProfil($id)
    {
        $response = $this->_client->request('PUT', 'data-profil', [
            'form_params' => [
                'tahun' => htmlspecialchars($this->input->post('tahun', true)),
                'kdsatker' => htmlspecialchars($this->input->post('kdsatker', true)),
                'no_skp' => htmlspecialchars($this->input->post('no_skp', true)),
                'nama_ttd_skp' => htmlspecialchars($this->input->post('nama_ttd_skp', true)),
                'nip_ttd_skp' => htmlspecialchars($this->input->post('nip_ttd_skp', true)),
                'jab_ttd_skp' => htmlspecialchars($this->input->post('jab_ttd_skp', true)),
                'nama_ttd_kp4' => htmlspecialchars($this->input->post('nama_ttd_kp4', true)),
                'nip_ttd_kp4' => htmlspecialchars($this->input->post('nip_ttd_kp4', true)),
                'jab_ttd_kp4' => htmlspecialchars($this->input->post('jab_ttd_kp4', true)),
                'npwp_bendahara' => htmlspecialchars($this->input->post('npwp_bendahara', true)),
                'nama_bendahara' => htmlspecialchars($this->input->post('nama_bendahara', true)),
                'nip_bendahara' => htmlspecialchars($this->input->post('nip_bendahara', true)),
                'tgl_spt' => strtotime(htmlspecialchars($this->input->post('tgl_spt', true))),
                'file' => htmlspecialchars($this->input->post('file', true)),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
