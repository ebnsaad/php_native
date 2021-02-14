<?php

session_start();
if($_SESSION['s_supplier']){
    unset($_SESSION['s_supplier']);
    header('location:login.php');
}
?>