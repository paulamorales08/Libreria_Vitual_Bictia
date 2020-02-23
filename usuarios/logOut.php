<?php

session_start();
unset ($SESSION['idUsuario']);
session_destroy();

header('Location: http://localhost/Libreria_Vitual_Bictia/');

?>