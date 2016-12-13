<?php

$wish = $_REQUEST['userWish'];
$user_email = $_REQUEST['userEmail'];
$friend_email = $_REQUEST['friendEmails'];

echo $user_email;
echo $friend_email;

$message = "Your friend made a wish by throwing coin in the fountain.";
$headers = "From: ".$user_email;
$sent = mail($friend_email, "HW5 Email check", $message, $headers);

if($sent)
{
	echo $sent;
}

else
{
	echo "not sent";
}

$conn = mysqli_connect("localhost", "root", "");
$stmt = mysqli_prepare($conn, "CREATE DATABASE Wishes");
mysqli_stmt_execute($stmt);
mysqli_select_db($conn, "Wishes");
$stmt = mysqli_prepare($conn, "DROP TABLE IF EXISTS Wish");
$stmt = mysqli_prepare($conn, "CREATE TABLE Wish(
	id integer primary key auto_increment,
	fountain varchar(10) default null,
	color varchar(10) default null,
	country varchar(12) default null,
	wish varchar(100) default null,
	wishAmount float(10,2) default null);");
mysqli_stmt_execute($stmt);
$fountain = 'fountain1';
$color = 'red';
$country = 'india';
$wish = 'Peace on Earth';
$wishAmount = 1.25;

$stmt = mysqli_prepare($conn, "INSERT INTO Wish (fountain, color, country, wish, wishAmount) VALUES (?,?,?,?,?)");
		$stmt->bind_param('ssssd', $fountain, $color, $country, $wish, $wishAmount);
		mysqli_stmt_execute($stmt);