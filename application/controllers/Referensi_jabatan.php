<?php

class Referensi_jabatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Referensi_jabatan_model', 'ref_jabatan');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('referensi-jabatan/index');
        $config['total_rows'] = $this->ref_jabatan->countRefJabatan();
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
            $data['ref_jabatan'] = $this->ref_jabatan->findRefJabatan($keyword, $limit, $offset);
        } else {
            $data['ref_jabatan'] = $this->ref_jabatan->getRefJabatan($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_jabatan/index', $data);
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
            $this->ref_jabatan->createRefJabatan();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('referensi-jabatan');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_jabatan/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['jabatan'] = $this->ref_jabatan->getRefJabatan($id);
        $rules = [
            [
                'field' => 'nama',
                'label' => 'nama',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->ref_jabatan->updateRefJabatan($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('referensi-jabatan');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('referensi_jabatan/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->ref_jabatan->deleteRefJabatan($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('referensi-jabatan');
    }
}
