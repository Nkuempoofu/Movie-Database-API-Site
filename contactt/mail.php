<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$facebook = $_POST['facebook'];
$linkedin = $_POST['linkedin'];

$mailheader = "From:".$name."<".$email.">\r\n";

$recipient = "mpofunkululeko94@gmail.com";

mail($recipient, $phone, $facebook, $mailheader) or die("Error!");

echo'

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact form</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Thank you for contacting us. We will get back to you as soon as possible!</h1>
        <p class="back">Go back to the <a href="../">homepage</a>.</p>
        
    </div>
</body>
</html>



';


?>