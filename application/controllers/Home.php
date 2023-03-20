<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('notelp', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        $data['title'] = 'Website Layanan Pengaduan Masyarakat';

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/header');
            $this->load->view('home/index');
            $this->load->view('layout/footer');
            $this->load->view('layout/plugin');
        } else {

            $file = $_FILES['attach']['name'];

            if (!$file) {

                echo "<script>alert('Harap sertakan gambar atau video untuk memperjelas keterangan.')
            location.href=''</script>";
                return false;
            } else {

                $config['upload_path'] = './public/files';
                $config['allowed_types'] = 'jpg|png|mp4';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('attach')) {

                    echo "<script>alert('Gagal mengupload file. Periksa kembali ketentuan.')
            location.href=''</script>";
                } else {

                    $file = $this->upload->data('file_name');
                }
            }

            date_default_timezone_set("Asia/Jakarta");

            $data = [

                "tanggal" => date("d F Y"),
                "jam" => date("H:i"),
                "nama" => $this->input->post('nama'),
                "jk" => $this->input->post('jk'),
                "notelp" => $this->input->post('notelp'),
                "alamat" => $this->input->post('alamat'),
                "kategori" => $this->input->post('kategori'),
                "deskripsi" => $this->input->post('deskripsi'),
                "attach" => $file,
                "notif" => '1'
            ];

            $this->db->insert('pengaduan', $data);

            echo "<script>alert('Data pengaduan berhasil dikirim. Terima kasih atas laporan Anda.')
            location.href=''</script>";
        }
    }
}
