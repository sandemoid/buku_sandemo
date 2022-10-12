<?php

class Buku extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kategori/create', $data);
        $this->view('templates/footer');
    }

    public function simpanKategori()
    {
        if ($this->model('Kategori_model')->tambahDataKategori($_POST) > 0) {
            Flasher::setMessage('berhasil', 'ditambahkan', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('gagal', 'ditambahkan', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Kategori';
        $data['kategori'] = $this->model('Kategori_model')->getKategoriById($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('kategori/edit', $data);
        $this->view('templates/footer');
    }

    public function updateKategori()
    {
        if ($this->model('Kategori_model')->updateDataKategori($_POST) > 0) {
            Flasher::setMessage('berhasil', 'diubah', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('gagal', 'diubah', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Kategori_model')->deleteDataKategori($id) > 0) {
            Flasher::setMessage('berhasil', 'dihapus', 'success');
            header('Location: ' . base_url . '/kategori');
            exit;
        } else {
            Flasher::setMessage('gagal', 'dihapus', 'danger');
            header('Location: ' . base_url . '/kategori');
            exit;
        }
    }
}
