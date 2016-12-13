<?php 
/*
create the database schema with relations
*/

class create
{

  function __construct()
  {
$conn = mysqli_connect("localhost", "root", "");
  $stmt = mysqli_prepare($conn, "CREATE DATABASE Wishes");
  mysqli_stmt_execute($stmt);
  mysqli_select_db($conn, "Wishes");
  $stmt = mysqli_prepare($conn, "CREATE TABLE Wish(
    id integer primary key auto_increment,
    fountain varchar(100) default null,
    color varchar(100) default null,
    country varchar(12) default null,
    wish varchar(100) default null);");
  mysqli_stmt_execute($stmt);
}
}

$crea = new create();
  ?>