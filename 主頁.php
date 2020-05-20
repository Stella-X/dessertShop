<?php include "addmysql.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 主頁</title>
    <?php include "b4_link.php";?>

    <style>
        .carousel-indicators{
            top: 0;
            margin: 0;
            right: 100%;
            left: unset;
            width: 42.7%;
            display: block;
        }
        .carousel-indicators li{
            width: 100%;
            height: 20%;
            margin: 0;
            border: 0;
        }
    </style>
</head>
<body>
    <?php include "navbar.php";?>

    <div class="container">
        <div class="row justify-content-end">
            <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel" style="width:70%;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                    <li data-target="#carouselId" data-slide-to="3"></li>
                    <li data-target="#carouselId" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/1366x768/草莓黑森林蛋糕.jpg">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/1366x768/冰淇淋莓果蛋糕.png">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/1366x768/大甲芋泥蛋糕.png">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/1366x768/玫瑰伯爵蛋糕.png">
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/1366x768/玫瑰伯爵蛋糕.png">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div></div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>