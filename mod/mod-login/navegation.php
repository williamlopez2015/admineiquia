<?php
session_start();
if (isset($_SESSION["admin"])){
        include 'navadmin.php';
    } 
    else {
        if(isset($_SESSION["usuario"])){ 
            include 'navsecret.php';
        }
        }
        ?>