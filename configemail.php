<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("jaydomodaki2401@gmail.com","My subject",$msg);
mail(     'phucmai2401@gmail.com',
     'Works!',
     'An email has been generated from your localhost, congratulations!');

?>