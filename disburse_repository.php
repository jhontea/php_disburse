<?php

require("database.php");

class DisburseRepository
{
    private $table = "disburses";
    private $db;

    public $string;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function GetAll()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function Create($data)
    {
        $this->db->query("INSERT INTO disburses (transaction_id, amount, status, timestamp, bank_code, account_number, beneficiary_name, remark, receipt, time_served, fee) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
        return $this->db->executeFields($data);
    }

    public function Update($data)
    {
        $this->db->query("UPDATE disburses SET status = ?, receipt = ?, time_served = ? WHERE transaction_id = ?");
        return $this->db->executeFields($data);
    }

}