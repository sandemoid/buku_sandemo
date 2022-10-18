<?php

class Buku extends Controller
{
    public function __construct()
    {
        if ($_SESSION['session_login'] != 'sudah_login') {
            Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
            header('location: ' . base_url . '/auth');
            exit;
        }
    }

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
        $data['title'] = 'Tambah Buku';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/create', $data);
        $this->view('templates/footer');
    }

    public function simpanBuku()
    {
        if ($this->model('Buku_model')->tambahDataBuku($_POST) > 0) {
            Flasher::setMessage('berhasil', 'ditambahkan', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('gagal', 'ditambahkan', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Buku';
        $data['buku'] = $this->model('Buku_model')->getBukuById($id);
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori($id);
        $this->view('templates/header', $data);
        $this->view('templates/sidebar', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function updateBuku()
    {
        if ($this->model('Buku_model')->updateDataBuku($_POST) > 0) {
            Flasher::setMessage('berhasil', 'diubah', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('gagal', 'diubah', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Buku_model')->deleteDataBuku($id) > 0) {
            Flasher::setMessage('berhasil', 'dihapus', 'success');
            header('Location: ' . base_url . '/buku');
            exit;
        } else {
            Flasher::setMessage('gagal', 'dihapus', 'danger');
            header('Location: ' . base_url . '/buku');
            exit;
        }
    }

    public function lihatlaporan()
    {
        $data['title'] = 'Data Laporan Buku';
        $data['buku'] = $this->model('Buku_model')->getAllBuku();
        $this->view('buku/lihatlaporan', $data);
    }

    public function laporan()
    {
        $data['buku'] = $this->model('Buku_model')->getAllBuku();

        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 14);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN BUKU', 0, 1, 'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(85, 6, 'JUDUL', 1);
        $pdf->Cell(30, 6, 'PENERBIT', 1);
        $pdf->Cell(30, 6, 'PENGARANG', 1);
        $pdf->Cell(15, 6, 'TAHUN', 1);
        $pdf->Cell(25, 6, 'KATEGORI', 1);
        $pdf->Ln();
        $pdf->SetFont('Arial', '', 10);

        foreach ($data['buku'] as $row) {
            $pdf->Cell(85, 6, $row['judul'], 1);
            $pdf->Cell(30, 6, $row['penerbit'], 1);
            $pdf->Cell(30, 6, $row['pengarang'], 1);
            $pdf->Cell(15, 6, $row['tahun'], 1);
            $pdf->Cell(25, 6, $row['nama_kategori'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', 'Laporan Buku.pdf', true);
    }
}
