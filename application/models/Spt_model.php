<?php

use GuzzleHttp\Client;

class Spt_model extends CI_Model
{
    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => base_uri(),
            'verify' => false,
            'auth' => auth()
        ]);
    }

    public function getTahun()
    {
        return $this->db->query("SELECT DISTINCT tahun FROM data_spt_pegawai ORDER BY tahun DESC")->result_array();
    }

    public function getSpt($tahun = null)
    {
        return $this->db->query("SELECT kdsatker,sts, COUNT(nip) AS jml FROM data_spt_pegawai WHERE tahun='$tahun' GROUP BY kdsatker,sts")->result_array();
    }

    public function getDetailSpt($tahun = null, $kdsatker = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_spt_pegawai WHERE tahun='$tahun' AND kdsatker='$kdsatker' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function findDetailSpt($tahun = null, $kdsatker = null, $keyword = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_spt_pegawai WHERE tahun='$tahun' AND kdsatker='$kdsatker' AND nip LIKE '%$keyword%' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function countSpt($tahun = null, $kdsatker = null)
    {
        return $this->db->query("SELECT * FROM data_spt_pegawai WHERE tahun='$tahun' AND kdsatker='$kdsatker'")->num_rows();
    }
    public function upload($tahun = null, $kdsatker = null)
    {
        $rows = $this->db->query("SELECT * FROM data_spt_pegawai WHERE tahun='$tahun' AND kdsatker='$kdsatker'")->result_array();
        foreach ($rows as $r) {
            $response = $this->_client->request('POST', 'data-spt-pegawai', [
                'form_params' => [
                    'kdsatker' => $r['kdsatker'],
                    'tahun' => $r['tahun'],
                    'nip' => $r['nip'],
                    'npwp' => $r['npwp'],
                    'kdgol' => $r['kdgol'],
                    'alamat' => $r['alamat'],
                    'kdkawin' => $r['kdkawin'],
                    'kdjab' => $r['kdjab'],
                    'nourut' => $r['nourut'],
                    'X-API-KEY' => apiKey()
                ]
            ]);
        }
        $this->db->update('data_spt_pegawai', ['sts' => 1], ['tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function uploadDetail($nip, $tahun, $kdsatker)
    {
        $r = $this->db->get_where('data_spt_pegawai', ['nip' => $nip, 'tahun' => $tahun, 'kdsatker' => $kdsatker])->row_array();
        $response = $this->_client->request('POST', 'data-spt-pegawai', [
            'form_params' => [
                'kdsatker' => $r['kdsatker'],
                'tahun' => $r['tahun'],
                'nip' => $r['nip'],
                'npwp' => $r['npwp'],
                'kdgol' => $r['kdgol'],
                'alamat' => $r['alamat'],
                'kdkawin' => $r['kdkawin'],
                'kdjab' => $r['kdjab'],
                'nourut' => $r['nourut'],
                'X-API-KEY' => apiKey()
            ]
        ]);
        $this->db->update('data_spt_pegawai', ['sts' => 1], ['nip' => $nip, 'tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
