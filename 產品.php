<?php include "addmysql.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 產品</title>
    <?php include "b4_link.php";?>
    <style>
        .card{
            background-color: #243560;
            transform: translate(0px,11px);
            box-shadow: 0px 0px 3px 1px white;
            transition: transform .1s,box-shadow .1s;
            border: unset;
        }
        .card:hover{
            transform: translate(0px,6px);
            box-shadow: 0px 0px 6px 3px white;
        }
        .card a{
            color: inherit;
        }
        .card a:hover{
            text-decoration: unset;
        }
        p .btn{
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        @media (max-width:576px){
            .card-columns .card {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>
<body style="background-color: #000;">
    <?php include "navbar.php";?>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card-columns col-md-12 col-10 p-0">
                <div class="card">
                    <img class="card-img-top" src="img/原圖/柚香黑烏龍乳酪蛋糕.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">柚香黑烏龍乳酪蛋糕</h4>
                        <p class="card-text">$200<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/cake-3.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">某蛋糕</h4>
                        <p class="card-text">$250<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/草莓黑森林蛋糕.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">草莓黑森林蛋糕</h4>
                        <p class="card-text">$350<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/生酮蛋糕.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">生酮蛋糕</h4>
                        <p class="card-text">$80<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/玫瑰伯爵蛋糕.jpg" alt="">
                    <div class="card-body">
                        <h4 class="card-title">玫瑰伯爵蛋糕</h4>
                        <p class="card-text">$180<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/大甲芋泥蛋糕.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">大甲芋泥蛋糕</h4>
                        <p class="card-text">$666<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/cake-2.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">冰淇淋莓果蛋糕</h4>
                        <p class="card-text">$399<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>
                <div class="card">
                    <img class="card-img-top" src="img/原圖/瑰香頌乳酪慕斯.jpg" >
                    <div class="card-body">
                        <h4 class="card-title">瑰香頌乳酪慕斯</h4>
                        <p class="card-text">$50<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>