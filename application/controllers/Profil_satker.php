<?php

class Profil_satker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Profil_model', 'profil');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('profil-satker/index');
        $config['total_rows'] = $this->profil->countProfil();
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
            $data['profil'] = $this->profil->findProfil($keyword, $limit, $offset);
        } else {
            $data['profil'] = $this->profil->getProfil($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_satker/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $rules = [
            [
                'field' => 'kdsatker',
                'label' => 'kdsatker',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->profil->createProfil();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('profil-satker');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_satker/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['profil'] = $this->profil->getProfil($id);
        $rules = [
            [
                'field' => 'kdsatker',
                'label' => 'kdsatker',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->profil->updateProfil($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('profil-satker');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('profil_satker/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->profil->deleteProfil($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('profil-satker');
    }
}
