<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['title'] = 'Admin Login';

        if ($this->session->userdata('email')) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            Anda sudah login atau berada di sesi terkini.
        </div>');
            redirect('admin/dashboard');
        } else {

            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('admin/index', $data);
            } else {

                $this->_login();
            }
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            if ($password == $user['password']) {

                $data = [

                    'id_user' => $user['id_user']
                ];

                $this->session->set_userdata($data);
                redirect('admin/dashboard');
            } else {

                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Password salah! mohon periksa kembali.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('admin/');
            }
        } else {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Email salah! mohon periksa kembali.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama');

        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Berhasil logout.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/');
    }

    public function lupa()
    {
        $data['title'] = 'Lupa Password';

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/lupa', $data);
        } else {

            $email = $this->input->post('email');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {

                $data = [

                    'email' => $user['email']
                ];

                $this->session->set_userdata($data);
                redirect('admin/gantipass');
            } else {
                echo "gagal";
            }
        }
    }

    public function gantipass()
    {
        if (!$this->session->userdata('email')) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           Silahkan masukkan Email untuk mengakses halaman.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/lupa');
        } else {

            $data['title'] = 'Konfirmasi Perubahan Password';

            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->form_validation->set_rules('password1', 'Password', 'required|min_length[3]|max_length[15]');
            $this->form_validation->set_rules('password2', 'Password', 'required|min_length[3]|max_length[15]|matches[password1]');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('admin/gantipass', $data);
            } else {

                $data = [

                    "password" => $this->input->post('password2'),
                    "email" => $this->input->post('email')
                ];

                $verif = $this->db->get_where('user', ['email' => $data['email']])->row_array();

                if ($verif) {

                    $this->db->where('email', $data['email']);
                    $this->db->update('user', $data);

                    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Berhasil mengubah password. Silahkan login.
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>');

                    $this->session->unset_userdata('email');
                    redirect('admin/');
                } else {
                    echo "gagal";
                }
            }
        }
    }

    public function dashboard()
    {

        if (!$this->session->userdata('id_user')) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           Silahkan login untuk mengakses halaman.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/');
        } else {

            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $data['getjumlahpengaduan'] = $this->db->get('pengaduan')->num_rows();
            $data['getAllPengaduan'] = $this->db->get('pengaduan')->result_array();

            $order = $this->db->order_by('id_pengaduan', 'DESC');

            $data['notifpengaduan'] = $this->db->get('pengaduan', 5, 0, $order)->result_array();

            $data['title'] = 'Admin Panel | Dashboard';

            $this->load->view('layout2/head', $data);
            $this->load->view('layout2/sidebar');
            $this->load->view('layout2/topbar', $data);
            $this->load->view('admin/dashboard', $data);
            $this->load->view('layout2/footer');
            $this->load->view('layout2/plugin');
        }
    }

    public function pengaduan()
    {

        if (!$this->session->userdata('id_user')) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           Silahkan login untuk mengakses halaman.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/');
        } else {

            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $order = $this->db->order_by('id_pengaduan', 'DESC');

            $data['getAllPengaduan'] = $this->db->get('pengaduan')->result_array();

            $data['title'] = 'Admin Panel | Laporan Pengaduan';

            $data['notifpengaduan'] = $this->db->get('pengaduan', 5, 0, $order)->result_array();


            $this->load->view('layout2/head', $data);
            $this->load->view('layout2/sidebar');
            $this->load->view('layout2/topbar', $data);
            $this->load->view('admin/pengaduan', $data);
            $this->load->view('layout2/footer');
            $this->load->view('layout2/plugin');
        }
    }

    public function hapuspengaduan($id)
    {

        $data['pengaduan'] = $this->db->get_where('pengaduan', ['id_pengaduan' => $id])->row_array();

        $oldimg = $data['pengaduan']['attach'];
        unlink(FCPATH . './public/files/' . $oldimg);
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');

        $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        Data berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect('admin/pengaduan');
    }

    public function notif()
    {
        $data = [

            "notif" => 0
        ];
        $this->db->update('pengaduan', $data);
        redirect('admin/dashboard');
    }

    public function profil()
    {
        if (!$this->session->userdata('id_user')) {

            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           Silahkan login untuk mengakses halaman.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('admin/');
        } else {

            $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

            $data['getjumlahpengaduan'] = $this->db->get('pengaduan')->num_rows();
            $data['getAllPengaduan'] = $this->db->get('pengaduan')->result_array();

            $order = $this->db->order_by('id_pengaduan', 'DESC');

            $data['notifpengaduan'] = $this->db->get('pengaduan', 5, 0, $order)->result_array();

            $data['title'] = 'Admin Panel | Profil';

            $this->form_validation->set_rules('nama', 'Nama', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('username', 'Username', 'required');

            if ($this->form_validation->run() == FALSE) {

                $this->load->view('layout2/head', $data);
                $this->load->view('layout2/sidebar');
                $this->load->view('layout2/topbar', $data);
                $this->load->view('admin/profil', $data);
                $this->load->view('layout2/footer');
                $this->load->view('layout2/plugin');
            } else {

                $id = $this->input->post('id_user');
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');
                $username = $this->input->post('username');

                $upload_image = $_FILES['gambar']['name'];

                if ($upload_image) {

                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './public/files/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {

                        $oldimg = $data['user']['gambar'];
                        unlink(FCPATH . 'public/files/' . $oldimg);

                        $newimg = $this->upload->data('file_name');
                        $this->db->set('gambar', $newimg);
                    } else {

                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('nama', $nama);
                $this->db->set('email', $email);
                $this->db->set('username', $username);
                $this->db->where('id_user', $id);
                $this->db->update('user');

                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Berhasil memperbarui data.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('admin/profil');
            }
        }
    }
}
