<?php

class Category{
    private $conn;
    private $table = 'categories';

    //category properties
    public $id;
    public $name;
    public $create_at;


    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT
        *
        FROM
        '.$this->table;
        //prepare
        $stmt = $this->conn->prepare($query);
        //execute 
        $stmt->execute();
        return $stmt;
    }    

}


