<?php 
    session_start();
    include_once("include/Dbh.inc.php");
    include_once("include/Staff.inc.php");

    if(empty($_SESSION["username"])){
        header("Location: staff_login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>RIASEC</title>
</head>
<div class="">
    <div class="user_pannel" style="margin-top:-300px;">
        <p>Username: <?php echo $_SESSION["username"]; ?></p>
        <p>Name: <?php echo $_SESSION["first_name"] . $_SESSION['last_name']; ?></p>
        <p>E-mail: <?php echo $_SESSION["email"]; ?></p>
        <p>Role: <?php echo $_SESSION['role']; ?></p>
        <form method="post" action="logout.php">
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
            </tr>
            <?php
                $staff = new Staff();
                $staff->get_all_users();
                $user_array = $staff->all_user_data;
                $user_count = 1;
                $string =" ";
                foreach($user_array as $user){
                    $string = "<form action='". $_SERVER['PHP_SELF']."' class='user'><tr><td>".
                    $user_count . "</td> " . 
                    "<td>".$user['username'] .      " <input type = 'text' class='hidden'  value = '". $user['username']        ."' name = 'username' disabled" ."</td>".
                    "<td>".$user['first_name'].     " <input type = 'text' class='hidden'  value = '". $user['first_name']      ."' name = 'first_name' " . "</td>".
                    "<td>".$user['last_name'].      " <input type = 'text' class='hidden'  value = '". $user['last_name']       ."' name = 'last_name' " . "</td>".
                    "<td>".$user['age'] .           " <input type = 'text' class='hidden'  value = '". $user['age']             ."' name = 'age' ". "</td>".
                    "<td>".$user['email'] .         " <input type = 'text' class='hidden'  value = '". $user['email']           ."' name = 'email disabled' ". "</td>".
                    "<td>".$user['phone_number'] .  " <input type = 'text' class='hidden'  value = '". $user['phone_number']    ."' name = 'phone_number' ". "</td>".
                    "<td>".$user['identity'] .      " <input type = 'text' class='hidden'  value = '". $user['identity']        ."' name = 'identity' ". "</td>".
                    "<td>".$user['ethnicity'] .     " <input type = 'text' class='hidden'  value = '". $user['ethnicity']       ."' name = 'ethnicity' ". "</td>".
                    "<td>".$user['qualification'] . " <input type = 'text' class='hidden'  value = '". $user['qualification']   ."' name = 'qualification' ". "</td>".
                    "<td>".$user['yoc'] .           " <input type = 'text' class='hidden'  value = '". $user['yoc']             ."' name = 'yoc' ". "</td>".
                    "<td>".$user['r_count'] . "</td>".
                    "<td>".$user['i_count'] . "</td>".
                    "<td>".$user['a_count'] . "</td>".
                    "<td>".$user['s_count'] . "</td>".
                    "<td>".$user['e_count'] . "</td>".
                    "<td>".$user['c_count'] . "</td>".
                    "".
                    "</tr></form>";
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
</style>

</body>

</html>