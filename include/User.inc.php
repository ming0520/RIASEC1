<?php

Class User extends Dbh{
    private $tableName =" users ";
    private $userDataArray = array();

    private $id;
    private $username;
    private $password;
    private $first_name;
    private $last_name;
    private $email;

    public function login($userDataArray = array()){
        if(!empty($userDataArray)){
            $this->userDataArray = $userDataArray;
            $this->username = $userDataArray["username"];
            $this->password = $userDataArray["password"];
            $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username=? AND password=?");
            $stmt->execute([$this->username,$this->password]);
            if($stmt->rowCount()){
                header("Location: question.php");
            }else{
                echo "Invalid account";
            }
            
        }
    }
}