<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/GroupProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$grID = intval($_GET["id"]);
$conn = connectDb();
$sql =  "select * from group_product where grID = ".$grID;
$result = $conn->query($sql);
if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["group"] = new GroupProduct($row["grID"],$row["grName"],$row["active"]);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Category/detailCategory.php?id=$grID");
}
?>