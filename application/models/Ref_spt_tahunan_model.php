<?php

use GuzzleHttp\Client;

class Ref_spt_tahunan_model extends CI_Model
{
    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'auth' => auth()
        ]);
    }

    public function getRefSptTahunan($id = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-spt-tahunan', [
            'query' => [
                $id === null ?: 'id' => $id,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function findRefSptTahunan($keyword = null, $limit = 0, $offset = 0)
    {
        $response = $this->_client->request('GET', 'ref-spt-tahunan', [
            'query' => [
                'keyword' => $keyword,
                'limit' => $limit,
                'offset' => $offset,
                'X-API-KEY' => apiKey()
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteRefSptTahunan($id)
    {
        $response = $this->_client->request('DELETE', 'ref-spt-tahunan', [
            'form_params' => [
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function countRefSptTahunan()
    {
        $response = $this->_client->request('GET', 'count-ref-spt-tahunan', [
            'query' => [
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function createRefSptTahunan()
    {
        $response = $this->_client->request('POST', 'ref-spt-tahunan', [
            'form_params' => [
                'tahun' => htmlspecialchars($this->input->post('tahun')),
                'ptkp_wp' => htmlspecialchars($this->input->post('ptkp_wp')),
                'ptkp_istri' => htmlspecialchars($this->input->post('ptkp_istri')),
                'ptkp_anak' => htmlspecialchars($this->input->post('ptkp_anak')),
                'iuran_pensiun' => htmlspecialchars($this->input->post('iuran_pensiun')),
                'biaya_jabatan' => htmlspecialchars($this->input->post('biaya_jabatan')),
                'biaya_jabatan_maks' => htmlspecialchars($this->input->post('biaya_jabatan_maks')),
                'pph_tarif_1' => htmlspecialchars($this->input->post('pph_tarif_1')),
                'pph_tarif_2' => htmlspecialchars($this->input->post('pph_tarif_2')),
                'pph_tarif_3' => htmlspecialchars($this->input->post('pph_tarif_3')),
                'pph_tarif_4' => htmlspecialchars($this->input->post('pph_tarif_4')),
                'pph_limit_1' => htmlspecialchars($this->input->post('pph_limit_1')),
                'pph_limit_2' => htmlspecialchars($this->input->post('pph_limit_2')),
                'pph_limit_3' => htmlspecialchars($this->input->post('pph_limit_3')),
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function updateRefSptTahunan($id)
    {
        $response = $this->_client->request('PUT', 'ref-spt-tahunan', [
            'form_params' => [
                'tahun' => htmlspecialchars($this->input->post('tahun')),
                'ptkp_wp' => htmlspecialchars($this->input->post('ptkp_wp')),
                'ptkp_istri' => htmlspecialchars($this->input->post('ptkp_istri')),
                'ptkp_anak' => htmlspecialchars($this->input->post('ptkp_anak')),
                'iuran_pensiun' => htmlspecialchars($this->input->post('iuran_pensiun')),
                'biaya_jabatan' => htmlspecialchars($this->input->post('biaya_jabatan')),
                'biaya_jabatan_maks' => htmlspecialchars($this->input->post('biaya_jabatan_maks')),
                'pph_tarif_1' => htmlspecialchars($this->input->post('pph_tarif_1')),
                'pph_tarif_2' => htmlspecialchars($this->input->post('pph_tarif_2')),
                'pph_tarif_3' => htmlspecialchars($this->input->post('pph_tarif_3')),
                'pph_tarif_4' => htmlspecialchars($this->input->post('pph_tarif_4')),
                'pph_limit_1' => htmlspecialchars($this->input->post('pph_limit_1')),
                'pph_limit_2' => htmlspecialchars($this->input->post('pph_limit_2')),
                'pph_limit_3' => htmlspecialchars($this->input->post('pph_limit_3')),
                'id' => $id,
                'X-API-KEY' => apiKey()
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
