<?php
class Auth_model
{
    private $table = 'user';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function login($data)
    {
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', md5($data['password']));
        $data = $this->db->single();
        return $data;
    }
}
