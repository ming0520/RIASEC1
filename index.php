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
<body>
    <div class="container">
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

    <div id="result">
        <table border="1">
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</body>
</html>