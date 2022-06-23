<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Infaq_model extends CI_Model
{
    public function getall()
    {
        $this->db->join('pegawai', 'id_pegawai = infaq_bayar.pegawai_id');
        $this->db->order_by('id_infaq', 'desc');
        return $this->db->get('infaq_bayar')->result_array();
    }

    public function getById($id)
    {
        $this->db->join('pegawai', 'id_pegawai = infaq_bayar.pegawai_id', 'left');
        return $this->db->get_where('infaq_bayar', ['id_infaq' => $id])->row_array();
    }

    public function insertInfaq()
    {
        $data = [
            'tanggal_bayar' => date('Y-m-d'),
            'pegawai_id' => $this->input->post('id_pegawai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('infaq_bayar', $data);
    }

    public function updateInfaq()
    {
        $data = [
            'tanggal_bayar' => date('Y-m-d'),
            'pegawai_id' => $this->input->post('id_pegawai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_infaq', $this->input->post('id_infaq'));
        $this->db->update('infaq_bayar', $data);
    }

    public function delete_bayar($id)
    {
        $this->db->where('id_infaq', $id);
        $this->db->delete('infaq_bayar');
    }

    public function gettahun_infaqbayar()
    {
        $query = "SELECT YEAR(`tanggal_bayar`) AS tahun 
                    FROM `infaq_bayar` 
                    GROUP BY YEAR(`tanggal_bayar`)
                    ORDER BY YEAR(`tanggal_bayar`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function sum_bulan($bulan, $tahun)
    {
        $query = "SELECT SUM(`jumlah`) AS total_dana
                    FROM `infaq_bayar`
                    WHERE MONTH(`tanggal_bayar`) = '$bulan'
                    AND YEAR(`tanggal_bayar`) = '$tahun'
                    ";

        return $this->db->query($query)->row_array();
    }

    public function detail_bayar($bulan, $tahun)
    {
        $query = "SELECT * FROM `infaq_bayar`
                    JOIN `pegawai` ON pegawai.id_pegawai = infaq_bayar.pegawai_id
                    WHERE MONTH(`tanggal_bayar`) = '$bulan'
                    AND YEAR(`tanggal_bayar`) = '$tahun'
                    ";
        return $this->db->query($query)->result_array();
    }

    // Table infaq_serah
    public function getallSerah()
    {
        $this->db->order_by('id_serah', 'desc');
        return $this->db->get('infaq_serah')->result_array();
    }

    public function getPrintserah()
    {
        $id = $this->uri->segment(4);

        if ($id == null) {
            $this->db->join('pegawai', 'id_pegawai = infaq_serah.kepada');
            $this->db->order_by('id_serah', 'desc');
            return $this->db->get('infaq_serah')->row_array();
        } else {
            $this->db->join('pegawai', 'id_pegawai = infaq_serah.kepada');
            $this->db->where('id_serah', $id);
            return $this->db->get('infaq_serah')->row_array();
        }
    }

    public function insertSerahinfaq()
    {
        $data = [
            'tanggal_serah' => $this->input->post('tanggal_serah'),
            'jumlah_serah' => $this->input->post('jumlah'),
            'terbilang' => $this->input->post('terbilang'),
            'kepada' => $this->input->post('kepada')
        ];

        $this->db->insert('infaq_serah', $data);
    }

    public function terkumpul()
    {
        $query = "SELECT SUM(`jumlah`) AS total_terkumpul 
                    FROM `infaq_bayar`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function serahinfaq()
    {
        $query = "SELECT SUM(`jumlah_serah`) AS total_serah 
                    FROM `infaq_serah`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function infaq_keluar()
    {
        return $this->db->get('infaq_serah')->num_rows();
    }

    public function sum_tahun($tahun)
    {
        $query = "SELECT SUM(`jumlah_serah`) AS total_laporan
                    FROM `infaq_serah`
                    WHERE YEAR(`tanggal_serah`) = '$tahun'
                    ";

        return $this->db->query($query)->row_array();
    }

    public function laporan_tahunan_infaq($tahun)
    {
        $query = "SELECT *
                    FROM `infaq_serah`
                    WHERE YEAR(`tanggal_serah`) = '$tahun'
                    ORDER BY MONTH(`tanggal_serah`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function gettahun_infaqserah()
    {
        $query = "SELECT YEAR(`tanggal_serah`) AS tahun 
                    FROM `infaq_serah` 
                    GROUP BY YEAR(`tanggal_serah`)
                    ORDER BY YEAR(`tanggal_serah`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function sum_detail($bulan, $tahun)
    {
        $query = "SELECT SUM(`jumlah`) AS total_dana
                    FROM `infaq_bayar`
                    WHERE MONTH(`tanggal_bayar`) = '$bulan'
                    AND YEAR(`tanggal_bayar`) = '$tahun'
                    ";

        return $this->db->query($query)->row_array();
    }
}
