<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar_model extends CI_Model
{
    public function getall()
    {
        $this->db->join('pegawai', 'id_pegawai = barang_keluar.pegawai_id', 'left');
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id', 'left');
        $this->db->join('barang', 'kode_barang = barang_keluar.barang_kode', 'left');
        $this->db->order_by('id_keluar', 'desc');
        return $this->db->get('barang_keluar')->result_array();
    }

    public function getnumrows()
    {
        return $this->db->get('barang_keluar')->num_rows();
    }

    public function getById($id)
    {
        $this->db->join('barang', 'kode_barang = barang_keluar.barang_kode', 'left');
        return $this->db->get_where('barang_keluar', ['id_keluar' => $id])->row_array();
    }

    public function getByIdPegawai($id)
    {
        $this->db->join('barang', 'kode_barang = barang_keluar.barang_kode', 'left');
        $this->db->where('pegawai_id', $id);
        $this->db->order_by('tanggal_keluar', 'desc');
        return $this->db->get('barang_keluar')->result_array();
    }

    public function gettransaksi()
    {
        $query = "SELECT `pegawai_id`, COUNT(`pegawai_id`) AS total_transaksi
                    FROM `barang_keluar`
                    JOIN `pegawai` ON `pegawai`.`id_pegawai` = `barang_keluar`.`pegawai_id`
                    GROUP BY `pegawai_id`
                    ORDER BY `bagian_id`
                    ";

        return $this->db->query($query)->result_array();
    }

    public function insertBarangKeluar()
    {
        $data = [
            'barang_kode' => $this->input->post('kode_barang'),
            'pegawai_id' => $this->input->post('id_pegawai'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar'),
        ];

        $this->db->insert('barang_keluar', $data);
    }

    public function multipleInsert($data)
    {
        $this->db->insert('barang_keluar', $data);
    }

    public function updateBk($id)
    {
        $data = [
            'barang_kode' => $this->input->post('kode_barang'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal_keluar' => $this->input->post('tanggal_keluar')
        ];

        $this->db->where('id_keluar', $id);
        $this->db->update('barang_keluar', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_keluar', $id);
        $this->db->delete('barang_keluar');
    }

    public function sum_jumlah()
    {
        $query = "SELECT SUM(`jumlah`) AS total 
                    FROM `barang_keluar`
                    ";

        return $this->db->query($query)->row_array();
    }

    // Statistik
    public function jan_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 01";
        return $this->db->query($query)->num_rows();
    }
    public function feb_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 02";
        return $this->db->query($query)->num_rows();
    }
    public function mar_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 03";
        return $this->db->query($query)->num_rows();
    }
    public function apr_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 04";
        return $this->db->query($query)->num_rows();
    }
    public function mei_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 05";
        return $this->db->query($query)->num_rows();
    }
    public function jun_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 06";
        return $this->db->query($query)->num_rows();
    }
    public function jul_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 07";
        return $this->db->query($query)->num_rows();
    }
    public function agu_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 08";
        return $this->db->query($query)->num_rows();
    }
    public function sep_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 09";
        return $this->db->query($query)->num_rows();
    }
    public function okt_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 10";
        return $this->db->query($query)->num_rows();
    }
    public function nov_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 11";
        return $this->db->query($query)->num_rows();
    }
    public function des_bk()
    {
        $year = date('Y');
        $query = "SELECT * FROM `barang_keluar` WHERE year(`tanggal_keluar`) = $year AND month(`tanggal_keluar`) = 12";
        return $this->db->query($query)->num_rows();
    }
}
