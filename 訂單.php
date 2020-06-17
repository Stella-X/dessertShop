<?php include "addmysql.php";?>
<?php
    $query_cakes = "SELECT * FROM `cakes` WHERE 1";
    $stmt = $db_link->query($query_cakes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 產品</title>
    <?php include "b4_link.php";?>

    <style>
        .olist{
            width: 100%;
            border: 1px solid #f2e5b1;
            background-color: #243560;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <?php include "navbar.php";?>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="olist" style="border: 1px solid #f2e5b1;background-color: #243560;padding: 10px;">
                    <div class="mb-1" style="font-size: 1.5rem;">取貨日: 2020/07/30</div>
                    <div class="w-100 mb-1">編號: 20200720111120</div>
                    <div class="w-50 mb-1">帳號: admin</div>
                    <div class="w-50 mb-1">取貨人: 兔子</div>
                    <div class="w-50 mb-1">手機: 0912345678</div>
                    <div class="w-50 mb-1">取貨店: 本店</div>
                    <div class="w-50 mb-1">狀態: 未完成</div>
                    <div class="w-50 mb-1">備註: 無</div>
                    <a class="w-100" data-toggle="collapse" href="#contentId" aria-expanded="false" aria-controls="contentId">
                        選購項目
                    </a>
                    <div class="collapse w-100 mb-1" id="contentId">
                        ssss
                    </div>
                    <div class="w-100 d-flex flex-wrap justify-content-between">
                        <div>訂購日: 2020/07/20</div>
                        <div>合計: $9999</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php";?>
</body>
</html>