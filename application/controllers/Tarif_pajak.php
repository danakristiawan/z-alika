<?php

class Tarif_pajak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Ref_spt_tahunan_model', 'ref_spt_tahunan');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('tarif-pajak/index');
        $config['total_rows'] = $this->ref_spt_tahunan->countRefSptTahunan();
        $config['per_page'] = 20;
        $config["num_links"] = 3;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['keyword'] = $keyword;
        $limit = $config["per_page"];
        $offset = $data['page'];

        if ($keyword) {
            $data['page'] = 0;
            $offset = 0;
            $data['ref_spt_tahunan'] = $this->ref_spt_tahunan->findRefSptTahunan($keyword, $limit, $offset);
        } else {
            $data['ref_spt_tahunan'] = $this->ref_spt_tahunan->getRefSptTahunan($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tarif_pajak/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $rules = [
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->ref_spt_tahunan->createRefSptTahunan();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('tarif-pajak');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tarif_pajak/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['tarif'] = $this->ref_spt_tahunan->getRefSptTahunan($id);
        $rules = [
            [
                'field' => 'tahun',
                'label' => 'tahun',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->ref_spt_tahunan->updateRefSptTahunan($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('tarif-pajak');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('tarif_pajak/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->ref_spt_tahunan->deleteRefSptTahunan($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('tarif-pajak');
    }
}
