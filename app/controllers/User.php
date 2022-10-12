<?php
class User extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman User';
        $data['user'] = $this->model('User_model')->getAllUser();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah User';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('user/create', $data);
        $this->view('templates/footer');
    }

    public function simpanUser()
    {
        if ($_POST['password'] == $_POST['ulangi_password']) {
            $row = $this->model('User_model')->cekUsername();
            if ($row['username'] == $_POST['username']) {
                Flasher::setMessage('Gagal', 'Username yang anda masukan sudah pernah digunakan!', 'danger');
                header('location: ' . base_url . '/user/tambah');
                exit;
            } else {
                if ($this->model('User_model')->tambahUser($_POST) > 0) {
                    Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
                    header('location: ' . base_url . '/user');
                    exit;
                } else {
                    Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
                    header('location: ' . base_url . '/user');
                    exit;
                }
            }
        } else {
            Flasher::setMessage('Gagal', 'password tidak sama.', 'danger');
            header('location: ' . base_url . '/user/tambah');
            exit;
        }
    }
}
