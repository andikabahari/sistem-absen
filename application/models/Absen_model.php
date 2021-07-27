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
            'id_form' => addslashes($data['id_form']),
            'nis' => addslashes($data['nis']),
            'nama_siswa' => addslashes($data['nama_siswa']),
            'kelas' => addslashes($data['kelas']),
            'waktu_absen' => addslashes($data['waktu_absen']),
        );

        $this->db->trans_start();
        $this->db->query("SET @id_form := '" . $attributes['id_form'] . "'");
        $this->db->query("SET @nis := '" . $attributes['nis'] . "'");
        $this->db->query("SET @nama_siswa := '" . $attributes['nama_siswa'] . "'");
        $this->db->query("SET @kelas := '" . $attributes['kelas'] . "'");
        $this->db->query("SET @waktu_absen := '" . $attributes['waktu_absen'] . "'");
        $this->db->query("CALL insert_absen(@id_form,@nis,@nama_siswa,@kelas,@waktu_absen)");
        $this->db->trans_complete();
    
        return $this->db->trans_status();
    }
}
