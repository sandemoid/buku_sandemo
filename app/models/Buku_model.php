<?php
class Buku_model
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        $this->db->query("SELECT buku.*, kategori.nama_kategori FROM buku JOIN kategori ON buku.id_kategori = kategori.id");
    }

    public function tambahDataBuku($data)
    {
        $query = "INSERT INTO buku VALUES ('', :nama_buku)";
        $this->db->query($query);
        $this->db->bind('nama_buku', $data['nama_buku']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function updateDataKategori($data)
    {
        $query = "UPDATE kategori SET
                    nama_kategori = :nama_kategori
                    WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteDataKategori($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
