<?php
//This is just a comment
    session_start();
    include_once("navbar.php");
    include_once("include/Dbh.inc.php");
    include_once("include/User.inc.php");
    
    $userDataArray = array();
    if(isset($_POST['submit'])){

        if($_POST["ethnicity"] == "Others"){
            $ethnicity = $_POST["ethnicity_text"];
        }else{
            $ethnicity = $_POST["ethnicity"];
        }

        if($_POST["qualification"] == "Others"){
            $qualification = $_POST["qualification_text"];
        }else{
            $qualification = $_POST["qualification"];
        }

        $userDataArray = array(
            "first_name" => $_POST["first_name"],
            "last_name" => $_POST["last_name"],
            "identity" => $_POST["identity"],
            "age" => $_POST["age"],
            "email" => $_POST["email"],
            "phone_number" => $_POST["phone_number"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "ethnicity" => $ethnicity,
            "qualification" => $qualification,
            "yoc" => $_POST["yoc"]
        );

        $user = new User();
        $user->register($userDataArray);
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="js/form.js"></script>
    <link rel="stylesheet" href="css/gradient_form.css">
	
	<!--Google Recaptcha API-->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <div class="login">
        <h1>Register</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return validateGooRe()">
            <input type="text" name="first_name" placeholder="First Name" requried="required">
            <input type="text" name="last_name" placeholder="Last Name" requried="required">
            <input type="text" name="identity" placeholder="IC / Passport" required="required" />
            <input type="number" name="age" placeholder="Age" required="required" min="12" max="99" />
            <input type="email" name="email" id="email" placeholder="E-mail" required="required">
            <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required="required">
            <input type="text" name="username" placeholder="Username" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />

            <select name="ethnicity" id="ethnicity" required>
                <option value="" selected="selected" disabled="disabled" >Select ethnicity</option>
                <option class="option" value="Malay">Malay</option>
                <option class="option" value="Chinese">Chinese</option>
                <option class="option" value="Indian">Indian</option>
                <option class="option" value="Others">Others</option>
            </select>
            <input type="text" name="ethnicity_text" id="ethnicity_text">
            <select name="qualification" id="qualification" required>
                <option value="" selected="selected" disabled="disabled" >Select academic qualification</option>
                <option class="option" value="SPM">SPM</option>
                <option class="option" value="O-Level">O-Level</option>
                <option class="option" value="STPM">STPM</option>
                <option class="option" value="A-Level">A-Level</option>
                <option class="option" value="Diploma">Diploma</option>
                <option class="option" value="Matriculation">Matriculation</option>
                <option class="option" value="Others">Others</option>
            </select>
            <input type="text" name="qualification_text" id="qualification_text">
            
            <?php
                // Sets the top option to be the current year. (IE. the option that is chosen by default).
                $currently_selected = date('Y'); 
                // Year to start available options at
                $earliest_year = 1950; 
                // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                $latest_year = date('Y'); 
                print '<select name="yoc" required>';
                print '<option selected="selected" disabled="disabled" >Select year of completion</option>';
                // Loops over each int[year] from current year, back to the $earliest_year [1950]
                foreach ( range( $latest_year, $earliest_year ) as $i ) {
                    // Prints the option with the next year in range.
                    print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                }
                print '</select>';
            ?> 
            </select>
			
			<center><div class="g-recaptcha" data-sitekey="6Le-P40UAAAAAC0hU6jBEIBT9nq0kHqD9PkB5PO4" data-callback="verifyCaptcha"></div></center>
			<br>
            <button type="submit" class="btn btn-primary btn-block btn-large" name="submit">Register</button>
        </form>
		
		<!-- JS for Google Recaptcha -->
		<script>
			function validateGooRe() {
				var response = grecaptcha.getResponse();
				if(response.length == 0) {
					alert("Please tick the recaptcha box.");
					return false;
				}
				return false;
			}
			
			function verifyCaptcha() {
				document.getElementById("gBtn").addEventListener("submit", window.location = "<?php echo $loginURL ?>");
			}
		</script>
			
        <div style="clear:both;"></div>
    </div>
</body>

</html>