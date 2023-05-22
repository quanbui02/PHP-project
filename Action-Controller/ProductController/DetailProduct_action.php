<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/ProductDAO.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Data/ConnectToDatabase.php";
session_start();
$ID = intval($_GET["id"]);
$conn = connectDb();
$sql =  "select * from product where proID = ".$ID;
$result = $conn->query($sql);
$getImgs = "SELECT * FROM image_products WHERE idProduct = ".$ID;
$getImgsProduct = $conn->query($getImgs);
$imgProducts = array();
while ($row = $getImgsProduct->fetch_assoc()) {
    $imgProduct = new ImgProduct($row["id"],$row["idProduct"],$row["image"]);
    $imgProducts[] = $imgProduct;
}
$_SESSION['imgProducts'] = serialize($imgProducts);

if($result->num_rows>0){
    $row = $result->fetch_assoc();
    $_SESSION["product"] = new Product($row["proID"],$row["grID"],$row["proName"],$row["price"],$row["quantity"],$row["size"],$row["color"],$row["description"],$row["active"],$row["image"]);
    header("Location: /Project_WebBanHang/Template-Views/Admin/Product/DetailProduct.php?id=$ID");
}
?>