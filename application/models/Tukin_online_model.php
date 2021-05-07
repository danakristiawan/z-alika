<?php

use GuzzleHttp\Client;

class Tukin_online_model extends CI_Model
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
        return $this->db->query("SELECT DISTINCT tahun FROM data_tukin ORDER BY tahun DESC")->result_array();
    }

    public function getBulan($tahun = null)
    {
        return $this->db->query("SELECT DISTINCT bulan FROM data_tukin WHERE tahun='$tahun' ORDER BY bulan DESC")->result_array();
    }

    public function getTukin($tahun = null, $bulan = null)
    {
        return $this->db->query("SELECT kdsatker,sts, COUNT(nip) AS jml FROM data_tukin WHERE tahun='$tahun' AND bulan='$bulan' GROUP BY kdsatker,sts")->result_array();
    }

    public function getDetailTukin($bulan = null, $tahun = null, $kdsatker = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_tukin  WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function findDetailTukin($bulan = null, $tahun = null, $kdsatker = null, $keyword = null, $limit = 0, $offset = 0)
    {
        return $this->db->query("SELECT * FROM data_tukin WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nama LIKE '%$keyword%' OR bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker' AND nip LIKE '%$keyword%' LIMIT $limit OFFSET $offset")->result_array();
    }

    public function countTukin($tahun = null, $bulan = null, $kdsatker = null)
    {
        return $this->db->query("SELECT * FROM data_tukin WHERE tahun='$tahun' AND bulan='$bulan' AND kdsatker='$kdsatker'")->num_rows();
    }
    public function upload($bulan = null, $tahun = null, $kdsatker = null)
    {
        $rows = $this->db->query("SELECT * FROM data_tukin WHERE bulan='$bulan' AND tahun='$tahun' AND kdsatker='$kdsatker'")->result_array();
        foreach ($rows as $r) {
            $response = $this->_client->request('POST', 'data-tukin', [
                'form_params' => [
                    'bulan' => $r['bulan'],
                    'tahun' => $r['tahun'],
                    'kdsatker' => $r['kdsatker'],
                    'nip' => $r['nip'],
                    'grade' => $r['grade'],
                    'tjpokok' => $r['tjpokok'],
                    'tjtamb' => $r['tjtamb'],
                    'abspotr' => $r['abspotr'],
                    'abspotp' => $r['abspotp'],
                    'tkpph' => $r['tkpph'],
                    'p1' => $r['p1'],
                    'p2' => $r['p2'],
                    'p3' => $r['p3'],
                    'p4' => $r['p4'],
                    'p5' => $r['p5'],
                    'p6' => $r['p6'],
                    'p7' => $r['p7'],
                    'p8' => $r['p8'],
                    'p9' => $r['p9'],
                    'p10' => $r['p10'],
                    'p11' => $r['p11'],
                    'p12' => $r['p12'],
                    'p13' => $r['p13'],
                    'p14' => $r['p14'],
                    'p15' => $r['p15'],
                    'p16' => $r['p16'],
                    'p17' => $r['p17'],
                    'p18' => $r['p18'],
                    'p19' => $r['p19'],
                    'p20' => $r['p20'],
                    'p21' => $r['p21'],
                    'p22' => $r['p22'],
                    'X-API-KEY' => apiKey()
                ]
            ]);
        }
        $this->db->update('data_tukin', ['sts' => 1], ['bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function uploadDetail($nip, $bulan, $tahun, $kdsatker)
    {
        $r = $this->db->get_where('data_tukin', ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker])->row_array();
        $response = $this->_client->request('POST', 'data-tukin', [
            'form_params' => [
                'bulan' => $r['bulan'],
                'tahun' => $r['tahun'],
                'kdsatker' => $r['kdsatker'],
                'nip' => $r['nip'],
                'grade' => $r['grade'],
                'tjpokok' => $r['tjpokok'],
                'tjtamb' => $r['tjtamb'],
                'abspotr' => $r['abspotr'],
                'abspotp' => $r['abspotp'],
                'tkpph' => $r['tkpph'],
                'p1' => $r['p1'],
                'p2' => $r['p2'],
                'p3' => $r['p3'],
                'p4' => $r['p4'],
                'p5' => $r['p5'],
                'p6' => $r['p6'],
                'p7' => $r['p7'],
                'p8' => $r['p8'],
                'p9' => $r['p9'],
                'p10' => $r['p10'],
                'p11' => $r['p11'],
                'p12' => $r['p12'],
                'p13' => $r['p13'],
                'p14' => $r['p14'],
                'p15' => $r['p15'],
                'p16' => $r['p16'],
                'p17' => $r['p17'],
                'p18' => $r['p18'],
                'p19' => $r['p19'],
                'p20' => $r['p20'],
                'p21' => $r['p21'],
                'p22' => $r['p22'],
                'X-API-KEY' => apiKey()
            ]
        ]);
        $this->db->update('data_tukin', ['sts' => 1], ['nip' => $nip, 'bulan' => $bulan, 'tahun' => $tahun, 'kdsatker' => $kdsatker]);
        return json_decode($response->getBody()->getContents(), true);
    }
}
