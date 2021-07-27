<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
    
	public function index()
	{
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $nip = $this->auth_lib->nip();
        $where = array('nip' => $nip);
        $form = $this->form_model->where($where);

        $view_data = compact('form');

        $this->load->view('pages/form/index', $view_data);
	}

    public function create()
    {
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $this->load->view('pages/form/create');
    }

    public function edit($id_form = NULL)
    {
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $form = $this->form_model->find($id_form);

        if (empty($form))
        {
            redirect('form');
        }

        if ($form->nip != $this->auth_lib->nip())
        {
            redirect('form');
        }

        $view_data = compact('form');

        $this->load->view('pages/form/edit', $view_data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'required|exact_length[18]|numeric');
        $this->form_validation->set_rules('nama_form', 'Nama Form', 'required|max_length[100]');
        $this->form_validation->set_rules('tahun_pelajaran', 'Tahun Pelajaran', 'required|regex_match[/^\d{4}\/\d{4}$/]');
        $this->form_validation->set_rules('semester', 'Semester', 'required|exact_length[1]|numeric');
        $this->form_validation->set_rules('batas_tanggal', 'Batas Tanggal', 'required|regex_match[/^\d{1,4}-\d{1,2}-\d{1,2}$/]');
        $this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required|regex_match[/^\d{1,2}:\d{1,2}:\d{1,2}$/]');

        if ( ! $this->form_validation->run())
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('form/create');
        }

        $batas_tanggal = $this->input->post('batas_tanggal');
        $batas_waktu = $this->input->post('batas_waktu');
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_form' => $this->input->post('nama_form'),
            'tahun_pelajaran' => $this->input->post('tahun_pelajaran'),
            'semester' => $this->input->post('semester'),
            'batas_waktu' => $batas_tanggal . ' ' . $batas_waktu,
        );

        $this->form_model->insert($data);

        $this->session->set_flashdata('success_message', 'Form berhasil disimpan.');

        redirect('form');
    }

    public function update()
    {
        $id_form = $this->input->post('id_form');

        $this->form_validation->set_rules('id_form', 'Id Form', 'required|numeric');
        $this->form_validation->set_rules('nip', 'NIP', 'required|exact_length[18]|numeric');
        $this->form_validation->set_rules('nama_form', 'Nama Form', 'required|max_length[100]');
        $this->form_validation->set_rules('tahun_pelajaran', 'Tahun Pelajaran', 'required|regex_match[/^\d{4}\/\d{4}$/]');
        $this->form_validation->set_rules('semester', 'Semester', 'required|exact_length[1]|numeric');
        $this->form_validation->set_rules('batas_tanggal', 'Batas Tanggal', 'required|regex_match[/^\d{1,4}-\d{1,2}-\d{1,2}$/]');
        $this->form_validation->set_rules('batas_waktu', 'Batas Waktu', 'required|regex_match[/^\d{1,2}:\d{1,2}:\d{1,2}$/]');

        if ( ! $this->form_validation->run())
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('form/edit/' . $id_form);
        }

        $batas_tanggal = $this->input->post('batas_tanggal');
        $batas_waktu = $this->input->post('batas_waktu');
        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_form' => $this->input->post('nama_form'),
            'tahun_pelajaran' => $this->input->post('tahun_pelajaran'),
            'semester' => $this->input->post('semester'),
            'batas_waktu' => $batas_tanggal . ' ' . $batas_waktu,
        );

        $this->form_model->update($id_form, $data);

        $this->session->set_flashdata('success_message', 'Form berhasil disimpan.');

        redirect('form');
    }

    public function delete($id_form = NULL)
    {
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $form = $this->form_model->find($id_form);

        if (empty($form))
        {
            redirect('form');
        }

        if ($form->nip != $this->auth_lib->nip())
        {
            redirect('form');
        }

        $this->form_model->delete($id_form);

        $this->session->set_flashdata('success_message', 'Form berhasil dihapus.');

        redirect('form');
    }
}
