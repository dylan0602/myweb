<?php
$server_username = "root";
$server_password = "";
$server_host = "localhost";
$database = 'dyl4n_db';

$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("Không thể kết nối tới database");
mysqli_query($conn,"SET NAMES 'UTF8'");