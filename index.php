<?php 
    $all_questions = array(
        'I like to work on cars',
        'I like to do puzzles',
        'I am good at working independently',
        'I like to work in teams',
        'I am an ambitious person, I set goals for myself',
        'I like to organize things, (files, desks/offices)',
        'I like to build things',
        'I like to read about art and music',
        'I like to have clear instructions to follow',
        'I like to try to influence or persuade people',
        'I like to do experiments',
        'I like to teach or train people',
        'I like trying to help people solve their problems',
        'I like to take care of animals',
        "I wouldn't mind working 8 hours per day in an office",
        "I like selling things",
        'I enjoy creative writing',
        'I enjoy science',
        'I am quick to take on new responsibilities',
        'I am interested in healing people',
        'I enjoy trying to figure out how things work',
        'I like putting things together or assembling things',
        'I am a creative person',
        'I pay attention to details',
        'I like to do filing or typing',
        'I like to analyze things (problems/situations)',
        'I like to play instruments or sing',
        'I enjoy learning about other cultures',
        'I would like to start my own business',
        'I like to cook',
        'I like acting in plays',
        'I am a practical person',
        'I like working with numbers or charts',
        'I like to get into discussions about issues',
        'I am good at keeping records of my work',
        'I like to lead',
        'I like working outdoors',
        'I would like to work in an office',
        "I'm good at math",
        'I like helping people',
        'I like to draw',
        'I like to give speeches'
    );
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
    <form action="" method="post">
        <div id="question-list">
        <table border="1">
            <?php
                $question_number = 1;
                foreach ($all_questions as $question){
                    $string = $question_number . ") " . $question . ".";
                    $string = "<tr><td>".$string."</td>
                        <td><input type='checkbox'></td>
                    </tr>";
                    echo $string;
                    $question_number++;
                } 
            ?>
        </table>
        </div>
    </form>
</body>
</html>