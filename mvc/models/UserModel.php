<?php
class UserModel extends DB{
    public function getUser($username, $password){
        $qr = "SELECT * FROM user where username='{$username}' and password = '{$password}'";
        return mysqli_query($this->con, $qr);
    }

}
?>