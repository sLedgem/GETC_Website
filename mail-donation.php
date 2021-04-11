<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$DonationType = $_POST['DonationType'];
$message = $_POST['message'];


$email_from = 'donations@getc.org.za';//<== update the email address
$email_subject = "New Email Via Donations Page";
$email_body = "Name: $name \nEmail: $email \nContact No: $phone \nType of Donation: $DonationType \nMessage: $message\n\n\n".
    
$to = "donations@getc.org.za";//<== update the email address
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $email \r\n";
//Send the email!
mail($to,$email_subject,$email_body,$headers);
//done. redirect to thank-you page.
header('Location: thank-you.html');


// Function to validate against any email injection attempts
function IsInjected($str)
{
  $injections = array('(\n+)',
              '(\r+)',
              '(\t+)',
              '(%0A+)',
              '(%0D+)',
              '(%08+)',
              '(%09+)'
              );
  $inject = join('|', $injections);
  $inject = "/$inject/i";
  if(preg_match($inject,$str))
    {
    return true;
  }
  else
    {
    return false;
  }
}
   
?> 