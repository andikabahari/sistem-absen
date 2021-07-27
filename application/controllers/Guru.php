<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    
	public function index()
	{
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $nip = $this->auth_lib->nip();
        $where = array('nip' => $nip);
        $guru = $this->guru_model->where($where);

        $view_data = compact('guru');

        $this->load->view('pages/guru/index', $view_data);
	}

    public function edit($nip = NULL)
    {
        $this->auth_lib->redirect_if_not_authenticated('auth');

        if ($nip != $this->auth_lib->nip())
        {
            redirect('guru');
        }

        $guru = $this->guru_model->find($nip);

        if (empty($guru))
        {
            redirect('guru');
        }

        $view_data = compact('guru');

        $this->load->view('pages/guru/edit', $view_data);
    }

    public function update()
    {
        $old_nip = $this->input->post('old_nip');
        $nip = $this->input->post('nip');
        $old_username = $this->input->post('old_username');
        $username = $this->input->post('username');
        
        $this->form_validation->set_rules('nama_guru', 'Nama Lengkap', 'required|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[128]');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[password]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'regex_match[/^\d{1,4}-\d{1,2}-\d{1,2}$/]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'in_list[L,P]');

        if ($old_nip != $nip)
        {
            $this->form_validation->set_rules('nip', 'NIP', 'required|exact_length[18]|numeric|is_unique[guru.nip]');
        }

        if ($old_username != $username)
        {
            $this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]|alpha_numeric|is_unique[guru.username]');
        }

        if ( ! $this->form_validation->run())
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('guru/edit/' . $old_nip);
        }

        $data = array(
            'nip' => $this->input->post('nip'),
            'nama_guru' => $this->input->post('nama_guru'),
            'username' => $this->input->post('username'),
            'password' => $this->auth_lib->hash($this->input->post('password')),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        );

        $this->guru_model->update($old_nip, $data);

        if ($old_nip != $nip)
        {
            $this->session->unset_userdata('nip');
            $this->session->set_userdata('nip', $nip);
        }

        $this->session->set_flashdata('success_message', 'Guru berhasil disimpan.');

        redirect('guru');
    }
}
