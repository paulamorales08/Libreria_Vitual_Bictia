<?php
 include($_SERVER['DOCUMENT_ROOT'] . '/Libreria_Vitual_Bictia/Conn/config.php');
 include_once(PATH . '/Conn/Database.php');
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
        $nomUsuario = $data['nomUsuario'];
        $nombres = $data['Nombres'];
        $apellidos = $data['Apellidos'];
        $contrasena = $data['Contrasena'];

        $sql = "INSERT INTO usuarios (nombreUsuario,nombres,apellidos,contrasena,estado,idRol) 
                VALUES ('$nomUsuario','$nombres','$apellidos','$contrasena',1,1)";
        
                
        $res = mysqli_query($this->conn,$sql);

        if($res){
            return true;
        }
        else{
            return false;
        }
    }

    function consultaUsuario($data){
            $nomUsuario = $data['Usuario'];
            $contrasena = $data['Password'];

            $sql = "SELECT idUsuario FROM usuarios WHERE nombreUsuario = '$nomUsuario'  AND contrasena = '$contrasena'";
            echo "consulta,$sql";

            $resultado = mysqli_query($this->conn,$sql);

            if ($resultado) {
                var_dump("Resultado",$resultado);
                $row = $resultado->fetch_assoc();
                $_SESSION['id'] = $row['idUsuario'];
                header("Location:../index.php");
            }else{
                echo "usuario o contraseña incorrecta";
                
            }
        }
    }

