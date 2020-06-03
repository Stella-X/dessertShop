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
                <?php 
                    while($row = $stmt->fetch_assoc()){
                        echo '<div class="card">
                        <img class="card-img-top" src="img/原圖/'.$row["Name"].'.jpg">
                        <div class="card-body">
                            <h4 class="card-title">'.$row["Name"].'</h4>
                            <p class="card-text">$'.$row["price"].'<button type="button" class="btn btn-primary addcart">加入購物車</button></p>
                        </div>
                    </div>';
                    };
                ?>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>