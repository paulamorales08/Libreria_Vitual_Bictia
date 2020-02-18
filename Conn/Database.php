<?php

if ( !defined('ROOT') && !defined('PATH')  ){
  define("ROOT", 'http://'.$_SERVER['HTTP_HOST'].'/LibreriaVitual');
  define("PATH", $_SERVER['DOCUMENT_ROOT'].'/LibreriaVitual');
}


class Databse{
  public $host = 'localhost';
  public $user = 'root';
  public $pass = '';
  public $db = 'proyectolibreria';
  private $conn;

  function __construct()
  {
    $this->conn = $this->connectToDatabase();
    return $this->conn;
  }

  /**
   * Método que nos permite conectarnos a la DB.
   * @return $conn -> conexión a la BD.
   */
  function connectToDatabase(){
    $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    if ( mysqli_connect_error() ){
      echo " Error de conexión: " . mysqli_connect_error();
    }
    return $conn;
  }
}