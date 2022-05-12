<?php
class Controller{

    function checkIsAdmin() {
        if ($_SESSION['user'] != "admin") {
            header("Location: /sqli/home/login");
        }
    }
    
    public function model($model){
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once "./mvc/views/".$view.".php";
    }

}
?>