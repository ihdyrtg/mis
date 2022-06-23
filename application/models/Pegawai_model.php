<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{
    public function getall()
    {
        $this->db->where('is_active', 1);
        $this->db->order_by('bagian_id');
        return $this->db->get('pegawai')->result_array();
    }

    public function getnumrows()
    {
        return $this->db->get('pegawai')->num_rows();
    }

    public function get_profile()
    {
        $query = "SELECT `pegawai`.*, `bagian`.`nama_bagian`
                    FROM `pegawai` JOIN `bagian`
                    ON `pegawai`.`bagian_id` = `bagian`.`id_bagian`
                    ORDER BY `bagian_id`
                    ";
        return $this->db->query($query)->result_array();
    }

    public function getById($id)
    {
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id');
        return $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
    }

    public function getadmin_mis()
    {
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id');
        $this->db->where('bagian_id', 5);
        return $this->db->get('pegawai')->row_array();
    }

    public function get_kepalaperpus()
    {
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id');
        $this->db->where('bagian_id', 1);
        return $this->db->get('pegawai')->row_array();
    }

    public function get_cekdata($id)
    {
        $query = "SELECT * FROM `pegawai` WHERE `id_pegawai` = '$id'";

        return $this->db->query($query)->row_array();
    }

    public function insertPegawai($data)
    {
        $this->db->insert('pegawai', $data);
    }

    public function updatePegawai($data)
    {
        $this->db->where('id_pegawai', $this->uri->segment(3));
        $this->db->update('pegawai', $data);
    }

    public function deleteProfileById($id)
    {
        $this->db->select('foto');
        $this->db->where('id_pegawai', $id);
        return $this->db->get('pegawai')->row_array();
    }

    public function deleteParafById($id)
    {
        $this->db->select('paraf');
        $this->db->where('id_pegawai', $id);
        return $this->db->get('pegawai')->row_array();
    }

    public function kordinator()
    {
        return $this->db->get_where('pegawai', ['bagian_id' => 5])->row_array();
    }

    // Tabel Penerima
    public function getpenerima()
    {
        $this->db->order_by('nama_penerima');
        return $this->db->get('penerima')->result_array();
    }

    public function getpenerima_byid($id)
    {
        return $this->db->get_where('penerima', ['id_penerima' => $id])->row_array();
    }

    public function insertPenerima()
    {
        $data = [
            'nama_penerima' => $this->input->post('nama_penerima')
        ];

        $this->db->insert('penerima', $data);
    }

    public function updatePenerima()
    {
        $data = [
            'nama_penerima' => $this->input->post('nama_penerima')
        ];

        $this->db->where('id_penerima', $this->input->post('id_penerima'));
        $this->db->update('penerima', $data);
    }

    public function delete_penerima($id)
    {
        $this->db->where('id_penerima', $id);
        $this->db->delete('penerima');
    }

    // Tabel Unit
    public function getunit()
    {
        $this->db->order_by('nama_unit');
        return $this->db->get('unit')->result_array();
    }

    public function insertUnit()
    {
        $data = [
            'nama_unit' => $this->input->post('nama_unit')
        ];

        $this->db->insert('unit', $data);
    }

    public function getunit_byid($id)
    {
        return $this->db->get_where('unit', ['id_unit' => $id])->row_array();
    }

    public function updateUnit()
    {
        $data = [
            'nama_unit' => $this->input->post('nama_unit')
        ];

        $this->db->where('id_unit', $this->input->post('id_unit'));
        $this->db->update('unit', $data);
    }

    public function delete_unit($id)
    {
        $this->db->where('id_unit', $id);
        $this->db->delete('unit');
    }
}
