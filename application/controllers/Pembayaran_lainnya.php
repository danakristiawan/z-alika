<?php

class Pembayaran_lainnya extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('Lain_model', 'lain');
    }

    public function index()
    {
        $id = null;
        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $config['base_url'] = base_url('pembayaran-lainnya/index');
        $config['total_rows'] = $this->lain->countLain();
        $config['per_page'] = 20;
        $config["num_links"] = 3;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['page'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
        $data['keyword'] = $keyword1;
        $limit = $config["per_page"];
        $offset = $data['page'];

        if ($keyword1) {
            $data['page'] = 0;
            $offset = 0;
            $data['lain'] = $this->lain->findLain($keyword1, $keyword2, $limit, $offset);
        } else {
            $data['lain'] = $this->lain->getLain($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran_lainnya/index', $data);
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
            $this->lain->createLain();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('pembayaran-lainnya');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran_lainnya/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['lain'] = $this->lain->getLain($id);
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->lain->updateLain($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('pembayaran-lainnya');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pembayaran_lainnya/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->lain->deleteLain($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('pembayaran-lainnya');
    }
}
