<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi_model extends CI_Model
{
    public function getallidentifikasi()
    {
        $query = "SELECT `lokasi`.*, `barang`.*, `ruang`.`nama_ruang`
                FROM `lokasi` 
                JOIN `barang` ON `lokasi`.`barang_kode` = `barang`.`kode_barang`
                JOIN `ruang` ON `lokasi`.`ruang_id` = `ruang`.`id_ruang`
                GROUP BY `barang_kode`
                ";
        return $this->db->query($query)->result_array();
    }

    public function getByKodeBarang($id)
    {
        $this->db->join('barang', 'kode_barang = lokasi.barang_kode', 'left');
        $this->db->join('ruang', 'id_ruang = lokasi.ruang_id', 'left');
        $this->db->where('barang_kode', $id);
        $this->db->order_by('nama_ruang', 'desc');
        return $this->db->get('lokasi')->result_array();
    }

    public function getById($id)
    {
        $this->db->join('barang', 'kode_barang = lokasi.barang_kode', 'left');
        $this->db->join('ruang', 'id_ruang = lokasi.ruang_id', 'left');
        $this->db->where('id_lokasi', $id);
        return $this->db->get('lokasi')->row_array();
    }

    public function multipleInsert($data)
    {
        $this->db->insert('lokasi', $data);
    }

    public function updateLokasi($id)
    {
        $data = [
            'ruang_id' => $this->input->post('ruang'),
            'jumlah' => $this->input->post('jumlah')
        ];

        $this->db->where('id_lokasi', $id);
        $this->db->update('lokasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_lokasi', $id);
        $this->db->delete('lokasi');
    }
}
