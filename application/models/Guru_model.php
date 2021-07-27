<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model {
    
    public function all($limit = NULL, $offset = NULL)
    {
        $this->db->order_by('nip', 'desc');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get('guru');
    
        return $query->result();
    }

    public function find($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->order_by('nip', 'desc');
    
        $query = $this->db->get('guru');
    
        return $query->row();
    }

    public function credential($credential)
    {
        $this->db->where('nip', $credential);
        $this->db->or_where('username', $credential);
    
        $query = $this->db->get('guru');
    
        return $query->row();
    }

    public function where($where = array(), $limit = NULL, $offset = NULL)
    {
        $this->db->where($where);
        $this->db->order_by('nip', 'desc');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get('guru');
    
        return $query->result();
    }

    public function insert($data)
    {
        $attributes = array(
            'nip' => empty_to_null($data['nip']),
            'nama_guru' => empty_to_null($data['nama_guru']),
            'username' => empty_to_null($data['username']),
            'password' => empty_to_null($data['password']),
            'jenis_kelamin' => empty_to_null($data['jenis_kelamin']),
            'tanggal_lahir' => empty_to_null($data['tanggal_lahir'])
        );
    
        $this->db->insert('guru', $attributes);
    
        return $this->db->affected_rows();
    }

    public function update($nip, $data)
    {
        $attributes = array(
            'nip' => empty_to_null($data['nip']),
            'nama_guru' => empty_to_null($data['nama_guru']),
            'username' => empty_to_null($data['username']),
            'password' => empty_to_null($data['password']),
            'jenis_kelamin' => empty_to_null($data['jenis_kelamin']),
            'tanggal_lahir' => empty_to_null($data['tanggal_lahir'])
        );
    
        $this->db->where('nip', $nip);
        $this->db->update('guru', $attributes);
    
        return $this->db->affected_rows();
    }

    public function delete($nip)
    {
        $this->db->where('nip', $nip);
        $this->db->delete('guru');
    
        return $this->db->affected_rows();
    }
}
