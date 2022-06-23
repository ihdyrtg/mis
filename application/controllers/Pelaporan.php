<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('username')) {
            redirect('auth');
        }

        $this->load->model('Pelaporan_model', 'pelaporan');
        $this->load->model('Pegawai_model', 'pegawai');
        $this->load->model('Barangkeluar_model', 'bk');
        $this->load->model('Barangmasuk_model', 'bm');
        $this->load->model('Tersedia_model', 'tersedia');
    }

    public function masuk()
    {
        $data['title'] = 'Pelaporan | Management Inventory System';
        $data['page'] = 'Laporan Barang Masuk';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tahun'] = $this->pelaporan->gettahun_bm();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pelaporan/masuk.php', $data);
        $this->load->view('template/footer');
    }

    public function filter_bm()
    {
        $tahun2 = $this->input->post('tahun2');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalkakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tahun ' . $tahun2;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbytahun_bm($tahun2);
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan.php', $data);
            $this->load->view('template/footer');
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tanggal ' . tgl_bulan($tanggalawal) . ' - ' . tgl_bulan($tanggalkakhir);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbytanggal_bm($tanggalawal, $tanggalkakhir);
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan.php', $data);
            $this->load->view('template/footer');
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Bulan ' . bulan($bulanawal) . ' - ' . bulan($bulanakhir) . ' Tahun ' . $tahun1;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbybulan_bm($tahun1, $bulanawal, $bulanakhir);
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan.php', $data);
            $this->load->view('template/footer');
        }
    }

    public function print_bm()
    {
        $tahun2 = $this->input->post('tahun2');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalkakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tahun ' . $tahun2;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytahun_bm($tahun2);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('pelaporan/print-laporan.php', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tanggal ' . tgl_bulan($tanggalawal) . ' - ' . tgl_bulan($tanggalkakhir);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytanggal_bm($tanggalawal, $tanggalkakhir);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('pelaporan/print-laporan.php', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Bulan ' . bulan($bulanawal) . ' - ' . bulan($bulanakhir) . ' Tahun ' . $tahun1;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbybulan_bm($tahun1, $bulanawal, $bulanakhir);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_masuk'] = $this->bm->sum_jumlah();
            $data['total_bagus'] = $this->bm->sum_bagus();
            $data['total_rusak'] = $this->bm->sum_rusak();

            $this->load->view('pelaporan/print-laporan.php', $data);
        }
    }

    public function keluar()
    {
        $data['title'] = 'Pelaporan | Management Inventory System';
        $data['page'] = 'Laporan Barang Keluar';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tahun'] = $this->pelaporan->gettahun_bk();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pelaporan/keluar.php', $data);
        $this->load->view('template/footer');
    }

    public function filter_bk()
    {
        $tahun2 = $this->input->post('tahun2');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalkakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tahun ' . $tahun2;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbytahun_bk($tahun2);
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan2.php', $data);
            $this->load->view('template/footer');
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tanggal ' . tgl_bulan($tanggalawal) . ' - ' . tgl_bulan($tanggalkakhir);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbytanggal_bk($tanggalawal, $tanggalkakhir);
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan2.php', $data);
            $this->load->view('template/footer');
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Bulan ' . bulan($bulanawal) . ' - ' . bulan($bulanakhir) . ' Tahun ' . $tahun1;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            // Data informasi notifikasi
            $all_notification = $this->tersedia->countempty();
            $data['all_notification'] = $all_notification;
            $data['barang_kosong'] = $this->tersedia->countempty();

            $data['datafilter'] = $this->pelaporan->filterbybulan_bk($tahun1, $bulanawal, $bulanakhir);
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pelaporan/view-laporan2.php', $data);
            $this->load->view('template/footer');
        }
    }

    public function print_bk()
    {
        $tahun2 = $this->input->post('tahun2');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalkakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');

        if ($nilaifilter == 1) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tahun ' . $tahun2;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytahun_bk($tahun2);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('pelaporan/print-laporan2.php', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Tanggal ' . tgl_bulan($tanggalawal) . ' - ' . tgl_bulan($tanggalkakhir);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytanggal_bk($tanggalawal, $tanggalkakhir);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('pelaporan/print-laporan2.php', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'Bulan ' . bulan($bulanawal) . ' - ' . bulan($bulanakhir) . ' Tahun ' . $tahun1;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbybulan_bk($tahun1, $bulanawal, $bulanakhir);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['total_keluar'] = $this->bk->sum_jumlah();

            $this->load->view('pelaporan/print-laporan2.php', $data);
        }
    }

    public function print_permintaan()
    {
        $tahun2 = $this->input->post('tahun2');
        $tanggalawal = $this->input->post('tanggalawal');
        $tanggalkakhir = $this->input->post('tanggalakhir');
        $tahun1 = $this->input->post('tahun1');
        $bulanawal = $this->input->post('bulanawal');
        $bulanakhir = $this->input->post('bulanakhir');
        $nilaifilter = $this->input->post('nilaifilter');
        $id_pegawai = $this->input->post('id_pegawai');

        if ($nilaifilter == 1) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'tahun ' . $tahun2;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytahun_pegawai($tahun2, $id_pegawai);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['pegawai'] = $this->pegawai->getById($id_pegawai);

            $this->load->view('pelaporan/print-laporan3.php', $data);
        } elseif ($nilaifilter == 2) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'tanggal ' . tgl_bulan($tanggalawal) . ' - ' . tgl_bulan($tanggalkakhir);
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbytanggal_pegawai($tanggalawal, $tanggalkakhir, $id_pegawai);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['pegawai'] = $this->pegawai->getById($id_pegawai);

            $this->load->view('pelaporan/print-laporan3.php', $data);
        } elseif ($nilaifilter == 3) {
            $data['title'] = 'Pelaporan | Management Inventory System';
            $data['page'] = 'bulan ' . bulan($bulanawal) . ' - ' . bulan($bulanakhir) . ' tahun ' . $tahun1;
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

            $data['datafilter'] = $this->pelaporan->filterbybulan_pegawai($tahun1, $bulanawal, $bulanakhir, $id_pegawai);
            $data['kordinator'] = $this->pegawai->kordinator();
            $data['pegawai'] = $this->pegawai->getById($id_pegawai);

            $this->load->view('pelaporan/print-laporan3.php', $data);
        }
    }
}
