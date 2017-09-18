<?php

 /* Name: Paula Stutzman
 Date: 02/21/2017
 File Name: surveyproc.php
 Purpose: To create a form asking for a name, email, 3 questions
 using checkboxes/radio buttons/drop down box, and a
comment box. Also check the form for errors.\

 Extra credit code has been added and labeled "EXTRA CREDIT"
 */

 //Data fields
 $name = trim($_POST['name']);

 $email = trim($_POST['email']);

 $choice = $_POST['sporting_event'];

 $favorite = $_POST['sport'];

 $kids_sport = $_POST['kid']; //EXTRA CREDIT

 $comments = trim($_POST['comments']);

//array setup
 //EXTRA CREDIT
 if ( is_array($kids_sport) ) {
 $kid = implode( ",", $kids_sport );
 }
 else {
 $kid = "You must have played some sport as a kid.";
 }

 $errors = array();

 //form check
 if( strlen($name) <=2)
 $errors[] = "Please enter your name.";

 if (strpos($email, '@') === false )
 $errors[] = "You must enter a valid email address.";

 if ( ! $choice)
 $errors[] = "You do not like awesome sporting events.";

 if (! $favorite)
 $errors[] = "You must have a favorite sport.";


 if ( ! $kids_sport) //EXTRA CREDIT
 $errors[] = "You must have played some sport as a kid.";

if ($errors){
 print "There was some missing data - Please click the back arrow to return to the
form: \n<ul>\n";

 foreach ($errors as $e){
 print "<li>$e</li>\n";
 }

 print "</ul>\n";
}

 else {

 //output data from form
 print "<h1>The results of your survey</h1>";
 print "<p>Your name is: $name</p>\n";
 print "<p>Your email is: $email</p>\n";
 print "<p>The sporting event finals you chose is: $choice</p>\n";
 print "<p>Your favorite sport is: $favorite</p>\n";
 print "<p>You played these sports as a kid: $kid </p>\n"; //EXTRA CREDIT
 print "<p>Your comments are: $comments</p>\n";
 print "<p>Hidden Data: $_POST[chicken] </p>\n";

 date_default_timezone_set("America/New_York");
 print "<p>The survey was submitted today at: ". date("m-d-Y h:i:sa");
 }

 ?>
