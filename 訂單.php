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
            <!-- 以下內容以迴圈建立 -->
            <?php
                if(isset($_SESSION["memberLevel"])){
                    if($_SESSION["memberLevel"] == "member"){
                        #取得會員資料
                        $query_RecMember = "SELECT * FROM memberdata WHERE m_username = '{$_SESSION["loginMember"]}'";
                        $RecMember = $db_link->query($query_RecMember);
                        $row_RecMember = $RecMember->fetch_assoc();
                        #取得會員訂單資料
                        $query_order = "SELECT * FROM `orderlist_member` WHERE acct='{$row_RecMember["m_username"]}'";
                        $stmt_order = $db_link->query($query_order);
                    }
                    else if($_SESSION["memberLevel"] == "admin"){
                        #取得ALL會員訂單資料
                        $query_order = "SELECT * FROM `orderlist_member` WHERE 1 ORDER BY pickup_date ASC";
                        $stmt_order = $db_link->query($query_order);
                    }
                    
                        
                    #建立
                    $num = 0;
                    while($row = $stmt_order->fetch_assoc()){
                        #取得每份訂單的蛋糕資料
                        $query_order_cake = "SELECT * FROM `orderlist_cake` WHERE order_id='{$row["order_id"]}'";
                        $stmt_order_cake = $db_link->query($query_order_cake);

                        echo '<div class="col-lg-4 col-md-6 mb-3">
                                <div class="olist" style="border: 1px solid #f2e5b1;background-color: #243560;padding: 10px;">
                                    <div class="mb-1" style="font-size: 1.5rem;">取貨日: '.$row['pickup_date'].'</div>
                                    <div class="w-100 mb-1">編號: '.$row['order_id'].'</div>
                                    <div class="w-50 mb-1">帳號: '.$row['acct'].'</div>
                                    <div class="w-50 mb-1">取貨人: '.$row['member_name'].'</div>
                                    <div class="w-50 mb-1">手機: '.$row['phone'].'</div>
                                    <div class="w-50 mb-1">取貨店: '.$row['order_address'].'</div>
                                    <div class="w-50 mb-1">狀態: '.$row['order_staus'].'</div>
                                    <div class="w-50 mb-1">備註: '.$row['remarks'].'</div>
                                    <a class="w-100" data-toggle="collapse" href="#contentId'.$num.'" aria-expanded="false" aria-controls="contentId'.$num.'">
                                        選購項目
                                    </a>
                                    <div class="collapse w-100 mb-1" id="contentId'.$num.'">';
                        while($row_cake = $stmt_order_cake->fetch_assoc()){
                        echo            '<div class="d-flex flex-wrap">
                                            <div class="col-6">'.$row_cake['name'].'</div>
                                            <div class="col-3">x'.$row_cake['quantity'].'</div>
                                            <div class="col-3">$'.$row_cake['price_total'].'</div>
                                        </div>';
                        }
                        echo        '</div>
                                    <div class="w-100 d-flex flex-wrap justify-content-between">
                                        <div>訂購日: '.$row['order_date'].'</div>
                                        <div>合計: $'.$row['order_price'].'</div>
                                    </div>
                                </div>
                            </div>';
                        $num++;
                    }
                }
                else{

                }
            ?>
        </div>
    </div>

    <?php include "footer.php";?>
</body>
</html>