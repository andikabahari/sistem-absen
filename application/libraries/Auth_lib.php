<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_lib {

    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();

        $this->CI->load->library('session');
        $this->CI->load->model('guru_model');
    }

    public function nip()
    {
        return ! empty($this->CI->session->userdata('nip'))
                ? $this->CI->session->userdata('nip')
                : NULL;
    }

    public function guru()
    {
        $nip = $this->nip();
        $guru = $this->CI->guru_model->find($nip);

        return ! empty($guru) ? $guru : NULL;
    }

    public function is_logged_in()
    {
        return ! empty($this->guru());
    }

    public function redirect_if_authenticated($to_url = '')
    {
        if ($this->is_logged_in())
        {
            redirect($to_url);
        }
    }

    public function redirect_if_not_authenticated($to_url = '')
    {
        if ( ! $this->is_logged_in())
        {
            redirect($to_url);
        }
    }

    public function login($credential, $password)
    {
        $guru = $this->CI->guru_model->credential($credential);

        if (empty($guru))
        {
            return FALSE;
        }

        if ( ! $this->verify($password, $guru->password))
        {
            return FALSE;
        }

        $this->CI->session->set_userdata('nip', $guru->nip);
        
        return TRUE;
    }

    public function logout()
    {
        $this->CI->session->unset_userdata('nip');
    }

    public function hash($password)
    {
        $option = array(
            'cost' => 10
        );

        return password_hash($password, PASSWORD_DEFAULT, $option);
    }

    public function verify($password, $hashed_password)
    {
        return password_verify($password, $hashed_password);
    }
}
