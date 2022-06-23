<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('infaq/Infaq_model', 'infaq');
        $this->load->model('Pelaporan_model', 'pelaporan');
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->helper('Pegawai_helper');
    }

    public function pembayaran()
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Daftar Pembayaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['infaq'] = $this->infaq->getall();
        $data['tahun'] = $this->infaq->gettahun_infaqbayar();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('infaq/index.php', $data);
        $this->load->view('template/footer');
    }

    public function bayar()
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Setor Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pegawai'] = $this->pegawai->getall();

        // form validasi
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required', [
            'required' => 'Pegawai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('infaq/bayar-infaq.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->infaq->insertInfaq();
            $this->session->set_flashdata('message', "Infaq berhasil disetor");
            redirect('infaq/admin/pembayaran');
        }
    }

    public function edit_bayar($id)
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Edit Setor Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['infaq'] = $this->infaq->getById($id);
        $data['pegawai'] = $this->pegawai->getall();

        // form validasi
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required', [
            'required' => 'Pegawai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('infaq/edit-bayar.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->infaq->updateInfaq();
            $this->session->set_flashdata('message', "Infaq berhasil diubah!");
            redirect('infaq/admin/pembayaran');
        }
    }

    public function delete_bayar($id)
    {
        $this->infaq->delete_bayar($id);
        $this->session->set_flashdata('message', 'Infaq bulanan berhasil dihapus!');
        redirect('infaq/admin/pembayaran');
    }

    public function dana()
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Serah Dana Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['tahun'] = $this->infaq->gettahun_infaqbayar();

        $this->form_validation->set_rules('bulan', 'Bulan', 'required', [
            'required' => 'Bulan tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required' => 'Tahun tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('infaq/dana.php', $data);
            $this->load->view('template/footer');
        } else {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            redirect('infaq/admin/serah/' . $bulan . '/' . $tahun);
        }
    }

    public function serah($bulan, $tahun)
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Serah Dana Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['kepala'] = $this->pegawai->get_kepalaperpus();
        $data['sum_bulan'] = $this->infaq->sum_bulan($bulan, $tahun);

        // form validasi
        $this->form_validation->set_rules('tanggal_serah', 'Tanggal Serah', 'required', [
            'required' => 'Tanggal serah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('kepada', 'Kepala Perpus', 'required', [
            'required' => 'Kepala perpus tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('terbilang', 'Keterangan', 'required', [
            'required' => 'Keterangan tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('infaq/serah-dana.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->infaq->insertSerahinfaq();
            $this->session->set_flashdata('message', "Serah dana infaq berhasil!");
            redirect('infaq/admin/prints');
        }
    }

    public function prints()
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Print Serah Dana Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $id = $this->uri->segment(4);

        if ($id == null) {
            $data['serah'] = $this->infaq->getPrintserah();
            $data['kepala'] = $this->pegawai->get_kepalaperpus();
            $this->load->view('infaq/print-serah-infaq.php', $data);
        } else {
            $data['serah2'] = $this->infaq->getPrintserah($id);
            $data['kepala'] = $this->pegawai->get_kepalaperpus();
            $this->load->view('infaq/print-serah-infaq.php', $data);
        }
    }

    public function history()
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Riwayat Serah Dana Infaq';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['serah'] = $this->infaq->getallSerah();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('infaq/riwayat-serah.php', $data);
        $this->load->view('template/footer');
    }

    public function laporan()
    {
        $tahun = $this->input->post('tahun');

        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Laporan Pengutipan Infaq Pembangunan Masjid IAIN Padangsidimpuan ' . 'Tahun ' . $tahun;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['laporan_infaq'] = $this->infaq->laporan_tahunan_infaq($tahun);
        $data['sum_tahun'] = $this->infaq->sum_tahun($tahun);

        $this->load->view('infaq/print-laporan-tahunan.php', $data);
    }

    public function detail_serah($id)
    {
        $data['title'] = 'Admin Infaq | Management Inventory System';
        $data['page'] = 'Detail Serah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $serah = $this->db->get_where('infaq_serah', ['id_serah' => $id])->row_array();
        $tanggal = $serah['tanggal_serah'];
        $bulan = date('m', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));

        $data['detail'] = $this->infaq->detail_bayar($bulan, $tahun);
        $data['serah'] = $this->db->get_where('infaq_serah', ['id_serah' => $id])->row_array();
        $data['sum_detail'] = $this->infaq->sum_detail($bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('infaq/detail-serah.php', $data);
        $this->load->view('template/footer');
    }
}
