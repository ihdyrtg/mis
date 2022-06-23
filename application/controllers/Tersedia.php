<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tersedia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Tersedia_model', 'tersedia');
        $this->load->model('Barangmasuk_model', 'bm');
    }

    public function update($kode)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Masuk - Update Barang Tersedia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode);
        $data['masuk'] = $this->tersedia->total_masuk($kode);
        $data['keluar'] = $this->tersedia->total_keluar($kode);
        $data['rusak'] = $this->tersedia->total_rusak($kode);

        $tersedia = $this->tersedia->getByKodeBarang($kode);

        if ($tersedia['jml_tersedia'] == NULL) {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/update-first.php', $data);
                $this->load->view('template/footer');
            } else {
                $data = [
                    'jml_tersedia' => $this->input->post('jum_bagus'),
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk berhasil ditambahkan!');
                redirect('transaksi/bm');
            }
        } else {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_keluar', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/update.php', $data);
                $this->load->view('template/footer');
            } else {
                $total_bagus = $this->input->post('jum_bagus') - $this->input->post('jum_keluar');

                $data = [
                    'jml_tersedia' => $total_bagus,
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk dan berhasil ditambahkan!');
                redirect('transaksi/bm');
            }
        }
    }

    public function ufem($kode)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Masuk - Update Barang Tersedia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode);
        $data['masuk'] = $this->tersedia->total_masuk($kode);
        $data['keluar'] = $this->tersedia->total_keluar($kode);
        $data['rusak'] = $this->tersedia->total_rusak($kode);

        $tersedia = $this->tersedia->getByKodeBarang($kode);

        if ($tersedia['jml_tersedia'] == NULL) {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/updatebm-first.php', $data);
                $this->load->view('template/footer');
            } else {
                $data = [
                    'jml_tersedia' => $this->input->post('jum_bagus'),
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk dan berhasil diubah!');
                redirect('transaksi/bm');
            }
        } else {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_keluar', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/update-bm.php', $data);
                $this->load->view('template/footer');
            } else {
                $total_bagus = $this->input->post('jum_bagus') - $this->input->post('jum_keluar');

                $data = [
                    'jml_tersedia' => $total_bagus,
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk dan berhasil diubah!');
                redirect('transaksi/bm');
            }
        }
    }

    public function ufdm($kode)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Masuk - Update Barang Tersedia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode);
        $data['masuk'] = $this->tersedia->total_masuk($kode);
        $data['keluar'] = $this->tersedia->total_keluar($kode);
        $data['rusak'] = $this->tersedia->total_rusak($kode);

        $tersedia = $this->tersedia->getByKodeBarang($kode);

        if ($tersedia['jml_tersedia'] == NULL) {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/update-first-mdelete.php', $data);
                $this->load->view('template/footer');
            } else {
                $data = [
                    'jml_tersedia' => $this->input->post('jum_bagus'),
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk dan berhasil dihapus!');
                redirect('transaksi/bm');
            }
        } else {
            $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_keluar', 'Jumlah bagus', 'required', [
                'required' => 'Data total barang bagus kosong!'
            ]);
            $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
                'required' => 'Data total barang rusak kosong!'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('template/header', $data);
                $this->load->view('template/navbar', $data);
                $this->load->view('template/sidebar', $data);
                $this->load->view('tersedia/update-mdelete.php', $data);
                $this->load->view('template/footer');
            } else {
                $total_bagus = $this->input->post('jum_bagus') - $this->input->post('jum_keluar');

                $data = [
                    'jml_tersedia' => $total_bagus,
                    'jml_rusak' => $this->input->post('jum_rusak')
                ];

                $this->tersedia->updateTersedia($data);
                $this->session->set_flashdata('message', 'Data barang masuk dan berhasil dihapus!');
                redirect('transaksi/bm');
            }
        }
    }

    public function uft($kode)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Keluar - Update Barang Tersedia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode);
        $data['masuk'] = $this->tersedia->total_masuk($kode);
        $data['keluar'] = $this->tersedia->total_keluar($kode);
        $data['rusak'] = $this->tersedia->total_rusak($kode);

        $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
            'required' => 'Data total barang bagus kosong!'
        ]);
        $this->form_validation->set_rules('jum_keluar', 'Jumlah bagus', 'required', [
            'required' => 'Data total barang bagus kosong!'
        ]);
        $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
            'required' => 'Data total barang rusak kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('tersedia/update-keluar.php', $data);
            $this->load->view('template/footer');
        } else {
            $total_bagus = $this->input->post('jum_bagus') - $this->input->post('jum_keluar');

            $data = [
                'jml_tersedia' => $total_bagus,
                'jml_rusak' => $this->input->post('jum_rusak')
            ];

            $this->tersedia->updateTersedia($data);
            $this->session->set_flashdata('message', 'Transaksi berhasil!');
            redirect('transaksi/bk');
        }
    }

    public function ufek($kode)
    {
        $data['title'] = 'Transaksi | Management Inventory System';
        $data['page'] = 'Barang Keluar - Update Barang Tersedia';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tersedia'] = $this->tersedia->getByKodeBarang($kode);
        $data['masuk'] = $this->tersedia->total_masuk($kode);
        $data['keluar'] = $this->tersedia->total_keluar($kode);
        $data['rusak'] = $this->tersedia->total_rusak($kode);

        $this->form_validation->set_rules('jum_bagus', 'Jumlah bagus', 'required', [
            'required' => 'Data total barang bagus kosong!'
        ]);
        $this->form_validation->set_rules('jum_keluar', 'Jumlah bagus', 'required', [
            'required' => 'Data total barang bagus kosong!'
        ]);
        $this->form_validation->set_rules('jum_rusak', 'Jumlah rusak', 'required', [
            'required' => 'Data total barang rusak kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('tersedia/update-bk.php', $data);
            $this->load->view('template/footer');
        } else {
            $total_bagus = $this->input->post('jum_bagus') - $this->input->post('jum_keluar');

            $data = [
                'jml_tersedia' => $total_bagus,
                'jml_rusak' => $this->input->post('jum_rusak')
            ];

            $this->tersedia->updateTersedia($data);
            $this->session->set_flashdata('message', 'Transaksi berhasil!');
            redirect('transaksi/bk');
        }
    }
}
