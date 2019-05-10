<?php 
    include_once ("include/riasec.inc.php");
    include_once ("include/process.inc.php");
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
<body class="container">
    <div class="col">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
    </div>

    <div id="result" class="col">
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
                    <td><?php echo $r_count ?></td>
                </tr>
                <tr>
                    <td>I</td>
                    <td><?php echo $i_count ?></td>
                </tr>
                <tr>
                    <td>A</td>
                    <td><?php echo $a_count ?></td>
                </tr>
                <tr>
                    <td>S</td>
                    <td><?php echo $s_count ?></td>
                </tr>
                <tr>
                    <td>E</td>
                    <td><?php echo $e_count ?></td>
                </tr>
                <tr>
                    <td>C</td>
                    <td><?php echo $c_count ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php

$r_count =
    $i_count =
    $a_count =
    $s_count = 
    $e_count =
    $c_count = 0;