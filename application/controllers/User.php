<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['pagination', 'form_validation']);
        $this->load->model('User_model', 'user');
    }

    public function index()
    {
        $id = null;
        $keyword = $this->input->post('keyword');
        $config['base_url'] = base_url('user/index');
        $config['total_rows'] = $this->user->countUser();
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
            $data['user'] = $this->user->findUser($keyword, $limit, $offset);
        } else {
            $data['user'] = $this->user->getUser($id, $limit, $offset);
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->user->createUser();
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
            redirect('user');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/create');
        $this->load->view('template/footer');
    }

    public function update($id = null)
    {
        if (!isset($id)) show_404();
        $data['user'] = $this->user->getUser($id);
        $rules = [
            [
                'field' => 'nip',
                'label' => 'nip',
                'rules' => 'required|trim'
            ],
            [
                'field' => 'password',
                'label' => 'password',
                'rules' => 'required|trim'
            ]
        ];
        $validation = $this->form_validation->set_rules($rules);
        if ($validation->run()) {
            $this->user->updateUser($id);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('user');
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('user/update', $data);
        $this->load->view('template/footer');
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        $this->user->deleteUser($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('user');
    }
}
