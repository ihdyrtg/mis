<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Barangmasuk_model', 'bm');
        $this->load->model('Barangkeluar_model', 'bk');
        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('stm/Stm_model', 'stm');
        $this->load->model('infaq/Infaq_model', 'infaq');
    }

    public function index()
    {
        $data['title'] = 'Dashboard | Management Inventory System';
        $data['page'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        // Data statistik
        $data['jan_bk'] = $this->bk->jan_bk();
        $data['feb_bk'] = $this->bk->feb_bk();
        $data['mar_bk'] = $this->bk->mar_bk();
        $data['apr_bk'] = $this->bk->apr_bk();
        $data['mei_bk'] = $this->bk->mei_bk();
        $data['jun_bk'] = $this->bk->jun_bk();
        $data['jul_bk'] = $this->bk->jul_bk();
        $data['agu_bk'] = $this->bk->agu_bk();
        $data['sep_bk'] = $this->bk->sep_bk();
        $data['okt_bk'] = $this->bk->okt_bk();
        $data['nov_bk'] = $this->bk->nov_bk();
        $data['des_bk'] = $this->bk->des_bk();

        $data['pegawai'] = $this->pegawai->getnumrows();
        $data['barang_masuk'] = $this->bm->getnumrows();
        $data['jml_barang'] = $this->tersedia->countbarang();
        $data['barang_keluar'] = $this->bk->getnumrows();

        // Data STM
        $data['kas'] = $this->stm->kas_stm();
        $data['totserah'] = $this->stm->total_serah();
        $data['pengeluaran'] = $this->stm->pengeluaran();

        // Data INFAQ
        $data['terkumpul'] = $this->infaq->terkumpul();
        $data['serah_infaq'] = $this->infaq->serahinfaq();
        $data['infaq_keluar'] = $this->infaq->infaq_keluar();
        $belumserah = $data['terkumpul']['total_terkumpul'] - $data['serah_infaq']['total_serah'];
        $data['belum_serah'] = $belumserah;

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('index', $data);
        $this->load->view('template/footer');
    }
}
