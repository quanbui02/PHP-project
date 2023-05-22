<?php
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/Product.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/Class-Model/ImgProduct.php";
include_once "C:/xampp/htdocs/Project_WebBanHang/DAO/GroupDAO.php";
session_start();
$listGroup = getAllListGroup();
$lengtGroup = count($listGroup);
$listImgs = unserialize($_SESSION['imgProducts']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="/Project_WebBanHang/assets/css/detailproduct.css">
    <title>Chi tiết sản phẩm</title>
</head>

<body>
    <div class="header">
        <div class="detailheader">
            <h2 style="padding-top:12px">Chi tiết sản phẩm</h2>
        </div>
    </div>
    <div class="infor">
        <div class="image">
            <p style="font-style: italic; text-align:left; margin-bottom:3px">Ảnh đại diện sản phẩm</p>
            <div class="images1">
                <img src="/Project_WebBanHang/Upload/img/hinh-anh-giay-vans-9.jpg <?php echo $_SESSION["product"]->getImg(); ?>"
                    alt="Product Image" style="width:300px;height:300px;object-fit:cover;">
            </div>
            <br>
            <p style="font-style: italic; text-align: left; margin-bottom:3px">Ảnh chi tiết sản phẩm</p>
            <div class="images">
                <?php
                foreach ($listImgs as $imgProduct) {
                    ?>
                    <img style="width:150px;height:150px;object-fit:cover;"
                        src="/Project_WebBanHang/Upload/imgDetail/adam-1.jpg<?php echo $imgProduct->getImg() ?>">
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="details">
            <div class="id">
                <div class="label"> Mã sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrID(); ?>
                </div>
            </div>
            <div class="name">
                <div class="label">Tên sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrName(); ?>
                </div>
            </div>
            <div class="groupName">
                <div class="label">Thuộc danh mục: </div>
                <div class="content">
                    <?php for ($i = 0; $i < $lengtGroup; $i++) {
                        if ($_SESSION["product"]->getGrID() == $listGroup[$i]->getGrID()) {
                            echo $listGroup[$i]->getNameGroup();
                        }
                    } ?>
                </div>
            </div>

            <div class="size">
                <div class="label">Kích cỡ sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getSize(); ?>
                </div>
            </div>
            <div class="quantity">
                <div class="label">Số lượng sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getQuantity(); ?>
                </div>
            </div>
            <div class="price">
                <div class="label">Giá sản phẩm: </div>
                <div class="content">
                    <?php echo $_SESSION["product"]->getPrice(); ?> VND
                </div>
            </div>
            <div class="description">
                <div class="label">Mô tả sản phẩm: </div>
                <div class="content">
                    <?php if ($_SESSION["product"]->getDes() == "") {
                        echo "Chưa có mô tả sản phẩm";
                    } else {
                        echo $_SESSION["product"]->getDes();
                    } ?> VND
                </div>
                
            </div>

            <div class="Active_gr">
                <div class="label">Hoạt động: </div>
               <div class="content"> <?php if ($_SESSION["product"]->getAct() == 1) {
                    ?> <span>đang hoạt động</span>
                    <?php
                } else {
                    ?>
                    <span>không hoạt động</span>
                    <?php
                }
                ?></div>
            </div>
        </div>
    </div>
    <div class="back">
        <button> <a href="/Project_WebBanHang/Template-Views/Admin/Product/Index.php">
                Tro Lai</button>
        </a>
    </div>
</body>

</html>