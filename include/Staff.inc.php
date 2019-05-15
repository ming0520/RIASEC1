<?php

Class Staff extends Dbh{

    private $id;
    private $username;
    private $password;
    private $email;
    private $userDataArray = array();
    public $all_user_data = array();

    public function alert($message){
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

    public function login($userDataArray = array()){
        if(!empty($userDataArray)){
            $this->userDataArray = $userDataArray;
            $this->username = $userDataArray["username"];
            $this->password = $userDataArray["password"];
            $stmt = $this->connect()->prepare("SELECT * FROM staff WHERE username=? AND password=?");
            $stmt->execute([$this->username,$this->password]);
            if($stmt->rowCount()){
                while($row = $stmt->fetch()){
                    $this->id = $row["id"];
                    $this->first_name = $row["first_name"];
                    $this->last_name = $row["last_name"];
                    $this->email = $row["email"];
                }
                $this->set_session();
                header("Location: userData.php");
            }else{
                $this->alert("Invalid staff account!");
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
        $_SESSION["role"] = "staff";
    }

    public function get_all_users(){
        $query = "SELECT * FROM riasec a INNER JOIN users b on a.username = b. username WHERE 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        if($stmt->rowCount()){
            while($row = $stmt->fetch()){
                $this->all_user_data[] = $row;
            }
        }
    }
}