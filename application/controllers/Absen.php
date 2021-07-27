<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller {
    
	public function index()
	{
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $nip = $this->auth_lib->nip();
        $absen = $this->absen_model->all($nip);

        $view_data = compact('absen');

        $this->load->view('pages/absen/index', $view_data);
	}

    public function show($id_form = NULL)
	{
        $this->auth_lib->redirect_if_not_authenticated('auth');

        $form = $this->form_model->find($id_form);

        if (empty($form))
        {
            redirect('absen');
        }
        
        if ($form->nip != $this->auth_lib->nip())
        {
            redirect('absen');
        }

        $where = array('id_form' => $id_form);
        $absen = $this->absen_model->where($where);

        $view_data = compact('absen', 'form');

        $this->load->view('pages/absen/show', $view_data);
	}

    public function form($id_form = NULL)
    {
        $id_form = $_GET['id_form'] ?? $id_form;
        $id_form = base64_decode(urldecode($id_form));

        $form = $this->form_model->find($id_form);

        if (empty($form))
        {
            show_404();
        }

        $current_time = time();
        $time_limit = strtotime($form->batas_waktu);

        $view_data = compact(
            'form',
            'current_time',
            'time_limit'
        );

        $this->load->view('pages/absen/form', $view_data);
    }

    public function store()
    {
        $id_form = $this->input->post('id_form');
        $encoded_id = urlencode(base64_encode($id_form));

        $this->form_validation->set_rules('id_form', 'Id Form', 'required|numeric');
        $this->form_validation->set_rules('nis', 'NIS', 'required|exact_length[10]|numeric');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|max_length[100]');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|max_length[10]|regex_match[/^[x|X]{1}[i|I]{0,2}-[a-zA-Z]+-\d+$/]');

        if ( ! $this->form_validation->run())
        {
            $this->session->set_flashdata('error_message', validation_errors());

            redirect('absen/form/' . $encoded_id);
        }

        $form = $this->form_model->find($id_form);

        if (empty($form))
        {
            $this->session->set_flashdata('error_message', 'Absen gagal disimpan.');

            redirect('absen/form/' . $encoded_id);
        }

        $waktu_absen = date('Y-m-d H:i:s');
        $data = array(
            'id_form' => $this->input->post('id_form'),
            'nis' => $this->input->post('nis'),
            'nama_siswa' => $this->input->post('nama_siswa'),
            'kelas' => $this->input->post('kelas'),
            'waktu_absen' => $waktu_absen,
        );

        $this->absen_model->insert($data);

        $is_exceeding_time_limit = strtotime($waktu_absen) > strtotime($form->batas_waktu);
        $message_type = $is_exceeding_time_limit ? 'warning_message' : 'success_message';
        $message_text = $is_exceeding_time_limit ? 'Absen tidak tersimpan karena sudah melibihi batas waktu.' : 'Absen berhasil disimpan.';
        
        $this->session->set_flashdata($message_type, $message_text);

        redirect('absen/form/' . $encoded_id);
    }
}
