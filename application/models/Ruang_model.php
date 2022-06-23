<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ruang_model extends CI_Model
{
    public function getruang()
    {
        $this->db->order_by('nama_ruang');
        return $this->db->get('ruang')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('ruang', ['id_ruang' => $id])->row_array();
    }

    public function insertRuang()
    {
        $data = [
            'nama_ruang' => $this->input->post('nama_ruang'),
            'lantai' => $this->input->post('lantai')
        ];

        $this->db->insert('ruang', $data);
    }

    public function updateRuang($id)
    {
        $data = [
            'nama_ruang' => $this->input->post('nama_ruang'),
            'lantai' => $this->input->post('lantai')
        ];

        $this->db->where('id_ruang', $id);
        $this->db->update('ruang', $data);
    }
}
