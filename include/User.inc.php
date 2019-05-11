<?php

Class User extends Dbh{
    private $tableName ="users";
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
                while($row = $stmt->fetch()){
                    $this->id = $row["id"];
                    $this->first_name = $row["first_name"];
                    $this->last_name = $row["last_name"];
                    $this->email = $row["email"];
                }
                $this->set_session();
                header("Location: question.php");
            }else{
                echo "Invalid account";
            }
            
        }
    }

public function set_session(){
    $_SESSION["id"] = $this->id;
    $_SESSION["username"] = $this->username;
    $_SESSION["password"] = $this->password;
    $_SESSION["first_name"] = $this->first_name;
    $_SESSION["last_name"] = $this->last_name;
    $_SESSION["email"] = $this->email;
}

}

