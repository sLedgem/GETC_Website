<?php

$name = $_POST['name'];
$idnumber = $_POST['idnumber'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$street = $_POST['street'];
$suburb = $_POST['suburb'];
$city = $_POST['city'];
$province = $_POST['province'];


$email_from = 'registrations@getc.org.za';//<== update the email address
$email_subject = "New Member Registration via Page";
$email_body = "Name: $name \nID Number: $idnumber \nEmail: $email \nContact No: $phone \n\nAddress\n\n$street\n$suburb\n$city\n$province \n\n\n".
    
$to = "registrations@getc.org.za";
$headers = "From: $email_from \r\n";
$headers .= "Cc: info@getc.co.za \r\n";
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