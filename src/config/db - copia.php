<?php
  class db{
    private $dbHost ='localhost';
    private $dbUser = 'id13926599_root';
    private $dbPass = 'j13754596';
    private $dbName = 'id13926599_vitae';
    //conección 
    public function conectDB(){
      $mysqlConnect = "mysql:host=$this->dbHost;dbname=$this->dbName";
      $dbConnecion = new PDO($mysqlConnect, $this->dbUser, $this->dbPass);
      $dbConnecion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $dbConnecion;
    }
  }
