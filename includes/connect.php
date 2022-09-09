<!-- Database Connection -->

<?php

$conn = mysqli_connect('localhost','root','','mystore');
if(!$conn)
{
    //echo "Connection Successful!!";
    die(mysqli_error($conn));
} 

?>