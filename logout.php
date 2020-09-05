<?php
    session_start();
    require "function.php";

    if(!isset($_SESSION["login"])) :
        header("Location: Login/login.php");
    endif;
    
    $_SESSION = [];
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit;

?>