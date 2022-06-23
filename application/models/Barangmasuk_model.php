<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk_model extends CI_Model
{
    public function getall()
    {
        $this->db->join('barang', 'kode_barang = barang_masuk.barang_kode', 'left');
        $this->db->order_by('tanggal_masuk', 'desc');
        return $this->db->get('barang_masuk')->result_array();
    }

    public function getnumrows()
    {
        return $this->db->get('barang_masuk')->num_rows();
    }

    public function getById($id)
    {
        $this->db->join('barang', 'kode_barang = barang_masuk.barang_kode', 'left');
        return $this->db->get_where('barang_masuk', ['id_bm' => $id])->row_array();
    }

    public function getKodeBarangLikeId($a)
    {
        $query = "SELECT * FROM `barang_masuk` WHERE `barang_kode` LIKE '%$a'";
        return $this->db->query($query)->row_array();
    }

    public function insertBarangMasuk()
    {
        $data = [
            'barang_kode' => $this->input->post('kode_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'bagus' => $this->input->post('bagus'),
            'rusak' => $this->input->post('rusak'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk')
        ];

        $this->db->insert('barang_masuk', $data);
    }

    public function updateBm($id)
    {
        $data = [
            'barang_kode' => $this->input->post('kode_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'bagus' => $this->input->post('bagus'),
            'rusak' => $this->input->post('rusak'),
            'tanggal_masuk' => $this->input->post('tanggal_masuk'),
        ];

        $this->db->where('id_bm', $id);
        $this->db->update('barang_masuk', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_bm', $id);
        $this->db->delete('barang_masuk');
    }

    public function sum_jumlah()
    {
        $query = "SELECT SUM(`jumlah`) AS jumlah 
                    FROM `barang_masuk`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_bagus()
    {
        $query = "SELECT SUM(`bagus`) AS bagus 
                    FROM `barang_masuk`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_rusak()
    {
        $query = "SELECT SUM(`rusak`) AS rusak 
                    FROM `barang_masuk`
                    ";

        return $this->db->query($query)->row_array();
    }
}
