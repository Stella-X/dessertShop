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
<body>
    <?php include "navbar.php";?>
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="card-columns col-md-12 col-10 p-0">
                <?php 
                    echo '<script>
                            var imgUrl = []
                            var itemsName = []
                            var itemsPrice = []
                            </script>';
                    $i=0;
                    while($row = $stmt->fetch_assoc()){
                        echo '<script>
                                imgUrl['.$i.'] = "img/原圖/'.$row["Name"].'.jpg"
                                itemsName['.$i.'] = "'.$row["Name"].'"
                                itemsPrice['.$i.'] = '.$row["price"].'
                                </script>
                                <div class="card">
                                    <img class="card-img-top" src="img/原圖/'.$row["Name"].'.jpg">
                                    <div class="card-body">
                                        <h4 class="card-title">'.$row["Name"].'</h4>
                                        <p class="card-text">$'.$row["price"].'<button type="button" class="btn btn-primary mt-1 addcart" onclick="addCart(imgUrl['.$i.'],itemsName['.$i.'],itemsPrice['.$i.'])">加入購物車</button></p>
                                    </div>
                                </div>';
                        $i++;
                    };
                ?>
            </div>
        </div>
    </div>

    <div id="cart_back" class="container-fluid" style="position: fixed;background-color: rgba(0,0,0,0.8);height: 100%;z-index: 2;overflow-y: auto;display:none">
        <div class="row justify-content-center">
            <div id="cart_list" class="col-xl-3 col-sm-6 col-11 d-flex flex-wrap">
                <div class="w-100 h3 pb-2 text-center">購物車</div>
                
                <div id="itemsLoop">
                    
                </div>
                <div class="w-100 mt-2 pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid #eee;">
                    <input type="date" id="getDate" class="form-control text-center mx-1 px-1" max="" min="new Date()">
                    <select class="form-control" name="" id="">
                        <option>本店 - 自取</option>
                        <option>分店1 - 自取</option>
                        <option>分店2 - 自取</option>
                    </select>
                </div>
                <div class="w-100 mt-2 pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid #eee;">
                    <textarea class="form-control" name="" id="" rows="1" placeholder="備註(限30字內)" maxlength="30"></textarea>
                </div>
                <div class="w-100 mt-2 pt-2 d-flex justify-content-between align-items-center" style="border-top: 1px solid #eee;">
                    <div id="total">合計 : $0</div>
                    <button type="button" class="btn btn-primary">送出訂單</button>
                </div>
            </div>
        </div>
    </div>
    <button type="button" id="cart_btn" class="btn"><i class="fas fa-cart-arrow-down"></i></button>
    <?php include "footer.php";?>

    <script>
        document.getElementById('cart_btn').addEventListener('click',function(){
            document.getElementById('cart_back').style.display = "block"
            if(document.getElementById('cart_list').offsetHeight > document.getElementById('cart_back').offsetHeight){
                document.getElementById('cart_list').style.transform = "unset"
                document.getElementById('cart_list').style.top = "0"
                document.getElementById('cart_list').style.marginTop = "15px"
                document.getElementById('cart_list').style.marginBottom = "15px"
            }
            else{
                document.getElementById('cart_list').style.transform = "translate(0,-50%)"
                document.getElementById('cart_list').style.top = "50%"
                document.getElementById('cart_list').style.marginTop = "0"
                document.getElementById('cart_list').style.marginBottom = "0"
            }
        })
        document.getElementById('cart_back').addEventListener('click',function (){
            this.style.display = 'none'
        })
        document.getElementById('cart_list').onclick = (event)=>{
            event.stopPropagation()
        }

        //今天日期
        var Today=new Date();
        var yyyy = Today.getFullYear();
        //月&日若為個位數則補0
        var mm = (Today.getMonth()+1<10 ? '0' : '')+(Today.getMonth()+1);
        var dd = (Today.getDate()<10 ? '0' : '')+Today.getDate();
        var minDay = getADate(yyyy,mm,parseInt(dd)+3)
        var maxDay = getADate(yyyy,mm,parseInt(dd)+30)
        document.getElementById('getDate').min = minDay
        document.getElementById('getDate').max = maxDay
        
        function getADate(yyyy,mm,dd){
            var ADate=new Date(yyyy,mm,dd);
            var yyyy = ADate.getFullYear();
            //月&日若為個位數則補0
            var mm = (ADate.getMonth()<10 ? '0' : '')+(ADate.getMonth());
            var dd = (ADate.getDate()<10 ? '0' : '')+ADate.getDate();
            return yyyy+"-"+mm+"-"+dd;
        }
        var total = 0

        function addCart(imgUrl,itemsName,itemsPrice){
            var i = document.getElementById('itemsLoop').children.length
            var cartItems = '<div class="d-flex flex-wrap pt-2 mt-2" style = "border-top: 1px solid #eee;">\
                                <div class="col-4 p-0">\
                                    <img src="img/原圖/cake-2.jpg" class="w-100 itemsImg">\
                                </div>\
                                <div class="col-6 d-flex flex-wrap align-content-between">\
                                    <div class="w-100 itemsName">冰淇淋莓果蛋糕</div>\
                                    <div class="w-100 d-flex">\
                                        <button type="button" class="btn btn-primary" style="width:40px;height:40px;" onclick="minuser('+i+','+itemsPrice+')"> - </button>\
                                        <input type="text" id="" class="form-control text-center mx-1 px-1 countNum" style="width:40px;height:40px;" value="1">\
                                        <button type="button" class="btn btn-primary" style="width:40px;height:40px;" onclick="adder('+i+','+itemsPrice+')">+</button>\
                                    </div>\
                                </div>\
                                <div class="col-2 p-0 d-flex flex-wrap align-content-between text-right">\
                                    <div class="w-100"><i class="fas fa-trash delItems"></i></div>\
                                    <div class="w-100 itemsPrice" style="width: 40px;height: 30px;">$200</div>\
                                </div>\
                            </div>';
            $('#itemsLoop').append(cartItems)
            document.getElementsByClassName('itemsImg')[i].src = imgUrl
            document.getElementsByClassName('itemsName')[i].innerHTML = itemsName
            document.getElementsByClassName('itemsPrice')[i].innerHTML = '$' + itemsPrice
            total += itemsPrice
            document.getElementById('total').innerHTML = '合計 : $'+total
            $('.delItems').click(function(){
                this.parentElement.parentElement.parentElement.remove()
                total = 0
                for(x=0; x < document.getElementById('itemsLoop').children.length; x++){
                    total += parseInt(document.getElementsByClassName("itemsPrice")[x].innerHTML.substring(1))
                }
                document.getElementById('total').innerHTML = '合計 : $'+total
            })
        }
        
        function adder(i,itemsPrice) {
            var count = document.getElementsByClassName("countNum")[i].value
            if(count >= 10) 
                count = 10
            else 
                count = parseInt(count) + 1
            document.getElementsByClassName("countNum")[i].value = count
            updatePrice(i,itemsPrice,count)
        }

        function minuser(i,itemsPrice) {
            var count = document.getElementsByClassName("countNum")[i].value
            if(count <= 1) 
                count = 1
            else 
                count = parseInt(count) - 1
            document.getElementsByClassName("countNum")[i].value = count
            updatePrice(i,itemsPrice,count)
        }
        function updatePrice(i,itemsPrice,count){
            total = 0;
            var xPrice = document.getElementsByClassName("itemsPrice")
            xPrice[i].innerHTML = '$' + itemsPrice * count
            for(x=0; x < document.getElementById('itemsLoop').children.length; x++){
                total += parseInt(xPrice[x].innerHTML.substring(1))
            }
            document.getElementById('total').innerHTML = '合計 : $'+total
        }
    </script>
</body>
</html>