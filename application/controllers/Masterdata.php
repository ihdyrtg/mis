<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masterdata extends CI_Controller
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

    public function pegawai()
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Biodata Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['pegawai'] = $this->pegawai->get_profile();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pegawai/index.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah_pegawai()
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Tambah Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['bagian'] = $this->db->get('bagian')->result_array();
        $data['pegawai'] = $this->pegawai->getall();

        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required|trim', [
            'required' => 'Id pegawai harus diisi'
        ]);
        $this->form_validation->set_rules('nama_pegawai', 'Pegawai', 'required|trim', [
            'required' => 'Nama pegawai harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pegawai.email]', [
            'required' => 'Email harus diisi',
            'valid_email' => 'Email tersebut bukan email yang valid!',
            'is_unique' => 'Email tersebut sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pegawai/tambah-pegawai.php', $data);
            $this->load->view('template/footer');
        } else {
            //proses insert
            $this->_addpegawai();
        }
    }

    private function _addpegawai()
    {
        $this->load->library('upload');
        //validasi file foto
        $config['upload_path'] = './assets/img/profile';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048; //2Mb
        $media = $this->upload->data();
        $filename = './assets/img/' . $media['file_name'];
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Format file tidak sesuai!</div>');
            redirect('masterdata/tambah_pegawai');
        } else {
            $media1 = $this->upload->data();
            $filename = './assets/img/profile/' . $media1['file_name'];

            $data = [
                'id_pegawai' => $this->input->post('id_pegawai'),
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'bagian_id' => $this->input->post('bagian'),
                'foto' => $media1['file_name'],
                'is_active' => 1
            ];
        }
        $this->pegawai->insertPegawai($data);
        $this->session->set_flashdata('message', 'Data pegawai berhasil ditambahkan!');
        redirect('masterdata/pegawai');
    }

    public function edit_pegawai($id)
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Edit Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['pegawai'] = $this->pegawai->getById($id);
        $data['bagian'] = $this->db->get('bagian')->result_array();

        $this->form_validation->set_rules('id_pegawai', 'Pegawai', 'required|trim');
        $this->form_validation->set_rules('nama_pegawai', 'Pegawai', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'Email tersebut bukan email yang valid!',
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('pegawai/edit-pegawai.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->_updatepegawai();
        }
    }

    private function _updatepegawai()
    {
        $upload_profile = $_FILES['foto']['name'];

        //jika gambar diisi
        if ($upload_profile) {
            //setting profile
            $delete = $this->pegawai->deleteProfileById($this->uri->segment(3));
            $dir = "./assets/img/profile/" . $delete['foto'];
            unlink($dir);

            $this->load->library('upload');
            //validasi file foto
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size'] = 2048; //2Mb
            $media = $this->upload->data();
            $filename = './assets/img/' . $media['file_name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto')) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Format file tidak sesuai!</div>');
                redirect('masterdata/edit_pegawai');
            } else {
                $media1 = $this->upload->data();
                $filename = './assets/img/profile/' . $media1['file_name'];

                $data = [
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'nama_pegawai' => $this->input->post('nama_pegawai'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'bagian_id' => $this->input->post('bagian'),
                    'foto' => $media1['file_name'],
                    'is_active' => 1
                ];
            }
            $this->pegawai->updatePegawai($data);
            $this->session->set_flashdata('message', 'Data pegawai berhasil diubah!');
            redirect('masterdata/pegawai');
        } else {
            //jika file kosong
            $data = [
                'id_pegawai' => $this->input->post('id_pegawai'),
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'bagian_id' => $this->input->post('bagian'),
                'is_active' => 1
            ];
            $this->pegawai->updatePegawai($data);
            $this->session->set_flashdata('message', 'Data pegawai berhasil diubah!');
            redirect('masterdata/pegawai');
        }
    }

    public function activeted($id)
    {
        $pegawai = $this->pegawai->getById($id);
        $status = $pegawai['is_active'];

        $data = [
            'is_active' => 1
        ];
        $this->pegawai->updatePegawai($data);
        $this->session->set_flashdata('message', 'Status pegawai aktif!');
        redirect('masterdata/pegawai');
    }

    public function deactive($id)
    {
        $pegawai = $this->pegawai->getById($id);
        $status = $pegawai['is_active'];

        $data = [
            'is_active' => 0
        ];
        $this->pegawai->updatePegawai($data);
        $this->session->set_flashdata('message', 'Status pegawai deactive!');
        redirect('masterdata/pegawai');
    }

    public function detail($id)
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Detail Transaksi';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang_keluar'] = $this->bk->getByIdPegawai($id);
        $data['pegawai'] = $this->pegawai->getById($id);
        $data['tahun'] = $this->pelaporan->gettahun_bk();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pegawai/detail-transaksi.php', $data);
        $this->load->view('template/footer');
    }

    public function print_detail()
    {
        $data['title'] = 'Pegawau | Management Inventory System';
        $data['page'] = 'Filter Laporan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['tahun'] = $this->pelaporan->gettahun_bk();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('pegawai/filter-laporan.php', $data);
        $this->load->view('template/footer');
    }

    public function barang()
    {
        $data['title'] = 'Barang | Management Inventory System';
        $data['page'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang'] = $this->barang->getall();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('barang/index.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah_barang()
    {
        $data['title'] = 'Barang | Management Inventory System';
        $data['page'] = 'Tambah Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['lbh'] = $this->barang->getlbh();
        $data['lbth'] = $this->barang->getlbth();
        $data['jenis'] = $this->barang->getjenisbarang();

        $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|trim|is_unique[barang.kode_barang]', [
            'required' => 'Kode barang harus diisi',
            'is_unique' => 'Kode barang sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|trim', [
            'required' => 'Nama barang harus diisi',
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required|trim', [
            'required' => 'Jenis barang harus diisi',
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Nama barang harus diisi'
        ]);

        if ($this->form_validation->run() ==  false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barang/tambah-barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->barang->insertBarang();
            $this->tersedia->insertTersedia();
            $this->session->set_flashdata('message', 'Barang berhasil ditambahkan!');
            redirect('masterdata/barang');
        }
    }

    public function edit_barang($id)
    {
        $data['title'] = 'Barang | Management Inventory System';
        $data['page'] = 'Edit Barang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['barang'] = $this->barang->getById($id);
        $data['jenis'] = $this->db->get('jenis_barang')->result_array();

        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required|trim', [
            'required' => 'Jenis barang harus diisi',
        ]);
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required', [
            'required' => 'Nama barang harus diisi'
        ]);
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required|trim', [
            'required' => 'Jenis barang harus diisi',
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => 'Jenis satuan harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('barang/edit-barang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->barang->updateBarang($this->uri->segment(3));
            $this->session->set_flashdata('message', 'Barang berhasil diubah!');
            redirect('masterdata/barang');
        }
    }

    public function ruang()
    {
        $data['title'] = 'Ruang | Management Inventory System';
        $data['page'] = 'Data Ruangan';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['ruang'] = $this->ruang->getruang();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('ruang/index.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah_ruang()
    {
        $data['title'] = 'Ruang | Management Inventory System';
        $data['page'] = 'Tambah Ruang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|trim', [
            'required' => 'Nama ruang harus diisi',
        ]);
        $this->form_validation->set_rules('lantai', 'Lantai', 'required|trim', [
            'required' => 'Lantai harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('ruang/tambah-ruang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->ruang->insertRuang();
            $this->session->set_flashdata('message', 'Ruang baru berhasil ditambahkan!');
            redirect('masterdata/ruang');
        }
    }

    public function edit_ruang($id)
    {
        $data['title'] = 'Ruang | Management Inventory System';
        $data['page'] = 'Edit Ruang';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['ruang'] = $this->ruang->getById($id);
        $data['lantai'] = ['Lantai 1', 'Lantai 2', 'Lantai 3'];

        $this->form_validation->set_rules('nama_ruang', 'Nama Ruang', 'required|trim', [
            'required' => 'Nama ruang harus diisi',
        ]);
        $this->form_validation->set_rules('lantai', 'Lantai', 'required|trim', [
            'required' => 'Lantai harus diisi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('ruang/edit-ruang.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->ruang->updateRuang($id);
            $this->session->set_flashdata('message', 'Ruang berhasil diubah!');
            redirect('masterdata/ruang');
        }
    }

    public function penerima()
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Pegawai IAIN PSP';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['penerima'] = $this->pegawai->getpenerima();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('penerima/index.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah_penerima()
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Tambah Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $this->form_validation->set_rules('nama_penerima', 'Pegawai', 'required', [
            'required' => 'Nama pegawai harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('penerima/tambah-penerima.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->pegawai->insertPenerima();
            $this->session->set_flashdata('message', 'Pegawai berhasil diubah!');
            redirect('masterdata/penerima');
        }
    }

    public function edit_penerima($id)
    {
        $data['title'] = 'Pegawai | Management Inventory System';
        $data['page'] = 'Edit Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['penerima'] = $this->pegawai->getpenerima_byid($id);

        $this->form_validation->set_rules('nama_penerima', 'Pegawai', 'required', [
            'required' => 'Nama pegawai harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('penerima/edit-penerima.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->pegawai->updatePenerima();
            $this->session->set_flashdata('message', 'Pegawai berhasil diubah!');
            redirect('masterdata/penerima');
        }
    }

    public function delete_penerima($id)
    {
        $this->pegawai->delete_penerima($id);
        $this->session->set_flashdata('message', 'Pegawai berhasil dihapus!');
        redirect('masterdata/penerima');
    }

    public function unit()
    {
        $data['title'] = 'Unit | Management Inventory System';
        $data['page'] = 'Unit Kerja';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['unit'] = $this->pegawai->getunit();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('unit/index.php', $data);
        $this->load->view('template/footer');
    }

    public function tambah_unit()
    {
        $data['title'] = 'Unit | Management Inventory System';
        $data['page'] = 'Tambah Unit Kerja';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $this->form_validation->set_rules('nama_unit', 'Unit', 'required', [
            'required' => 'Unit kerja harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('unit/tambah-unit.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->pegawai->insertUnit();
            $this->session->set_flashdata('message', 'Unit kerja berhasil diubah!');
            redirect('masterdata/unit');
        }
    }

    public function edit_unit($id)
    {
        $data['title'] = 'Unit | Management Inventory System';
        $data['page'] = 'Edit Unit Kerja';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        // Data informasi notifikasi
        $all_notification = $this->tersedia->countempty();
        $data['all_notification'] = $all_notification;
        $data['barang_kosong'] = $this->tersedia->countempty();

        $data['unit'] = $this->pegawai->getunit_byid($id);

        $this->form_validation->set_rules('nama_unit', 'Unit', 'required', [
            'required' => 'Unit Kerja harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('unit/edit-unit.php', $data);
            $this->load->view('template/footer');
        } else {
            $this->pegawai->updateUnit();
            $this->session->set_flashdata('message', 'Unit kerja berhasil diubah!');
            redirect('masterdata/unit');
        }
    }

    public function delete_unit($id)
    {
        $this->pegawai->delete_unit($id);
        $this->session->set_flashdata('message', 'Unit kerja berhasil dihapus!');
        redirect('masterdata/unit');
    }
}
