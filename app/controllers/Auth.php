<?php
class Auth extends Controller
{
    public function index()
    {
        $data['title'] = 'Halaman Login';
        $this->view('auth', $data);
    }

    public function prosesLogin()
    {
        if ($row = $this->model('Auth_model')->login($_POST) > 0) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['nama'] = $row['nama'];
            $_SESSION['session_login'] = 'sudah_login';

            header('Location: ' . base_url . '/home');
            exit;
        } else {
            Flasher::setMessage('Gagal', 'Login', 'danger');
            header('Location: ' . base_url . '/auth');
            exit;
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . base_url . '/auth');
        exit;
    }
}
