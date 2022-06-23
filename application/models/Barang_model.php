<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    public function getall()
    {
        $this->db->order_by('nama_barang', 'asc');
        return $this->db->get('barang')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('barang', ['kode_barang' => $id])->row_array();
    }

    public function get_inisialisasi($kode)
    {
        $query = "SELECT * FROM `barang` WHERE `kode_barang` = '$kode'";

        return $this->db->query($query)->row_array();
    }

    public function getforsirkulasi()
    {
        $this->db->join('sirkulasi', 'barang_kode = barang.kode_barang', 'left');
        $this->db->where('jenis_id', 2);
        $this->db->order_by('nama_barang');
        return $this->db->get('barang')->result_array();
    }

    public function getjenisbarang()
    {
        return $this->db->get('jenis_barang')->result_array();
    }

    public function get_transaksi()
    {
        // $this->db->where('jenis_id', 1);
        $this->db->order_by('nama_barang');
        return $this->db->get('barang')->result_array();
    }

    public function getlbh()
    {
        $this->db->where('jenis_id', 1);
        $this->db->order_by('kode_barang', 'desc');
        return $this->db->get('barang')->row_array();
    }

    public function getlbth()
    {
        $this->db->where('jenis_id', 2);
        $this->db->order_by('kode_barang', 'desc');
        return $this->db->get('barang')->row_array();
    }

    public function insertBarang()
    {
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jenis_id' => $this->input->post('jenis'),
            'satuan' => $this->input->post('satuan')
        ];

        $this->db->insert('barang', $data);
    }

    public function updateBarang($id)
    {
        $data = [
            'kode_barang' => $this->input->post('kode_barang'),
            'nama_barang' => $this->input->post('nama_barang'),
            'jenis_id' => $this->input->post('jenis'),
            'satuan' => $this->input->post('satuan')
        ];

        $this->db->where('kode_barang', $id);
        $this->db->update('barang', $data);
    }
}
