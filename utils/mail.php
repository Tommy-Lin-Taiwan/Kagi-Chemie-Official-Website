<?php
//get data from form  
echo "hey";
$name = $_POST['name'];
$email= $_POST['address'];
$message= $_POST['description'];
$to = "f7u23dg4e@gmail.com";
$subject = "Test";
$txt ="Name: \r\n". $name . "\r\n  Email: \r\n" . $email . "\r\n Message: \r\n" . $message;
$headers = "From: kagi" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
// header("Location:thankyou.html");
?>