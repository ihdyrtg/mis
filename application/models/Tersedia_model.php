<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tersedia_model extends CI_Model
{
    public function getall()
    {
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get('barang_tersedia')->result_array();
    }

    public function getByKodeBarang($kode)
    {
        return $this->db->get_where('barang_tersedia', ['barang_kode' => $kode])->row_array();
    }

    public function getById($id)
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get_where('barang_tersedia', ['id_tersedia' => $id])->row_array();
    }

    public function getbaranghabis()
    {
        $this->db->order_by('nama_barang');
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get_where('barang_tersedia', ['jenis_id' => 1])->result_array();
    }

    public function getbarangberlangsung()
    {
        $this->db->order_by('nama_barang');
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get_where('barang_tersedia', ['jenis_id' => 2])->result_array();
    }

    public function getempty()
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        $this->db->where('jenis_id', 1);
        $this->db->order_by('nama_barang');
        return $this->db->get_where('barang_tersedia', ['jml_tersedia' => 0])->result_array();
    }

    public function barang_rusak()
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        $this->db->where('jml_rusak > 0');
        return $this->db->get('barang_tersedia')->result_array();
    }

    public function countempty()
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        $this->db->where('jenis_id', 1);
        $this->db->where('jml_tersedia', 0);
        return $this->db->get('barang_tersedia')->num_rows();
    }

    public function insertTersedia()
    {
        $data = [
            'barang_kode' => $this->input->post('kode_barang'),
        ];

        $this->db->insert('barang_tersedia', $data);
    }

    public function total_masuk($kode)
    {
        $query = "SELECT SUM(bagus) AS total_bagus FROM `barang_masuk` WHERE `barang_kode` = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function total()
    {
        $query = "SELECT SUM(jumlah) AS total FROM `barang_masuk`";
        return $this->db->query($query)->row_array();
    }

    public function total_keluar($kode)
    {
        $query = "SELECT SUM(jumlah) AS total_keluar FROM `barang_keluar` WHERE `barang_kode` = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function total_rusak($kode)
    {
        $query = "SELECT SUM(rusak) AS total_rusak FROM `barang_masuk` WHERE `barang_kode` = '$kode'";
        return $this->db->query($query)->row_array();
    }

    public function updateTersedia($data)
    {
        $this->db->where('barang_kode', $this->uri->segment(3));
        $this->db->update('barang_tersedia', $data);
    }

    public function updateJumlah($data, $kode)
    {
        $this->db->where('barang_kode', $kode);
        $this->db->update('barang_tersedia', $data);
    }

    public function updateKeterangan($id)
    {
        $data = [
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_tersedia', $id);
        $this->db->update('barang_tersedia', $data);
    }

    public function countbarang()
    {
        return $this->db->get('barang_tersedia')->num_rows();
    }

    public function countbaranghabis()
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get_where('barang_tersedia', ['jenis_id' => 1])->num_rows();
    }

    public function countbarangberlangsung()
    {
        $this->db->join('barang', 'kode_barang = barang_tersedia.barang_kode', 'left');
        return $this->db->get_where('barang_tersedia', ['jenis_id' => 2])->num_rows();
    }

    public function sum_jmlbagus()
    {
        $query = "SELECT SUM(`jml_tersedia`) AS bagus 
                    FROM `barang_tersedia`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_jmlbagushabis()
    {
        $query = "SELECT SUM(`jml_tersedia`) AS bagus 
                    FROM `barang_tersedia`
                    JOIN `barang` ON `barang`.`kode_barang` = `barang_tersedia`.`barang_kode`
                    WHERE `jenis_id` = 1
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_jmlbagusberlangsung()
    {
        $query = "SELECT SUM(`jml_tersedia`) AS bagus 
                    FROM `barang_tersedia`
                    JOIN `barang` ON `barang`.`kode_barang` = `barang_tersedia`.`barang_kode`
                    WHERE `jenis_id` = 2
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_jmlrusak()
    {
        $query = "SELECT SUM(`jml_rusak`) AS rusak 
                    FROM `barang_tersedia`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_jmlrusakhabis()
    {
        $query = "SELECT SUM(`jml_rusak`) AS rusak 
                    FROM `barang_tersedia`
                    JOIN `barang` ON `barang`.`kode_barang` = `barang_tersedia`.`barang_kode`
                    WHERE `jenis_id` = 1
                    ";

        return $this->db->query($query)->row_array();
    }

    public function sum_jmlrusakberlangsung()
    {
        $query = "SELECT SUM(`jml_rusak`) AS rusak 
                    FROM `barang_tersedia`
                    JOIN `barang` ON `barang`.`kode_barang` = `barang_tersedia`.`barang_kode`
                    WHERE `jenis_id` = 2
                    ";

        return $this->db->query($query)->row_array();
    }
}
