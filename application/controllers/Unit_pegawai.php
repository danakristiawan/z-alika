<?php

class Unit_pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Unit_pegawai_model', 'unit_pegawai');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('unit-pegawai/index');
        $config['total_rows'] = $this->unit_pegawai->countUnitPegawai();
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
            $data['unit_pegawai'] = $this->unit_pegawai->findUnitPegawai($keyword, $limit, $offset);
        } else {
            $data['unit_pegawai'] = $this->unit_pegawai->getUnitPegawai($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit_pegawai/index', $data);
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
            $this->unit_pegawai->createUnitPegawai();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('unit-pegawai');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit_pegawai/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['unit'] = $this->unit_pegawai->getUnitPegawai($id);
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->unit_pegawai->updateUnitPegawai($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('unit-pegawai');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('unit_pegawai/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->unit_pegawai->deleteUnitPegawai($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('unit-pegawai');
    }
}
