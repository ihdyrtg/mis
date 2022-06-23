<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan_model extends CI_Model
{
    public function gettahun_bm()
    {
        $query = "SELECT YEAR(`tanggal_masuk`) AS tahun 
                    FROM `barang_masuk` 
                    GROUP BY YEAR(`tanggal_masuk`)
                    ORDER BY YEAR(`tanggal_masuk`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytanggal_bm($tanggalawal, $tanggalakhir)
    {
        $query = "SELECT * 
                    FROM `barang_masuk`
                    JOIN `barang` ON `barang_masuk`.`barang_kode` = `barang`.`kode_barang`
                    WHERE `tanggal_masuk` BETWEEN '$tanggalawal' AND '$tanggalakhir'
                    ORDER BY `tanggal_masuk` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbybulan_bm($tahun1, $bulanawal, $bulanakhir)
    {
        $query = "SELECT *
                    FROM `barang_masuk`
                    JOIN `barang` ON `barang_masuk`.`barang_kode` = `barang`.`kode_barang`
                    WHERE YEAR(`tanggal_masuk`) = '$tahun1' 
                    AND MONTH(`tanggal_masuk`) BETWEEN '$bulanawal' AND '$bulanakhir'
                    ORDER BY `tanggal_masuk` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytahun_bm($tahun2)
    {
        $query = "SELECT *
                    FROM `barang_masuk`
                    JOIN `barang` ON `barang_masuk`.`barang_kode` = `barang`.`kode_barang`
                    WHERE YEAR(`tanggal_masuk`) = '$tahun2'
                    ORDER BY `tanggal_masuk` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function gettahun_bk()
    {
        $query = "SELECT YEAR(`tanggal_keluar`) AS tahun 
                    FROM `barang_keluar` 
                    GROUP BY YEAR(`tanggal_keluar`)
                    ORDER BY YEAR(`tanggal_keluar`) ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytanggal_bk($tanggalawal, $tanggalakhir)
    {
        $query = "SELECT * 
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    JOIN `pegawai` ON `barang_keluar`.`pegawai_id` = `pegawai`.`id_pegawai`
                    WHERE `tanggal_keluar` BETWEEN '$tanggalawal' AND '$tanggalakhir'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbybulan_bk($tahun1, $bulanawal, $bulanakhir)
    {
        $query = "SELECT *
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    JOIN `pegawai` ON `barang_keluar`.`pegawai_id` = `pegawai`.`id_pegawai`
                    WHERE YEAR(`tanggal_keluar`) = '$tahun1' 
                    AND MONTH(`tanggal_keluar`) BETWEEN '$bulanawal' AND '$bulanakhir'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytahun_bk($tahun2)
    {
        $query = "SELECT *
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    JOIN `pegawai` ON `barang_keluar`.`pegawai_id` = `pegawai`.`id_pegawai`
                    WHERE YEAR(`tanggal_keluar`) = '$tahun2'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytahun_pegawai($tahun2, $id_pegawai)
    {
        $query = "SELECT *
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    WHERE YEAR(`tanggal_keluar`) = '$tahun2'
                    AND `pegawai_id` = '$id_pegawai'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbytanggal_pegawai($tanggalawal, $tanggalakhir, $id_pegawai)
    {
        $query = "SELECT * 
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    WHERE `tanggal_keluar` BETWEEN '$tanggalawal' AND '$tanggalakhir'
                    AND `pegawai_id` = '$id_pegawai'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }

    public function filterbybulan_pegawai($tahun1, $bulanawal, $bulanakhir, $id_pegawai)
    {
        $query = "SELECT *
                    FROM `barang_keluar`
                    JOIN `barang` ON `barang_keluar`.`barang_kode` = `barang`.`kode_barang`
                    WHERE YEAR(`tanggal_keluar`) = '$tahun1' 
                    AND MONTH(`tanggal_keluar`) BETWEEN '$bulanawal' AND '$bulanakhir'
                    AND `pegawai_id` = '$id_pegawai'
                    ORDER BY `tanggal_keluar` ASC
                    ";

        return $this->db->query($query)->result_array();
    }
}
