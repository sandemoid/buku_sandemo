<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cekUsername()
    {
        $username = $_POST['username'];
        $this->db->query("SELECT * FROM user WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->single();
    }

    public function tambahDataUser($data)
    {
        $query = "INSERT INTO user
                    VALUES
                    ('', :nama, :username, :password)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataUser($id)
    {
        $query = "DELETE FROM user WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateDataUser($data)
    {
        if (empty($data['password'])) {
            $query = "UPDATE user SET
                        nama = :nama
                        WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('id', $data['id']);
        } else {
            $query = "UPDATE user SET
                        nama = :nama,
                        password = :password
                        WHERE id = :id";
            $this->db->query($query);
            $this->db->bind('nama', $data['nama']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('id', $data['id']);
        }

        $this->db->execute();

        return $this->db->rowCount();
    }
}
