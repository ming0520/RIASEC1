<?php 
    session_start();
    include_once("navbar.php");
    include_once("include/Dbh.inc.php");
    include_once("include/User.inc.php");
    include_once ("include/riasec.inc.php");
    include_once ("include/process.inc.php");

    if(empty($_SESSION["username"])){
        header("Location: index.php");
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
    <div class="user_pannel">
        <p>Username: <?php echo $_SESSION["username"]; ?></p>
        <p>Name: <?php echo $_SESSION["first_name"] . $_SESSION['last_name']; ?></p>
        <p>E-mail: <?php echo $_SESSION["email"]; ?></p>
        <p>Top 3 Code: <?php 
            $counter = 0;
            foreach($_SESSION['riasec'] as $code => $value){
                if($counter < 3){
                    echo ucfirst($code) . '&emsp;';
                }
                $counter++;
            }
        ?></p>
        <form method="post" action="logout.php">
            <button type="submit" class="btn-danger btn-block btn-large" name="logout">Logout</button>
        </form>
    </div>
</div>

<body class="container-form">

    <center>
        <h1>RIASEC Test</h1>
    </center>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="col">
            <h1>Question</h1>
            <div id="question-list">
                <table border="1">
                    <?php
                        $question_number = 1;
                        foreach ($question_list as $question){
                                $string = "<tr>
                                    <td>".$question_number . ") " . $question['question'] . "</td>".
                                    "<td><input type='checkbox' name = 'check_answer[]' value = '" .$question['answer'] . "' ></td>".
                                "</tr>";
                                echo $string;
                                $question_number++;                       
                        } 
                    ?>
                </table>
            </div>
            <br>
            <div class="control">
                <button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Submit</button>
            </div>
        </div>
        
        <div id="result" class="col">
            <h1>Result</h1>
            <h2>Top 3 Code</h2>
            <h3>
                <?php 
                $counter = 0;
                foreach($riasec_count as $code => $value){
                    if($counter < 3){
                        echo ucfirst($code) . '&emsp;';
                    }
                    $counter++;
                }
            ?>
            </h3>
            <table border="1">
                <thead>
                    <tr>
                        <td>Category</td>
                        <td>Number</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>R</td>
                        <td><?php echo $riasec_count['r'] ?></td>
                    </tr>
                    <tr>
                        <td>I</td>
                        <td><?php echo $riasec_count['i'] ?></td>
                    </tr>
                    <tr>
                        <td>A</td>
                        <td><?php echo $riasec_count['a'] ?></td>
                    </tr>
                    <tr>
                        <td>S</td>
                        <td><?php echo $riasec_count['s'] ?></td>
                    </tr>
                    <tr>
                        <td>E</td>
                        <td><?php echo $riasec_count['e'] ?></td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td><?php echo $riasec_count['c'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
    </div>



</body>

</html>

<?php

$riasec_count = array(
    'r' => 0,
    'i' => 0,
    'a' => 0,
    's' => 0,
    'e' => 0,
    'c' => 0
);