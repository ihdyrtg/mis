<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sirkulasi_model extends CI_Model
{
    public function getall()
    {
        $this->db->join('barang', 'kode_barang = sirkulasi.barang_kode', 'left');
        $this->db->join('pegawai', 'id_pegawai = sirkulasi.pegawai_id', 'left');
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id', 'left');
        $this->db->group_by('invoice');
        $this->db->order_by('id_sirkulasi', 'asc');
        return $this->db->get('sirkulasi')->result_array();
    }

    public function getpinjam()
    {
        $this->db->join('barang', 'kode_barang = sirkulasi.barang_kode', 'left');
        $this->db->join('pegawai', 'id_pegawai = sirkulasi.pegawai_id', 'left');
        $this->db->where('keterangan', 'pinjam');
        $this->db->group_by('invoice');
        $this->db->order_by('id_sirkulasi', 'desc');
        return $this->db->get('sirkulasi')->result_array();
    }

    public function getbyid($id)
    {
        $this->db->join('barang', 'kode_barang = sirkulasi.barang_kode', 'left');
        $this->db->join('pegawai', 'id_pegawai = sirkulasi.pegawai_id', 'left');
        $this->db->join('bagian', 'id_bagian = pegawai.bagian_id', 'left');
        $this->db->where('id_sirkulasi', $id);
        return $this->db->get('sirkulasi')->row_array();
    }

    public function getbyinvoice($id)
    {
        $this->db->join('barang', 'kode_barang = sirkulasi.barang_kode', 'left');
        $this->db->where('invoice', $id);
        $this->db->order_by('nama_barang');
        return $this->db->get('sirkulasi')->result_array();
    }

    public function getforreturn($id)
    {
        $this->db->join('barang', 'kode_barang = sirkulasi.barang_kode', 'left');
        $this->db->where('invoice', $id);
        $this->db->where('keterangan', 'pinjam');
        $this->db->order_by('nama_barang');
        return $this->db->get('sirkulasi')->result_array();
    }

    public function getsubtotal($id)
    {
        $query = "SELECT SUM(`jumlah`) AS subtotal
                    FROM `sirkulasi`
                    WHERE `invoice` = $id
                    ";
        return $this->db->query($query)->row_array();
    }

    public function getmaxid()
    {
        $query = "SELECT max(id_sirkulasi) AS maxID FROM sirkulasi";

        return $this->db->query($query)->row_array();
    }

    public function multipleInsert($data)
    {
        $this->db->insert('sirkulasi', $data);
    }

    public function kembali($id, $kembali, $pengembali)
    {
        $dikembalikan = date('Y-m-d');
        $today = date('d');
        if (date('d', strtotime($kembali)) < $today) {
            $data = [
                'tanggal_dikembalikan' => $dikembalikan,
                'return_barang' => $pengembali,
                'keterangan' => 'terlambat'
            ];
        } else {
            $data = [
                'tanggal_dikembalikan' => $dikembalikan,
                'return_barang' => $pengembali,
                'keterangan' => 'kembali'
            ];
        }

        $this->db->where('id_sirkulasi', $id);
        $this->db->update('sirkulasi', $data);
    }
}
