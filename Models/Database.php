<?php

class Database
{
    protected $db = null;

    public function __construct()
    {
        $this->db = json_decode(file_get_contents('json/data.json'), true);
    }

    public function store($data)
    {
        $tempData = $this->db;
        $newData = $data;
        $tempData [] = $newData;
        $storeData = json_encode($tempData);
        if (file_put_contents("json/data.json", $storeData)) {
            return $data;
        }
        return false;
    }

    public function check($email, $password)
    {
        foreach ($this->db as $item) {
            if ($item['email'] == $email && $item['password'] == $password) {
                return $item;
            }
        }
        return false;
    }
    public function check_email($email)
    {
        foreach ($this->db as $item) {
            if ($item['email'] == $email) {
                return false;
            }
        }
        return true;
    }
}


