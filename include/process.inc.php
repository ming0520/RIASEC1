<?php
    $r_count =
    $i_count =
    $a_count =
    $s_count = 
    $e_count =
    $c_count = 0;

if (isset($_POST["submit"])) {
    if(!empty($_POST['check_answer'])) {
        foreach($_POST['check_answer'] as $answer){
            switch($answer){
                case "r":
                    $r_count++;
                    break;
                case "i":
                    $i_count++;
                    break;
                case "a":
                    $a_count++;
                    break;
                case "s":
                    $s_count++;
                    break;
                case "e":
                    $e_count++;
                    break;
                case "c";
                    $c_count++;
                    break;
            }
        }

        $r_count =
        $i_count =
        $a_count =
        $s_count = 
        $e_count =
        $c_count = 0;
    }
} else  {
    // do get
}