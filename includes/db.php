<?php
$connect=mysqli_connect(
    "localhost",
    "root",
    "",
    "job_portal"
);
if(!$connect){
    die("connection failed" .mysqli_connect_error());
}
?>