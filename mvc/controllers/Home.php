<?php

// http://localhost/live/Home/Show/1/2

class Home extends Controller{

    function index(){        
        $this->checkIsAdmin();
        // Call Views
        $this->view("home", [
            'user' => $_SESSION['user']
        ]);
    }

    function login() {
        // Call Models
        $userModel = $this->model("UserModel");
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            // Call Views
            $this->view("login", []);

        } else if ($_SERVER['REQUEST_METHOD'] == "POST")  {
            $result = $userModel->getUser($_POST['username'], $_POST['password']);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if ($row[1] == "admin") {
                $_SESSION['user'] = "admin";
                header("Location: /sqli/home");
            }
            $this->index();
        }   
    }

    function logout() {
        unset($_SESSION['user']);
        $this->index();
    }
}
?>