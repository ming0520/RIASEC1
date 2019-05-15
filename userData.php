<?php 
    session_start();
    include_once("include/Dbh.inc.php");
    include_once("include/Staff.inc.php");

    if(empty($_SESSION["username"])){
        header("Location: staff_login.php");
    }

    include_once("include/Dbh.inc.php");
    include_once("include/User.inc.php");
    
    $userDataArray = array();
    if(isset($_POST['update'])){

        $userDataArray = array(
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "identity" => $_POST["identity"],
            "age" => $_POST["age"],
            "email" => $_POST["email"],
            "phone_number" => $_POST["phone_number"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "ethnicity" => $_POST['ethnicity'],
            "qualification" => $_POST['qualification'],
            "yoc" => $_POST["yoc"]
        );
        echo "<pre>";
        print_r($userDataArray);
        echo "</pre>";

        $user = new User();
        $user->update($userDataArray);
        header("Location: userData.php");
    }

    if(isset($_POST['delete'])){
        $user = new User();
        $user->delete($_POST['username']);
        header("Location: userData.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/userData.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/style.css">
    <title>RIASEC</title>
</head>
<div class="">
    <div class="user_pannel" style="margin-top:-300px;">
        <p>Username: <?php echo $_SESSION["username"]; ?></p>
        <p>Name: <?php echo $_SESSION["first_name"] . $_SESSION['last_name']; ?></p>
        <p>E-mail: <?php echo $_SESSION["email"]; ?></p>
        <p>Role: <?php echo $_SESSION['role']; ?></p>
        <form method="post" action="staff_logout.php">
            <button type="submit" class="btn-danger btn-block btn-large" name="logout">Logout</button>
        </form>
    </div>
</div>

<body class="container-form" style="margin:0; margin-top:300px;">

    <center>
        <h1>User Data</h1>
    </center>
    <div class="col">
        <div class="">
            <table border="1" style="font-size:0.9rem;">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>First name</td>
                <td>Last Name</td>
                <td>Age</td>
                <td>E-mail</td>
                <td>Phone Number</td>
                <td>IC / Passport</td> 
                <td>Ethnicity</td>
                <td>Qualification</td>
                <td>Year of completion</td>
                <td>R</td>
                <td>I</td>
                <td>A</td>
                <td>S</td>
                <td>E</td>
                <td>C</td>
                <td>Operation</td>
            </tr>
            <?php
                $staff = new Staff();
                $staff->get_all_users();
                $user_array = $staff->all_user_data;
                $user_count = 1;
                $string =" ";
                foreach($user_array as $user){
                    $string = "<tr><form action='". $_SERVER['PHP_SELF']."' class='user' method='post'><td>".
                    $user_count . "</td> " . 
                    "<td>".$user['username'] .      " <input type = 'text' class='hidden'  value = '". $user['username']        ."' name = 'username' disabled" ."</td>".
                    "<td>".$user['first_name'].     " <input type = 'text' class='edit-user'  value = '". $user['first_name']      ."' name = 'first_name' required='required' " . "</td>".
                    "<td>".$user['last_name'].      " <input type = 'text' class='edit-user'  value = '". $user['last_name']       ."' name = 'last_name' required='required' " . "</td>".
                    "<td>".$user['age'] .           " <input type = 'text' class='edit-user'  value = '". $user['age']             ."' name = 'age' required='required' ". "</td>".
                    "<td>".$user['email'] .         " <input type = 'text' class='hidden'  value = '". $user['email']           ."' name = 'email disabled' ". "</td>".
                    "<td>".$user['phone_number'] .  " <input type = 'text' class='edit-user'  value = '". $user['phone_number']    ."' name = 'phone_number' required='required' ". "</td>".
                    "<td>".$user['identity'] .      " <input type = 'text' class='edit-user'  value = '". $user['identity']        ."' name = 'identity' required='required' ". "</td>".
                    "<td>".$user['ethnicity'] .     " <input type = 'text' class='edit-user'  value = '". $user['ethnicity']       ."' name = 'ethnicity' required='required' ". "</td>".
                    "<td>".$user['qualification'] . " <input type = 'text' class='edit-user'  value = '". $user['qualification']   ."' name = 'qualification' required='required' ". "</td>".
                    "<td>".$user['yoc'] .           " <input type = 'text' class='edit-user'  value = '". $user['yoc']             ."' name = 'yoc' required='required' ". "</td>".
                    "<td>".$user['r_count'] . "</td>".
                    "<td>".$user['i_count'] . "</td>".
                    "<td>".$user['a_count'] . "</td>".
                    "<td>".$user['s_count'] . "</td>".
                    "<td>".$user['e_count'] . "</td>".
                    "<td>".$user['c_count'] . "</td>".
                    "<td> 
                            <button type='button' id='edit-btn' name='' class='edit-btn btn btn-primary btn-block btn-large'><span>Edit</span></button>
                            <button type='submit' id='update-btn' name='update' class='btn btn-success update-btn btn-block btn-large'><span>Update</span></button>
                            <button type='submit' id='del-btn' name='delete' class='del-btn btn-danger btn-block btn-large'>Delete</button>"
                        .
                    "</td>".
                    "</form></tr>";
                    trim($string);
                    echo $string;
                    $user_count++;
                }
                
            ?>
            </table>
        </div>
    </div>

<style>
input{
    margin-top:10px;
    margin-bottom: 10px;
    background: rgba(0, 0, 0, 0.3);
    border: none;
    outline: none;
    padding: 10px;
    font-size: 13px;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
    border: 1px solid rgba(0, 0, 0, 0.3);
    border-radius: 4px;
    box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
    -webkit-transition: box-shadow .5s ease;
    -moz-transition: box-shadow .5s ease;
    -o-transition: box-shadow .5s ease;
    -ms-transition: box-shadow .5s ease;
    transition: box-shadow .5s ease;
}

.hidden{
    display:none;
}

button{
    margin:5px;
}
</style>

</body>

</html>