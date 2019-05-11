<?php
    $riasec_count = array(
        'r' => 0,
        'i' => 0,
        'a' => 0,
        's' => 0,
        'e' => 0,
        'c' => 0
    );

if (isset($_POST["submit"])) {
    if(!empty($_POST['check_answer'])) {
        foreach($_POST['check_answer'] as $answer){
            switch($answer){
                case "r":
                    $riasec_count['r']++;
                    break;
                case "i":
                    $riasec_count['i']++;
                    break;
                case "a":
                    $riasec_count['a']++;
                    break;
                case "s":
                    $riasec_count['s']++;
                    break;
                case "e":
                    $riasec_count['e']++;
                    break;
                case "c";
                    $riasec_count['c']++;
                    break;
            }
        }
        arsort($riasec_count);
    }
} else  {
    // do get
}