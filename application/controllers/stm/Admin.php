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

        $this->load->model('stm/Stm_model', 'stm');
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Pelaporan_model', 'pelaporan');
        $this->load->helper('Pegawai_helper');
    }

    public function pembayaran()
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Daftar Pembayaran';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['stm'] = $this->stm->getall();
        $data['tahun'] = $this->stm->gettahun_stmbayar();
        $data['kas'] = $this->stm->kas_stm();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('stm/index.php', $data);
        $this->load->view('template/footer');
    }

    public function bayar()
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Bayar STM';
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
            $this->load->view('stm/bayar.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->stm->insertSTM();
            $this->session->set_flashdata('message', "STM berhasil dibayarkan");
            redirect('stm/admin/pembayaran');
        }
    }

    public function edit_bayar($id)
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Edit Bayar STM';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['stm'] = $this->stm->getById($id);
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
            $this->load->view('stm/edit-bayar.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->stm->updateSTM();
            $this->session->set_flashdata('message', "STM berhasil diubah!");
            redirect('stm/admin/pembayaran');
        }
    }

    public function delete_bayar($id)
    {
        $this->stm->delete_bayar($id);
        $this->session->set_flashdata('message', 'Pembayaran STM bulanan berhasil dihapus!');
        redirect('stm/admin/pembayaran');
    }

    public function serah()
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Serah Terima STM';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['pegawai'] = $this->pegawai->getall();

        // form validasi
        $this->form_validation->set_rules('tanggal_serah', 'Tanggal Serah', 'required', [
            'required' => 'Tanggal serah tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required', [
            'required' => 'Pegawai tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jenis STM tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('terbilang', 'Keterangan', 'required', [
            'required' => 'Jenis serah tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('stm/serah-terima.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->stm->insertSerahstm();
            $this->session->set_flashdata('message', "Pencatatan serah seterima berhasil!");
            redirect('stm/admin/prints');
        }
    }

    public function prints()
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Print Serah Terima STM';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['serah'] = $this->stm->getPrintserah();

        $id = $this->uri->segment(4);

        if ($id == null) {
            $this->load->view('stm/print-serah-terima.php', $data);
        } else {
            $data['serah2'] = $this->stm->getPrintserah($id);
            $this->load->view('stm/print-serah-terima.php', $data);
        }
    }

    public function history()
    {
        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Riwayat Serah STM';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['serah'] = $this->stm->getallSerah();
        $data['tahun'] = $this->stm->gettahun_stmserah();
        $data['total_serah'] = $this->stm->total_serah();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('stm/riwayat-serah.php', $data);
        $this->load->view('template/footer');
    }

    public function laporan()
    {
        $tahun = $this->input->post('tahun');

        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Laporan Iuran Bulanan Anggota STM <br> UPT Pusat Perpustakaan IAIN Padangsidimpuan' . 'Tahun ' . $tahun;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['laporan_stm'] = $this->stm->laporan_bulanan_stm($tahun);
        $data['total_laporan_bayar'] = $this->stm->total_laporan_bayar($tahun);

        $this->load->view('stm/print-laporan-tahunan.php', $data);
    }

    public function laporan_bulanan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data['title'] = 'Admin STM | Management Inventory System';
        $data['page'] = 'Laporan Pengeluaran STM Bulan ' . bulan($bulan) . ' Tahun ' . $tahun;
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['laporan_stm'] = $this->stm->laporan_bulanan_serah($bulan, $tahun);
        $data['total_laporan_serah'] = $this->stm->total_laporan_serah($bulan, $tahun);

        $this->load->view('stm/print-laporan-bulanan', $data);
    }
}
