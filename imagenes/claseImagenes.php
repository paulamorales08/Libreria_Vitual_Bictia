<?php
include_once('../Conn/Database.php');
    class Persona{

        public $id;
        public $nombres;
        public $apellidos;
        public $profesion;
        public $descripcion;
        public $conn;


        //Método por donde empieza nuestra clase;
        function __construct()
        {
            $db = new Database();
            $this->conn = $db->conectarse();
        }

        /** Función para insertar una nueva persona.*/
        function crearPersona($data){
            $nombres = $data['nombres'];
            $apellidos = $data['apellidos'];
            $profesion = $data['profesion'];
            $descripcion = $data['descripcion'];
            $sql = "INSERT INTO personas (nombres, apellidos, profesion, descripcion) VALUES ('$nombres','$apellidos','$profesion','$descripcion')";
            $res = mysqli_query($this->conn, $sql);

            if ($res){
                return true;
            }
            else{
                return false;
            }

        }

        function obtenerPersonas(){
            $sql = "SELECT * FROM personas";
            return mysqli_query($this->conn, $sql);
        }

        function obtenerPersona($id){
            $sql = "SELECT * FROM personas WHERE id=$id";
            echo $sql;
            return mysqli_fetch_object(mysqli_query($this->conn, $sql));
        }
        function modificarPersona($data){
            $nombres = $data['nombres'];
            $apellidos = $data['apellidos'];
            $profesion = $data['profesion'];
            $descripcion = $data['descripcion'];
            $id = $data['id'];
            $sql = "UPDATE personas SET nombres='$nombres',apellidos='$apellidos',profesion='$profesion',descripcion='$descripcion' WHERE id=$id ";
            $update = mysqli_query($this->conn, $sql);

            if ($update){
                return true;
            }
            else{
                return false;
            }            
        }

        function eliminarPersona($id){
            $sql = "DELETE FROM personas WHERE id=$id ";
            $delete = mysqli_query($this->conn, $sql);

            if ($delete){
                return true;
            }
            else{
                return false;
            }            
        }
    }
