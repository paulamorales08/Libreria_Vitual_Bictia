<?php

session_start();
unset ($SESSION['idUsuario']);
session_destroy();

header('Location: http://localhost:8080/Libreria_Vitual_Bictia/');

?>