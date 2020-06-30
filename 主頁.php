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
        #carouselId{
            width: 100%;
        }
        .carousel-indicators{
            top: 0;
            margin: 0;
            right: 99.99%;
            left: unset;
            width: 42.7%;
            display: none;
        }
        .carousel-indicators li{
            width: 100%;
            height: 20%;
            margin: 0;
            border: 0;
        }
        .tag{
            color: #f2e5b1;
            background-color: #243560;
            border-radius: 3px;
            padding-right: 3px;
            padding-left: 3px;
            margin-right: 10px;
        }
        .listA{
            display: flex; 
            align-items: center; 
            justify-content: space-between;
        }
        /* lg */
        @media (min-width:992px){
            #carouselId{
                width: 70%;    
            }
            .carousel-indicators{
                top: 0;
                margin: 0;
                right: 99.99%;
                left: unset;
                width: 42.7%;
                display: block;
            }
        }
    </style>
</head>
<body>
    <?php include "navbar.php";?>

    <div class="container-xl container-fluid">
        <div class="row justify-content-end">
            <div id="carouselId" class="carousel slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                    <li data-target="#carouselId" data-slide-to="3"></li>
                    <li data-target="#carouselId" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/1366x768/草莓黑森林蛋糕.png">
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
                        <img class="w-100" src="img/Logo/dessertShop - Logo [16x9].png">
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
        <div class="row justify-content-center my-5">
            <div class="col-lg-7"><h2 for="">最新消息</h2></div>
            <div class="col-lg-7">
                <div class="list-group">
                    <!-- 系統、新品、活動 -->
                    <a href="#" class="list-group-item list-group-item-action listA">
                        <div style="word-break: break-all;padding-right: 10px;">
                            <small class="tag">系統</small>
                            <div style="display: inline;">伺服器定期維護【2020/05/27 (三)】12:00 - 15:00</div>
                        </div>
                        <small class="text-muted">2020/05/27</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action listA">
                        <div style="word-break: break-all;padding-right: 10px;">
                            <small class="tag">新品</small>
                            <div style="display: inline;">冰淇淋莓果蛋糕全新上市!!</div>
                        </div>
                        <small class="text-muted">2020/05/25</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action listA">
                        <div style="word-break: break-all;padding-right: 10px;">
                            <small class="tag">新品</small>
                            <div style="display: inline;">[玫瑰X伯爵茶] 玫瑰伯爵蛋糕好評熱銷!!</div>
                        </div>
                        <small class="text-muted">2020/05/25</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action listA">
                        <div style="word-break: break-all;padding-right: 10px;">
                            <small class="tag">系統</small>
                            <div style="display: inline;">伺服器定期維護【2020/05/20 (三)】12:00 - 15:00</div>
                        </div>
                        <small class="text-muted">2020/05/20</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action listA">
                        <div style="word-break: break-all;padding-right: 10px;">
                            <small class="tag">活動</small>
                            <div style="display: inline;">[慶賀母親節] 全店蛋糕9.9折起!!</div>
                        </div>
                        <small class="text-muted">2020/05/06</small>
                    </a>
                    <small class="text-muted">暫時僅顯示5筆資料</small>
                </div>
            </div>
            
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>