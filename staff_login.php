<?php
    session_start();
    include_once("include/Dbh.inc.php");
    include_once("include/Staff.inc.php");
    if(isset($_SESSION["username"])){
        unset($_SESSION["role"]);
        unset($_SESSION["username"]);  // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
        session_destroy();
        header("Location: staff_login.php");
    }
    $userDataArray = array();
    if(isset($_POST['submit'])){
        $userDataArray = array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        );

        $staff = new Staff();
        $staff->login($userDataArray);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/gradient_form.css">
</head>
<body>
    <div class="login">
        <h1>Staff Login</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="username" placeholder="Username" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Login</button>
        </form>
</div>
</body>
</html>