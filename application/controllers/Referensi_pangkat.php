<?php

class Referensi_pangkat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Referensi_pangkat_model', 'ref_pangkat');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('referensi-pangkat/index');
        $config['total_rows'] = $this->ref_pangkat->countRefPangkat();
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
            $data['ref_pangkat'] = $this->ref_pangkat->findRefPangkat($keyword, $limit, $offset);
        } else {
            $data['ref_pangkat'] = $this->ref_pangkat->getRefPangkat($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_pangkat/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $rules = [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->ref_pangkat->createRefPangkat();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('referensi-pangkat');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_pangkat/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['pangkat'] = $this->ref_pangkat->getRefPangkat($id);
        $rules = [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->ref_pangkat->updateRefPangkat($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('referensi-pangkat');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_pangkat/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->ref_pangkat->deleteRefPangkat($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('referensi-pangkat');
    }
}
