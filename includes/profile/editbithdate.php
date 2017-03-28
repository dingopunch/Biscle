<?php
include('../connection.php');
  session_start();
	$userId = $_SESSION['userid'];
  $firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$day = $_POST['day'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$date= $month.'&nbsp;'.$day.', '.$year;
	$birthdate=mysqli_real_escape_string($con,$date);



if (ctype_alnum($firstname)&&ctype_alnum($lastname))  {

	$invalid_characters = array("$", "%",  "<", ">", "|");
	$firstname = str_replace($invalid_characters, "", $firstname);
	$lastname=str_replace($invalid_characters,"",$lastname);
	filter_var($firstname, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
	filter_var($lastname, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

	$update = mysqli_query($con, "UPDATE user SET firstname='$firstname', lastname='$lastname', birthdate='$birthdate' where id='$userId'");
	if ($update) {

		echo '<div id="current-name" class="current-name">' . $firstname . '&nbsp;' . $lastname . '</div>
                <div id="current-birth" class="current-birth">' . $birthdate . '</div>';
	} else {
		echo "<span style='color:red;'><b>Error !:</b> Something went wrong try again</span>";
	}


}
else{
	echo "Chars Not Allowed";
}


?>