<?php

include 'connect.php';
session_start();

$id=$name=$surname=$email=$student_no=$idno=$file="";

if (isset($_SESSION['id'])) {
	# code...
$email=$_SESSION['email'];
$id=$_SESSION['id'];
$name=$_SESSION['name'];
$surname=$_SESSION['surname'];
$student_no=$_SESSION['student_no'];
$idno=$_SESSION['idno'];

}else{
	 echo '<script> window.location = "login.php";</script>';
}

?>
