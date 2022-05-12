<?php

// http://localhost/live/Home/Show/1/2

class Notes extends Controller{
    
    function index(){        
        $this->checkIsAdmin();
        // Call Models
        $noteModel = $this->model("NotesModel");

        // Call Views
        $this->view("notes", [
            'user' => $_SESSION['user'],
            'result' => $noteModel->getAllNotes(),
        ]);
    }

    function search() {
        $this->checkIsAdmin();
        // Call Models
        $noteModel = $this->model("NotesModel");
        if (!$noteModel->searchNote($_GET['search'])) {
            echo mysqli_error($noteModel->con);
        }
        // Call Views
        $this->view("notes", [
            'user' => $_SESSION['user'],
            'result' => $noteModel->searchNote($_GET['search'])
        ]);
    }
}
?>