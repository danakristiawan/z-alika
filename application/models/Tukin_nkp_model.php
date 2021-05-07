<?php

use GuzzleHttp\Client;

class Tukin_nkp_model extends CI_Model
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
        return $this->db->query("SELECT DISTINCT tahun FROM data_nkp ORDER BY tahun DESC")->result_array();
    }

    public function getBulan($tahun = null)
    {
        return $this->db->query("SELECT DISTINCT bulan FROM data_nkp WHERE tahun='$tahun' ORDER BY bulan DESC")->result_array();
    }

    public function getTukinNkp($tahun = null, $bulan = null)
    {
        return $this->db->query("SELECT kdsatker, sts, COUNT(nip) AS jml FROM data_nkp WHERE tahun='$tahun' AND bulan='$bulan' GROUP BY kdsatker,sts")->result_array();
    }

    public function getDetailTukinNkp($bulan = null, $tahun = null, $kdsatker = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_nkp WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function findDetailTukinNkp($bulan = null, $tahun = null, $kdsatker = null, $keyword = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_nkp WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nip LIKE '%$keyword%' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function countTukinNkp($tahun = null, $bulan = null, $kdsatker = null)
    {
        return $this->db->query("SELECT * FROM data_nkp WHERE tahun='$tahun' AND bulan='$bulan' AND kdsatker='$kdsatker'")->num_rows();
    }
    public function upload($bulan = null, $tahun = null, $kdsatker = null)
    {
        $rows = $this->db->query("SELECT * FROM data_nkp WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker'")->result_array();
        foreach ($rows as $r) {
            $response = $this->_client->request('POST', 'data-lain', [
                'form_params' => [
                    'bulan' => $r['bulan'],
                    'tahun' => $r['tahun'],
                    'kdsatker' => $r['kdsatker'],
                    'nip' => $r['nip'],
                    'bruto' => $r['bruto'],
                    'pph' => $r['pph'],
                    'netto' => $r['netto'],
                    'jenis' => $r['jenis'],
                    'uraian' => $r['uraian'],
                    'tanggal' => $r['tanggal'],
                    'nospm' => $r['nospm'],
                    'X-API-KEY' => apiKey()
                ]
            ]);
        }
        $this->db->update('data_nkp', ['sts' => 1], ['bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function uploadDetail($nip, $bulan, $tahun, $kdsatker)
    {
        $r = $this->db->get_where('data_nkp', ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker])->row_array();
        $response = $this->_client->request('POST', 'data-lain', [
            'form_params' => [
                'bulan' => $r['bulan'],
                'tahun' => $r['tahun'],
                'kdsatker' => $r['kdsatker'],
                'nip' => $r['nip'],
                'bruto' => $r['bruto'],
                'pph' => $r['pph'],
                'netto' => $r['netto'],
                'jenis' => $r['jenis'],
                'uraian' => $r['uraian'],
                'tanggal' => $r['tanggal'],
                'nospm' => $r['nospm'],
                'X-API-KEY' => apiKey()
            ]
        ]);
        $this->db->update('data_nkp', ['sts' => 1], ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
