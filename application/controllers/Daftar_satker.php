<?php

class Daftar_satker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Satker_model', 'satker');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('daftar-satker/index');
        $config['total_rows'] = $this->satker->countSatker();
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
            $data['satker'] = $this->satker->findSatker($keyword, $limit, $offset);
        } else {
            $data['satker'] = $this->satker->getSatker($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('daftar_satker/index', $data);
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
            $this->satker->createSatker();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('daftar-satker');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('daftar_satker/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['satker'] = $this->satker->getSatker($id);
        $rules = [
            [
                'field' => 'kdsatker',
                'label' => 'kdsatker',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->satker->updateSatker($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('daftar-satker');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('daftar_satker/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->satker->deleteSatker($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('daftar-satker');
    }
}
