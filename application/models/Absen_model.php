<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_model extends CI_Model {
    
    public function all($nip)
    {
        $sql = "
            select *,
                count(id_absen) as jumlah_absen
            from form
            join absen using(id_form)
            where nip = " . $nip . "
            group by id_form
        ";
    
        $query = $this->db->query($sql);
    
        return $query->result();
    }

    public function find($id_absen)
    {
        $this->db->where('id_absen', $id_absen);
        $this->db->order_by('id_absen', 'desc');
    
        $query = $this->db->get('absen');
    
        return $query->row();
    }

    public function where($where = array(), $limit = NULL, $offset = NULL)
    {
        $this->db->where($where);
        $this->db->order_by('id_absen', 'desc');
        $this->db->limit($limit, $offset);
    
        $query = $this->db->get('absen');
    
        return $query->result();
    }

    public function insert($data)
    {
        $attributes = array(
            'id_form' => empty_to_null($data['id_form']),
            'nis' => empty_to_null($data['nis']),
            'nama_siswa' => empty_to_null($data['nama_siswa']),
            'kelas' => empty_to_null($data['kelas']),
            'waktu_absen' => empty_to_null($data['waktu_absen']),
        );
    
        $this->db->insert('absen', $attributes);
    
        return $this->db->affected_rows();
    }

    public function update($id_absen, $data)
    {
        $attributes = array(
            'id_form' => empty_to_null($data['id_form']),
            'nis' => empty_to_null($data['nis']),
            'nama_siswa' => empty_to_null($data['nama_siswa']),
            'kelas' => empty_to_null($data['kelas']),
            'waktu_absen' => empty_to_null($data['waktu_absen']),
        );
    
        $this->db->where('id_absen', $id_absen);
        $this->db->update('absen', $attributes);
    
        return $this->db->affected_rows();
    }

    public function delete($id_absen)
    {
        $this->db->where('id_absen', $id_absen);
        $this->db->delete('absen');
    
        return $this->db->affected_rows();
    }
}
