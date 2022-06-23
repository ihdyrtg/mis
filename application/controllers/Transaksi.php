<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('Barang_model', 'barang');
        $this->load->model('Barangmasuk_model', 'bm');
        $this->load->model('Barangkeluar_model', 'bk');
        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->helper('Pegawai_helper');
    }

    public function bm()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang_masuk'] = $this->bm->getall();
        $data['total_masuk'] = $this->bm->sum_jumlah();
        $data['total_bagus'] = $this->bm->sum_bagus();
        $data['total_rusak'] = $this->bm->sum_rusak();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barangmasuk/index.php', $data);
        $this->load->view('template/footer');
    }

    public function inisialisasi()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Tambah Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang'] = $this->barang->get_transaksi();

        $this->form_validation->set_rules('inisial', 'Kode Barang', 'required', [
            'required' => 'Kode barang harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangmasuk/inisialisasi.php');
            $this->load->view('template/footer');
        } else {
            $this->_cek_inisialisasi();
        }
    }

    private function _cek_inisialisasi()
    {
        $kode = $this->input->post('inisial');

        $inisial = $this->db->get_where('barang', ['kode_barang' => $kode])->row_array();

        //jika kode inisial ada
        if ($inisial) {
            redirect('transaksi/tambah_bm/' . $kode);
        } else {
            $this->session->set_flashdata('message', 'Kode barang tidak terdaftar!');
            redirect('transaksi/inisialisasi');
        }
    }

    public function tambah_bm()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Tambah Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $kode = $this->uri->segment(3);

        /* memanggil function dari model yang akan digunakan */
        $data['hasil_inisialisasi'] = $this->barang->get_inisialisasi($kode);

        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Total harus diisi!'
        ]);
        $this->form_validation->set_rules('bagus', 'Bagus', 'required', [
            'required' => 'Jumlah bagus harus diisi!'
        ]);
        $this->form_validation->set_rules('rusak', 'Rusak', 'required', [
            'required' => 'Jumlah rusak harus diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'Jumlah', 'required', [
            'required' => 'Tanggal masuk harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangmasuk/tambah-barang-masuk.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->bm->insertBarangMasuk();
            redirect('tersedia/update/' . $kode);
        }
    }

    public function edit_bm($id)
    {
        $data['title'] = 'Barang Masuk | Management Inventory System';
        $data['page'] = 'Edit Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['bmasuk'] = $this->bm->getById($id);

        $this->form_validation->set_rules('kode_barang', 'Kode barang', 'required', [
            'required' => 'Kode barang harus diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Total harus diisi!'
        ]);
        $this->form_validation->set_rules('bagus', 'Bagus', 'required', [
            'required' => 'Jumlah bagus harus diisi!'
        ]);
        $this->form_validation->set_rules('rusak', 'Rusak', 'required', [
            'required' => 'Jumlah rusak harus diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_masuk', 'Jumlah', 'required', [
            'required' => 'Tanggal masuk harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangmasuk/edit-barang-masuk.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->bm->updateBm($id);
            redirect('tersedia/ufem/' . $this->input->post('kode_barang'));
        }
    }

    public function delete_bm($id)
    {
        $bm = $this->db->get_where('barang_masuk', ['id_bm' => $id])->row_array();
        $a = $bm['barang_kode'];
        $b = $this->bm->getKodeBarangLikeId($a);
        $kode = $b['barang_kode'];
        $this->bm->delete($id);
        redirect('tersedia/ufdm/' . $kode);
    }

    public function bk()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang_keluar'] = $this->bk->getall();
        $data['total_keluar'] = $this->bk->sum_jumlah();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barangkeluar/index.php', $data);
        $this->load->view('template/footer');
    }

    public function authpegawai()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Autentikasi Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['pegawai'] = $this->pegawai->getall();

        $this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'required', [
            'required' => 'Id pegawai harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangkeluar/cek-pegawai.php', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id_pegawai');

            $idpegawai = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();

            //jika id pegawai ada
            if ($idpegawai) {
                //jika pegawai aktif
                if ($idpegawai['is_active'] == 1) {
                    redirect('transaksi/tambah_transaksi/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'Pegawai tidak aktif!');
                    redirect('transaksi/authpegawai');
                }
            } else {
                $this->session->set_flashdata('message', 'Id pegawai tidak terdaftar!');
                redirect('transaksi/authpegawai');
            }
        }
    }

    public function tambah_transaksi($id)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Transaksi Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang'] = $this->barang->get_transaksi();

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required', [
            'required' => 'Kode barang harus diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah harus diisi!'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangkeluar/satu-barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $kode = $this->input->post('kode_barang');
            $jumlah = $this->input->post('jumlah');

            $kode_barang = $this->db->get_where('barang', ['kode_barang' => $kode])->row_array();
            $tersedia = $this->db->get_where('barang_tersedia', ['barang_kode' => $kode])->row_array();

            //jika kode inisial ada
            if ($kode_barang) {
                //jika barang kosong
                if ($tersedia['jml_tersedia'] == true) {
                    //jika barang tidak cukup
                    if ($tersedia['jml_tersedia'] >= $jumlah) {
                        $this->bk->insertBarangKeluar();
                        $this->session->set_flashdata('message', 'Transaksi berhasil!');
                        redirect('tersedia/uft/' . $kode);
                    } else {
                        $this->session->set_flashdata('message', 'Barang ada tetapi tidak cukup, kurangi jumlah!');
                        redirect('transaksi/tambah_transaksi/' . $id);
                    }
                } else {
                    $this->session->set_flashdata('message', 'Barang kosong!');
                    redirect('transaksi/tambah_transaksi/' . $id);
                }
            } else {
                $this->session->set_flashdata('message', 'Kode barang tidak terdaftar!');
                redirect('transaksi/tambah_transaksi/' . $id);
            }
        }
    }

    public function cekpegawai()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $this->form_validation->set_rules('id_pegawai', 'Id Pegawai', 'required', [
            'required' => 'Id pegawai harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangkeluar/cek-data.php', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id_pegawai');

            $idpegawai = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();

            //jika id pegawai ada
            if ($idpegawai) {
                //jika pegawai aktif
                if ($idpegawai['is_active'] == 1) {
                    redirect('transaksi/tambah_bk/' . $id);
                } else {
                    $this->session->set_flashdata('message', 'Pegawai tidak aktif!');
                    redirect('transaksi/cekpegawai');
                }
            } else {
                $this->session->set_flashdata('message', 'Id pegawai tidak terdaftar!');
                redirect('transaksi/cekpegawai');
            }
        }
    }

    public function tambah_bk()
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        /* tampung data yang diperlukan */
        $data['pegawai_id'] = $this->uri->segment(3);

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barangkeluar/tambah-barang-keluar.php', $data);
        $this->load->view('template/footer');
    }

    public function actiontambah_bk()
    {
        $kode_barang = $this->input->post('kode_barang');
        $pegawai_id = $this->input->post('id_pegawai');
        $jumlah = $this->input->post('jumlah');
        $tanggal_keluar = $this->input->post('tanggal_keluar');

        $jmldata = count($kode_barang);

        for ($i = 0; $i < $jmldata; $i++) {
            $this->bk->multipleInsert([
                'barang_kode' => $kode_barang[$i],
                'pegawai_id' => $pegawai_id,
                'jumlah' => $jumlah[$i],
                'tanggal_keluar' => $tanggal_keluar[$i]
            ]);
        }

        $this->session->set_flashdata('message', "Transaksi sebanyak $jmldata barang dengan $pegawai_id selesai!");
        redirect('transaksi/bk');
    }

    public function edit_bk($id)
    {
        $data['title'] = 'Barang Keluar | Management Inventory System';
        $data['page'] = 'Edit Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['bkeluar'] = $this->bk->getById($id);
        $kode = $this->bk->getById($id);

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required', [
            'required' => 'Kode barang harus diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', [
            'required' => 'Jumlah barang harus diisi!'
        ]);
        $this->form_validation->set_rules('tanggal_keluar', 'Tanggal Keluar', 'required', [
            'required' => 'Tanggal Keluar harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangkeluar/edit-barang-keluar.php', $data);
            $this->load->view('template/footer');
        } else {
            $tersedia = $this->db->get_where('barang_tersedia', ['barang_kode' => $kode['barang_kode']])->row_array();
            //jika barang tidak cukup
            if ($tersedia['jml_tersedia'] + 1 >= $this->input->post('jumlah')) {
                $this->bk->updateBk($id);
                redirect('tersedia/ufek/' . $this->input->post('kode_barang'));
            } else {
                $this->session->set_flashdata('message', 'Barang ada tetapi tidak cukup, kurangi jumlah!');
                redirect('transaksi/edit_bk/' . $id);
            }
        }
    }

    public function delete_bk($id)
    {
        $data['title'] = 'Barang Keluar | Management Inventory System';
        $data['page'] = 'Edit Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $kode = $this->db->get_where('barang_keluar', ['id_keluar' => $id])->row_array();

        $data['bkeluar'] = $this->bk->getById($id);
        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode['barang_kode']);
        $data['rusak'] = $this->tersedia->total_rusak($kode['barang_kode']);

        $this->form_validation->set_rules('tersedia', 'Tersedia', 'required', [
            'required' => 'Barang tersedia kosong'
        ]);
        $this->form_validation->set_rules('delete', 'Tersedia', 'required', [
            'required' => 'Barang delete kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barangkeluar/delete-barang-keluar.php', $data);
            $this->load->view('template/footer');
        } else {
            $jml_tersedia = $this->input->post('tersedia');
            $jml_delete = $this->input->post('delete');
            $data = [
                'jml_tersedia' => $jml_tersedia + $jml_delete,
                'jml_rusak' => $this->input->post('jum_rusak')
            ];
            $this->tersedia->updateJumlah($data, $kode['barang_kode']);
            $this->bk->delete($id);
            $this->session->set_flashdata('message', 'Transaksi berhasil dihapus!');
            redirect('transaksi/bk');
        }
    }
}
