<?php
session_start();

if (!isset($_SESSION['leng'])) {
  $_SESSION['leng']="es";
} 


$leng = $_SESSION['leng'];


if ($leng == "es") {
    $_SESSION['leng'] = "en";
} else {

    $_SESSION['leng'] = "es";
}


?>