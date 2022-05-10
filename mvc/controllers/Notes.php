<?php

// http://localhost/live/Home/Show/1/2

class Notes extends Controller{

    function index(){        
        if ($_SESSION['user'] != "admin") {
            header("Location: /sqli/home/login");
        }
        // Call Models
        $noteModel = $this->model("NotesModel");
        $row = mysqli_fetch_array($noteModel->getAllNotes(), MYSQLI_NUM);
        
        // Call Views
        $this->view("notes", [
            'user' => $_SESSION['user'],
            'row' => $row
        ]);
    }

    function login() {
        // Call Models
        $userModel = $this->model("UserModel");
        // Call Views
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->view("login", []);

        } else if ($_SERVER['REQUEST_METHOD'] == "POST")  {
            $result = $userModel->getUser($_POST['username'], $_POST['password']);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
            if ($row[1] == "admin") {
                $_SESSION['user'] = "admin";
                header("Location: /sqli/home");
                
            }
    
        }
        
    }
}
?>