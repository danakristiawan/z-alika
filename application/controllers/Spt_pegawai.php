<?php

class Spt_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Spt_pegawai_model', 'spt_pegawai');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('spt-pegawai/index');
        $config['total_rows'] = $this->spt_pegawai->countSptPegawai();
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
            $data['spt_pegawai'] = $this->spt_pegawai->findSptPegawai($keyword, $limit, $offset);
        } else {
            $data['spt_pegawai'] = $this->spt_pegawai->getSptPegawai($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt_pegawai/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->spt_pegawai->createSptPegawai();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('spt-pegawai');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt_pegawai/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['spt'] = $this->spt_pegawai->getSptPegawai($id);
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->spt_pegawai->updateSptPegawai($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('spt-pegawai');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('spt_pegawai/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->spt_pegawai->deleteSptPegawai($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('spt-pegawai');
    }
}
