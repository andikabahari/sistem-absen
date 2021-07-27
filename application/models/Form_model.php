<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Form_model extends CI_Model {
    
    public function all($limit = NULL, $offset = NULL)
    {
        $this->db->order_by('id_form', 'desc');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get('form');
    
        return $query->result();
    }

    public function find($id_form)
    {
        $this->db->where('id_form', $id_form);
        $this->db->order_by('id_form', 'desc');
    
        $query = $this->db->get('form');
    
        return $query->row();
    }

    public function where($where = array(), $limit = NULL, $offset = NULL)
    {
        $this->db->where($where);
        $this->db->order_by('id_form', 'desc');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get('form');
    
        return $query->result();
    }

    public function insert($data)
    {
        $attributes = array(
            'nip' => empty_to_null($data['nip']),
            'nama_form' => empty_to_null($data['nama_form']),
            'tahun_pelajaran' => empty_to_null($data['tahun_pelajaran']),
            'semester' => empty_to_null($data['semester']),
            'batas_waktu' => empty_to_null($data['batas_waktu']),
        );
    
        $this->db->insert('form', $attributes);
    
        return $this->db->affected_rows();
    }

    public function update($id_form, $data)
    {
        $attributes = array(
            'nip' => empty_to_null($data['nip']),
            'nama_form' => empty_to_null($data['nama_form']),
            'tahun_pelajaran' => empty_to_null($data['tahun_pelajaran']),
            'semester' => empty_to_null($data['semester']),
            'batas_waktu' => empty_to_null($data['batas_waktu']),
        );
    
        $this->db->where('id_form', $id_form);
        $this->db->update('form', $attributes);
    
        return $this->db->affected_rows();
    }

    public function delete($id_form)
    {
        $this->db->where('id_form', $id_form);
        $this->db->delete('form');
    
        return $this->db->affected_rows();
    }
}
