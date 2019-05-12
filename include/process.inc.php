<?php
    include_once "Dbh.inc.php";

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
        $dbh = new Dbh();
        $usr = new User();
        $stmt = $dbh->connect()->prepare("SELECT * FROM riasec WHERE username=?");
        $stmt->execute([$_SESSION['username']]);
        if($stmt->rowCount()){
            $stmt = $dbh->connect()->prepare("UPDATE riasec SET
            r_count=?, i_count=?, a_count=?, s_count=?, e_count=?, c_count=?
            WHERE username=?");
            $stmt->execute([
                $riasec_count['r'],
                $riasec_count['i'],
                $riasec_count['a'],
                $riasec_count['s'],
                $riasec_count['e'],
                $riasec_count['c'],
                $_SESSION['username']                
            ]);

        }else{
            $stmt = $dbh->connect()->prepare("INSERT INTO riasec SET
            r_count=?, i_count=?, a_count=?, s_count=?, e_count=?, c_count=?, username=?");
            $stmt->execute([
                $riasec_count['r'],
                $riasec_count['i'],
                $riasec_count['a'],
                $riasec_count['s'],
                $riasec_count['e'],
                $riasec_count['c'],
                $_SESSION['username']
            ]);
        }
        arsort($riasec_count);
        $usr->getRiasec();
    }
} else  {
    // do get
}