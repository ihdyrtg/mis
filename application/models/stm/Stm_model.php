<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stm_model extends CI_Model
{
    public function getall()
    {
        $this->db->join('pegawai', 'id_pegawai = stm_pembayaran.pegawai_id');
        $this->db->order_by('id_stm', 'desc');
        return $this->db->get('stm_pembayaran')->result_array();
    }

    public function getById($id)
    {
        $this->db->join('pegawai', 'id_pegawai = stm_pembayaran.pegawai_id', 'left');
        return $this->db->get_where('stm_pembayaran', ['id_stm' => $id])->row_array();
    }

    public function gettahun_stmbayar()
    {
        $query = "SELECT YEAR(`tanggal_bayar`) AS tahun 
                    FROM `stm_pembayaran` 
                    GROUP BY YEAR(`tanggal_bayar`)
                    ORDER BY YEAR(`tanggal_bayar`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function insertSTM()
    {
        $data = [
            'tanggal_bayar' => date('Y-m-d'),
            'pegawai_id' => $this->input->post('id_pegawai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('stm_pembayaran', $data);
    }

    public function updateSTM()
    {
        $data = [
            'tanggal_bayar' => date('Y-m-d'),
            'pegawai_id' => $this->input->post('id_pegawai'),
            'jumlah' => $this->input->post('jumlah'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_stm', $this->input->post('id_stm'));
        $this->db->update('stm_pembayaran', $data);
    }

    public function delete_bayar($id)
    {
        $this->db->where('id_stm', $id);
        $this->db->delete('stm_pembayaran');
    }

    public function laporan_bulanan_stm($tahun)
    {
        $query = "SELECT *
                    FROM `stm_pembayaran`
                    JOIN `pegawai` ON `stm_pembayaran`.`pegawai_id` = `pegawai`.`id_pegawai`
                    WHERE YEAR(`tanggal_bayar`) = '$tahun'
                    ORDER BY `tanggal_bayar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function total_laporan_bayar($tahun)
    {
        $query = "SELECT SUM(`jumlah`) AS total_laporan
                    FROM `stm_pembayaran`
                    WHERE YEAR(`tanggal_bayar`) = '$tahun'
                    ";

        return $this->db->query($query)->row_array();
    }

    // Table stm_serah
    public function getallSerah()
    {
        $this->db->join('pegawai', 'id_pegawai = stm_serah.kepada');
        $this->db->order_by('id_serah', 'desc');
        return $this->db->get('stm_serah')->result_array();
    }

    public function getPrintserah()
    {
        $id = $this->uri->segment(4);

        if ($id == null) {
            $this->db->join('pegawai', 'id_pegawai = stm_serah.kepada');
            $this->db->order_by('id_serah', 'desc');
            return $this->db->get('stm_serah')->row_array();
        } else {
            $this->db->join('pegawai', 'id_pegawai = stm_serah.kepada');
            $this->db->where('id_serah', $id);
            return $this->db->get('stm_serah')->row_array();
        }
    }

    public function gettahun_stmserah()
    {
        $query = "SELECT YEAR(`tanggal_serah`) AS tahun 
                    FROM `stm_serah` 
                    GROUP BY YEAR(`tanggal_serah`)
                    ORDER BY YEAR(`tanggal_serah`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function insertSerahstm()
    {
        $data = [
            'tanggal_serah' => $this->input->post('tanggal_serah'),
            'jumlah_serah' => $this->input->post('jumlah'),
            'terbilang' => $this->input->post('terbilang'),
            'kepada' => $this->input->post('id_pegawai')
        ];

        $this->db->insert('stm_serah', $data);
    }

    public function kas_stm()
    {
        $query = "SELECT SUM(`jumlah`) AS total_kas 
                    FROM `stm_pembayaran`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function total_serah()
    {
        $query = "SELECT SUM(`jumlah_serah`) AS total_serah_stm 
                    FROM `stm_serah`
                    ";

        return $this->db->query($query)->row_array();
    }

    public function pengeluaran()
    {
        return $this->db->get('stm_serah')->num_rows();
    }

    public function laporan_bulanan_serah($bulan, $tahun)
    {
        $query = "SELECT *
                    FROM `stm_serah`
                    JOIN `pegawai` ON `stm_serah`.`kepada` = `pegawai`.`id_pegawai`
                    WHERE MONTH(`tanggal_serah`) = '$bulan'
                    AND YEAR(`tanggal_serah`) = '$tahun'
                    ORDER BY `tanggal_serah` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function total_laporan_serah($bulan, $tahun)
    {
        $query = "SELECT SUM(`jumlah_serah`) AS total_laporan
                    FROM `stm_serah`
                    WHERE MONTH(`tanggal_serah`) = '$bulan'
                    AND YEAR(`tanggal_serah`) = '$tahun'
                    ";

        return $this->db->query($query)->row_array();
    }
}
