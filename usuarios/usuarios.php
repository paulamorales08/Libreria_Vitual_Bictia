<?php
 include_once(PATH.'/Conn/Database.php');

class Usuario
{
    public $conn;
    public $nomUsuario;
    public $nombres;
    public $apellidos ;
    public $contrasena;
    public $root = ROOT;
    public $path = PATH;

    function __construct()
    {
      $db = new Databse();
      $this->conn =  $db->__construct();
    }

    function crearUsuario($data){
        var_dump("wewe");
        $nomUsuario = $data['nomUsuario'];
        $nombres = $data['Nombres'];
        $apellidos = $data['Apellidos'];
        $contrasena = $data['Contrasena'];

        $sql = "INSERT INTO usuarios (nombreUsuario,nombres,apellidos,contrasena) 
                VALUES ('$nomUsuario','$nombres','$apellidos','$contrasena')";
        echo "holaa $sql" ;
                
        $res = mysqli_query($this->conn,$sql);

        if($res){
            return true;
        }
        else{
            return false;
        }
    }




}
