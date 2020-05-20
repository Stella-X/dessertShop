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
        .text{
            font-size: 2rem;
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 7px;
            display:none;
        }
        .seemore{
            font-size: 2rem;
            position: absolute;
            bottom: 0%;
            left: 50%;
            transform: translate(-50%, 0%);
            background-color: rgba(0, 0, 0, 0.3);
            border-radius: 7px;
        }
        .seemore:hover .text{
            display: block;
        }
        .seemore:hover{
            width:0;
            font-size:0;
        }

    </style>
</head>
<body style="background-color: #000;">
    <?php include "navbar.php";?>
    
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-3">
                <img class="w-100" src="img/cake-1.jpg">
                <div class="text-white " style="font-size: 2.5rem;position: absolute;top: 10%;transform: translate(-50%, -50%);left: 13%;">本季推薦</div>
                <div class="px-2 text-white seemore">More
                    <div class="text-white text">XXXXXXXXXXXXXXXXX</div>
                </div>
            </div>
            <div class="col-md-5 mb-3 pr-md-0">
                <img class="w-100" src="img/cake-2.jpg">
            </div>
            <div class="col-md-5 mb-3 pl-md-0">
                <img class="w-100" src="img/cake-3.jpg">
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>