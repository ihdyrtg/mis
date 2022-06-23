<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sirkulasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('Sirkulasi_model', 'sirkulasi');
        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Pegawai_model', 'pegawai');
    }

    public function index()
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Sirkulasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['sirkulasi'] = $this->sirkulasi->getpinjam();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('sirkulasi/index', $data);
        $this->load->view('template/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['detail'] = $this->sirkulasi->getbyid($id);
        $data['barang_invoice'] = $this->sirkulasi->getbyinvoice($id);
        $data['subtotal'] = $this->sirkulasi->getsubtotal($id);


        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('sirkulasi/detail-sirkulasi', $data);
        $this->load->view('template/footer');
    }

    public function tambah_sirkulasi()
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Pinjam Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['sirkulasi'] = $this->sirkulasi->getall();
        $data['barang'] = $this->barang->getforsirkulasi();
        $data['pegawai'] = $this->pegawai->getadmin_mis();
        $data['penerima'] = $this->pegawai->getpenerima();
        $data['unit'] = $this->pegawai->getunit();

        // form validasi
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required', [
            'required' => 'Tanggal pinjam tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required', [
            'required' => 'Tanggal pinjam tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('sirkulasi/tambah-sirkulasi', $data);
            $this->load->view('template/footer');
        } else {
            //kode invoice otomatis
            $query = $this->sirkulasi->getmaxid();
            $kode = $query['maxID'];
            $kode++;
            $invoice = sprintf("%03s", $kode);

            // multiple insert
            $barang_kode = $this->input->post('kode_barang');
            $jumlah = $this->input->post('jumlah');
            $penerima = $this->input->post('penerima');
            $jmldata = count($barang_kode);

            for ($i = 0; $i < $jmldata; $i++) {
                $this->sirkulasi->multipleInsert([
                    'invoice' => $invoice,
                    'barang_kode' => $barang_kode[$i],
                    'jumlah' => $jumlah[$i],
                    'pegawai_id' => $this->input->post('id_pegawai'),
                    'penerima_barang' => $penerima,
                    'unit' => $this->input->post('unit'),
                    'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
                    'tanggal_kembali' => $this->input->post('tanggal_kembali'),
                    'keterangan' => 'pinjam'
                ]);
            }
            $this->session->set_flashdata('message', "Selesai transaksi dengan $penerima");
            redirect('sirkulasi');
        }
    }

    public function pengembali()
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Pengembali Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['penerima'] = $this->pegawai->getpenerima();

        $this->form_validation->set_rules('pengembali', 'Pengembali', 'required', [
            'required' => 'Pengembali barang tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('sirkulasi/pengembali', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('invoice');
            $pengembali = $this->input->post('pengembali');
            redirect('sirkulasi/kembali/' . $id . '/' . $pengembali);
        }
    }

    public function kembali($id)
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Kembalikan Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang_invoice'] = $this->sirkulasi->getforreturn($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('sirkulasi/return-barang', $data);
        $this->load->view('template/footer');
    }

    public function action_kembali($id, $pengembali, $invoice)
    {
        $detail = $this->sirkulasi->getbyid($id);
        $barang = $detail['nama_barang'];
        $kembali = $detail['tanggal_kembali'];

        $this->sirkulasi->kembali($id, $kembali, $pengembali);
        $this->session->set_flashdata('message', "$barang telah dikembalikan");
        redirect('sirkulasi/kembali/' . $invoice . '/' . $pengembali);
    }

    public function print_invoice($id)
    {
        $data['title'] = 'Print Transaksi Sirkulasi | Management Inventory System';

        $data['detail'] = $this->sirkulasi->getbyid($id);
        $data['barang_invoice'] = $this->sirkulasi->getbyinvoice($id);
        $data['subtotal'] = $this->sirkulasi->getsubtotal($id);
        $data['kordinator'] = $this->pegawai->kordinator();

        $this->load->view('sirkulasi/print', $data);
    }

    public function history()
    {
        $data['title'] = 'Sirkulasi | Management Inventory System';
        $data['page'] = 'Sejarah Peminjaman';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['history'] = $this->sirkulasi->getall();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('sirkulasi/history-sirkulasi', $data);
        $this->load->view('template/footer');
    }
}
