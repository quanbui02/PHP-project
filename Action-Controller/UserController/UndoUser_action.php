<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/User.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/UserDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$active = 1;
$ID = intval($_GET["id"]);
$conn = connectDb();
$sql = "UPDATE user SET active = $active where userID = ".$ID;
$result = $conn->query($sql);
$conn->close();
$_SESSION["err_value"] = "";
header("Location: /Project_WebBanHang/Template-Views/Admin/User/Index.php");
?>