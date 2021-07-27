<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function index()
	{
        $this->auth_lib->redirect_if_authenticated('absen');

        $this->load->view('pages/auth/index');
	}

    public function login()
    {
        $credential = $this->input->post('credential');
        $password = $this->input->post('password');

        if ( ! $this->auth_lib->login($credential, $password))
        {
            $this->session->set_flashdata('error_message', 'NIP, username, atau password yang anda masukkan salah.');

            redirect('auth');
        }

        $this->session->set_flashdata('success_message', 'Login telah berhasil.');

        redirect('absen');
    }

    public function logout()
    {
        $this->auth_lib->logout();

        redirect('auth');
    }
}
