<?php
class NotesModel extends DB{
    public function getAllNotes(){
        $qr = "SELECT * FROM notes";
        return mysqli_query($this->con, $qr);
    }

    public function getNoteByID($id){
        $qr = "SELECT * FROM notes where id = '{$id}'";
        return mysqli_query($this->con, $qr);
    }

    public function searchNote($str) {
        $qr = "SELECT * FROM notes where tieude like '%{$str}%'  or noidung like '%{$str}%'";
        return mysqli_query($this->con, $qr);
    }

}
?>