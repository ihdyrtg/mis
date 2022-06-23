<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('Barangkeluar_model', 'bk');
        $this->load->model('Pelaporan_model', 'pelaporan');
    }

    public function index()
    {
        $data['title'] = 'Home | Management Inventory System';
        $data['page'] = 'Katalog Barang Perpustakaan IAIN Padangsidimpuan';

        $data['tersedia'] = $this->tersedia->getall();
        $data['jml_barang'] = $this->tersedia->countbarang();
        $data['jml_bagus'] = $this->tersedia->sum_jmlbagus();
        $data['jml_rusak'] = $this->tersedia->sum_jmlrusak();

        $this->load->view('template/front-headnav', $data);
        $this->load->view('front/home', $data);
        $this->load->view('template/front-footer');
    }

    public function habis()
    {
        $data['title'] = 'Barang Habis | Management Inventory System';
        $data['page'] = 'Katalog Barang Habis Perpustakaan IAIN Padangsidimpuan';

        $data['barang_habis'] = $this->tersedia->getbaranghabis();
        $data['jml_barang'] = $this->tersedia->countbaranghabis();
        $data['jml_bagus'] = $this->tersedia->sum_jmlbagushabis();
        $data['jml_rusak'] = $this->tersedia->sum_jmlrusakhabis();

        $this->load->view('template/front-headnav', $data);
        $this->load->view('front/barang-habis', $data);
        $this->load->view('template/front-footer');
    }

    public function berlangsung()
    {
        $data['title'] = 'Barang Tidak Habis | Management Inventory System';
        $data['page'] = 'Katalog Barang Tidak Habis Perpustakaan IAIN Padangsidimpuan';

        $data['barang_berlangsung'] = $this->tersedia->getbarangberlangsung();
        $data['jml_barang'] = $this->tersedia->countbarangberlangsung();
        $data['jml_bagus'] = $this->tersedia->sum_jmlbagusberlangsung();
        $data['jml_rusak'] = $this->tersedia->sum_jmlrusakberlangsung();

        $this->load->view('template/front-headnav', $data);
        $this->load->view('front/barang-berlangsung', $data);
        $this->load->view('template/front-footer');
    }

    public function transaksipegawai()
    {
        $this->load->helper('pegawai_helper');

        $data['title'] = 'Transaksi Pegawai | Management Inventory System';
        $data['page'] = 'Transaksi Barang Pegawai Perpustakaan IAIN Padangsidimpuan';

        $data['pegawai'] = $this->pegawai->getall();
        $data['transaksi_pegawai'] = $this->bk->gettransaksi();

        $this->load->view('template/front-headnav', $data);
        $this->load->view('front/transaksi-pegawai', $data);
        $this->load->view('template/front-footer', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['barang_keluar'] = $this->bk->getByIdPegawai($id);
        $data['pegawai'] = $this->pegawai->getById($id);
        $data['tahun'] = $this->pelaporan->gettahun_bk();

        $this->load->view('template/front-headnav', $data);
        $this->load->view('front/detail-transaksi.php', $data);
        $this->load->view('template/front-footer');
    }
}
