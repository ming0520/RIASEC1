<?php

Class User extends Dbh{
    private $tableName ="users";
    private $userDataArray = array();
    private $riasec = array();

    private $id;
    private $username;
    private $password;
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
                $this->getRiasec();
                header("Location: question.php");
            }else{
                $this->alert("Invalid user account!");
            }
            
        }
    }

public function getRiasec(){
    $stmt = $this->connect()->prepare("SELECT * FROM riasec WHERE username=?");
    $stmt->execute([$_SESSION["username"]]);
    if($stmt->rowCount()){
        while($row = $stmt->fetch()){
            $_SESSION["riasec"] = array(
                'r' => $row['r_count'],
                'i' => $row['i_count'],
                'a' => $row['a_count'],
                's' => $row['s_count'],
                'e' => $row['e_count'],
                'c' => $row['c_count']
            );
        }
        arsort($_SESSION["riasec"]);
        $this->riasec = $_SESSION["riasec"];
    }else{
        $_SESSION["riasec"] = array(
            'r' => 0,
            'i' => 0,
            'a' => 0,
            's' => 0,
            'e' => 0,
            'c' => 0
        );
    }
}

public function set_session(){
    $_SESSION["id"] = $this->id;
    $_SESSION["username"] = $this->username;
    $_SESSION["password"] = $this->password;
    $_SESSION["first_name"] = $this->first_name;
    $_SESSION["last_name"] = $this->last_name;
    $_SESSION["email"] = $this->email;
    $_SESSION["role"] = "user";
}

public function show($userDataArray = array()){
    $this->userDataArray = $userDataArray;
    echo "<pre>" ; var_dump ($this->userDataArray) ; echo "</pre>";
}

public function alert($message){
    echo "<script type='text/javascript'>alert('$message');</script>";
}

public function register($userDataArray = array()){
    if(!empty($userDataArray)){
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$userDataArray["username"]]);
        if($stmt->rowCount()){
            $this->alert("Username existed! Please try a new username");
        }else{
            $stmt = $this->connect()->prepare("INSERT INTO users SET 
            first_name=?,last_name=?,identity=?,age=?,email=?,
            phone_number=?,username=?,password=?,ethnicity=?,qualification=?,yoc=?");
            $stmt->execute([
                $userDataArray["first_name"],
                $userDataArray["last_name"],
                $userDataArray["identity"],
                $userDataArray["age"],
                $userDataArray["email"],
                $userDataArray["phone_number"],
                $userDataArray["username"],
                $userDataArray["password"],
                $userDataArray["ethnicity"],
                $userDataArray["qualification"],
                $userDataArray["yoc"]
            ]);
            $this->alert("Register successfully!");
            header("Location: index.php");
        }
    }
}

public function update($userDataArray = array()){
    if(!empty($userDataArray)){
        $stmt = $this->connect()->prepare("UPDATE users SET 
        first_name=?,last_name=?,identity=?,age=?,
        phone_number=?,ethnicity=?,qualification=?,yoc=? WHERE
        username=?");

        $stmt->execute([
            $userDataArray["first_name"],
            $userDataArray["last_name"],
            $userDataArray["identity"],
            $userDataArray["age"],
            $userDataArray["phone_number"],
            $userDataArray["ethnicity"],
            $userDataArray["qualification"],
            $userDataArray["yoc"],
            $userDataArray["username"]
        ]);
        $this->alert("Update successfully!");
        header("Location: userData.php");
    }else{
        $this->alert("Update Failed!");
    }
    $this->alert("Update Failed!");
}

public function delete($username){
    $stmt = $this->connect()->prepare("DELETE FROM users WHERE username=?");
    $stmt->execute([$username]);
    $stmt = $this->connect()->prepare("
    ALTER TABLE users DROP COLUMN id;
    ALTER TABLE users ADD id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT;");
    $stmt->execute();
    $this->alert("User deleted!");
    header("Location: userData.php");
}

}

