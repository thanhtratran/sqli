<?php
    session_start();
    error_reporting(E_ERROR | E_PARSE);
    require_once "./mvc/Bridge.php";
    $myApp = new App();
?>