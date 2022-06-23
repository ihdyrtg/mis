<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Barang_model', 'barang');
        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('Barangkeluar_model', 'bk');
        $this->load->model('Pelaporan_model', 'pelaporan');
        $this->load->model('Ruang_model', 'ruang');
        $this->load->model('Lokasi_model', 'lokasi');
    }

    public function tor()
    {
        $data['title'] = 'Stok Barang | Management Inventory System';
        $data['page'] = 'Stok Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getall();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tersedia/index.php', $data);
        $this->load->view('template/footer');
    }

    public function barang_kosong()
    {
        $data['title'] = 'Stok Barang | Management Inventory System';
        $data['page'] = 'Barang Kosong';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getempty();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tersedia/barang-kosong.php', $data);
        $this->load->view('template/footer');
    }

    public function keterangan($id)
    {
        $data['title'] = 'Stok Barang | Management Inventory System';
        $data['page'] = 'Buat Keterangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getById($id);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim', [
            'required' => 'Keterangan harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('tersedia/keterangan.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->tersedia->updateKeterangan($this->uri->segment(3));
            $this->session->set_flashdata('message', 'Keterangan berhasil diperbaharui!');
            redirect('info/tor');
        }
    }

    public function lokasi()
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Barang Teridentifikasi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['lokasi'] = $this->lokasi->getallidentifikasi();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('lokasi/index.php', $data);
        $this->load->view('template/footer');
    }

    public function detail_lokasi($id)
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Lokasi Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['lokasi_barang'] = $this->lokasi->getByKodeBarang($id);
        $data['barang'] = $this->barang->getById($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('lokasi/detail-lokasi.php', $data);
        $this->load->view('template/footer');
    }

    public function cekbarang()
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Identifikasi Lokasi Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $this->form_validation->set_rules('inisial', 'Kode Barang', 'required', [
            'required' => 'Kode barang harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lokasi/cek-barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $kode = $this->input->post('inisial');

            $inisial = $this->db->get_where('barang', ['kode_barang' => $kode])->row_array();

            //jika kode inisial ada
            if ($inisial) {
                redirect('info/lokasi_barang/' . $kode);
            } else {
                $this->session->set_flashdata('message', 'Kode barang tidak terdaftar!');
                redirect('info/cekbarang');
            }
        }
    }

    public function lokasi_barang()
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Identifikasi Lokasi Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $kode = $this->uri->segment(3);

        /* memanggil function dari model yang akan digunakan */
        $data['cekbarang'] = $this->barang->get_inisialisasi($kode);
        $data['ruang'] = $this->ruang->getruang();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('lokasi/idenfitikasi-lokasi.php', $data);
        $this->load->view('template/footer');
    }

    public function action_lokbarang()
    {
        $barang_kode = $this->input->post('barang_kode');
        $ruang = $this->input->post('ruang');
        $jumlah = $this->input->post('jumlah');

        $jmldata = count($ruang);

        for ($i = 0; $i < $jmldata; $i++) {
            $this->lokasi->multipleInsert([
                'barang_kode' => $barang_kode,
                'ruang_id' => $ruang[$i],
                'jumlah' => $jumlah[$i],
            ]);
        }

        $this->session->set_flashdata('message', "Lokasi barang berhasil ditambahkan!");
        redirect('info/detail_lokasi/' . $barang_kode);
    }

    public function delete_lokasi($id)
    {
        $lokasi_barang = $this->db->get_where('lokasi', ['id_lokasi' => $id])->row_array();
        $this->lokasi->delete($id);
        $this->session->set_flashdata('message', 'Hapus daftar lokasi berhasil!');
        redirect('info/detail_lokasi/' . $lokasi_barang['barang_kode']);
    }

    public function edit_lokasi($id)
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Edit Lokasi Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['lokasi'] = $this->lokasi->getById($id);
        $data['ruang'] = $this->db->get('ruang')->result_array();

        $lokasi = $this->lokasi->getById($id);

        $this->form_validation->set_rules('ruang', 'Ruang', 'required', [
            'required' => 'Ruang harus diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('lokasi/edit-lokasi.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->lokasi->updateLokasi($id);
            $this->session->set_flashdata('message', 'Lokasi barang berhasil diubah!');
            redirect('info/detail_lokasi/' . $lokasi['barang_kode']);
        }
    }

    public function brusak()
    {
        $data['title'] = 'Lokasi Barang | Management Inventory System';
        $data['page'] = 'Barang Rusak';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang_rusak'] = $this->tersedia->barang_rusak();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('tersedia/barang-rusak.php', $data);
        $this->load->view('template/footer');
    }
}
