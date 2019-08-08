<?php // Initialize variables to null.
$fname =""; // Sender Name
$email =""; // Sender's email ID
$phone =""; // Subject of mail
$comments =""; // Sender's Message
$nameError ="";
$emailError ="";
$commentError ="";
$successMessage =""; // On submittingform below function will execute.
if(isset($_POST['submit'])) { // Checking null values in message.
if (empty($_POST["fullname"])){
$nameError = "Name is required";
}
else
 {
$fname = test_input($_POST["fullname"]); // check name only contains letters and whitespace
if (!preg_match("/^[a-zA-Z ]*$/",$fname))
{
$nameError = "Only letters and white space allowed";
}
} // Checking null values in the message.
if (empty($_POST["email"]))
{
$emailError = "Email is required";
}
else
 {
$email = test_input($_POST["email"]);
} // Checking null values in message.
if (empty($_POST["phone"]))
{
$phoneError = "phone is required";
}
else
{
$phone = test_input($_POST["phnoe"]);
} // Checking null values inmessage.
if (empty($_POST["comments"]))
{
$commentsError = "comments is required";
}
else
 {
$comments = test_input($_POST["comments"]);
} // Checking null values inthe message.
if( !($fname=='') && !($email=='') && !($phone=='') && !($comments=='') )
{ // Checking valid email.
if (preg_match("/([w-]+@[w-]+.[w-]+)/",$email))
{
$header= $fname."<". $email .">";
$headers = "FormGet.com"; /* Let's prepare the message for the e-mail */
$msg = "Hello! $name Thank you...! For Contacting Us.
Name: $fname
E-mail: $email
Phone: $phone
Message: $comments
This is a Contact Confirmation mail. We Will contact You as soon as possible.";
$msg1 = " $name Contacted Us From Group Web Site. Here is some information about $name.
Name: $fname
E-mail: $email
Purpose: $purpose
Message: $message "; /* Send the message using mail() function */
if(mail($email, $headers, $msg ) && mail("keltalk06@gmail.com", $header, $msg1 ))
{
$successMessage = "Message sent successfully.......";
}
}
else
{ $emailError = "Invalid Email";
 }
 }
} // Function for filtering input values.function test_input($data)
{
$data = trim($data);
$data =stripslashes($data);
$data =htmlspecialchars($data);
return $data;
}
?>