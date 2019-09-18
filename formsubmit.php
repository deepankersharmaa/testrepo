<?php
$emailId = "mayur.tomar@innovationm.com";
$userEmailId = "";

$formValidate = false;
if($_POST['formValidate'] == true){
  $name = $_POST['name'];
  $userEmailId = $_POST['email'];
  $userEmailId = $name.'<'.$userEmailId.'>';
  $number = $_POST['number'];
  $delivery = $_POST['delivery'];
  $message = $_POST['message'];

  $email_subject = "VegLeaf: Thanks for Reaching Out";
  $email_body = "Name: $name.\nPhone: $number \nDelivery: $delivery \nRequirements:$message\n";
  $recipient = $emailId;
  $headers = "From: $userEmailId \r\n";
  $headers .= "Reply-To: $userEmailId \r\n";
  $result = mail($recipient, $email_subject, $email_body, $headers);

  if(!$result) {
    header('Content-Type: application/json');
    echo '{ "errorMsg" : "There was an error!", "reset" : "false"}';
    die();
  } else {
    $recipient = $userEmailId;
    $name = "VegLeaf";
    $email = $emailId;
    $email = $name.'<'.$email.'>';
    $email_subject = "VegLeaf: Thanks for Reaching Out";
    $email_body = "Thanks for reaching out to us. We will contact you soon! \r\n \r\n Thanks and Regards \r\n Team VegLeaf";
    $headers = "From: $email \r\n";
    $headers .= "Reply-To: $email \r\n";
    $result = mail($recipient, $email_subject, $email_body, $headers);
    header('Content-Type: application/json');
    echo '{ "errorMsg" : "Thanks for reaching out to us. We will contact you soon!", "reset" : "true"}';
    die();
  }
}
?>