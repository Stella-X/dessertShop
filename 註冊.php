<?php include "addmysql.php";?>
<?php
    if(isset($_POST["add"])&& $_POST["add"]="註冊")
    {
        $quert = "INSERT INTO account(Acct,Passwd,Names,Phone,Email) VALUES(?,?,?,?,?)";
        $stmt = $db_link->prepare($quert);
        $stmt->bind_param("sssss",$_POST["acct"],$_POST["passwd"],$_POST["names"],$_POST["phone"],$_POST["email"]);
        $stmt->execute();
        $te ="註冊成功";
        header("Location:登入.php?=id".$te);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 註冊</title>
    <?php include "b4_link.php";?>
</head>
<body>
    <?php include "navbar.php";?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 p-3" style="border: #ddd solid 1px;border-radius: 7px;">
                <form action="" method="post" name="formadd">
                    <div class="mb-3" style="font-size: 1.7rem;">註冊表單</div>
                    <div class="form-group">
                        <label for="">帳號<small all id="helpId" class="text-muted">*</small></label>
                        <input type="text" name="acct" id="acct" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">密碼<small all id="helpId" class="text-muted">*</small></label>
                        <input type="password" name="passwd" id="passwd" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">姓名<small all id="helpId" class="text-muted">*</small></label>
                        <input type="text" name="names" id="names" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">電話號碼<small all id="helpId" class="text-muted">*</small></label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Email<small all id="helpId" class="text-muted">*</small></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="d-flex justify-content-between">
                        <small all id="helpId" class="text-muted">*必填</small>
                        <button type="submit" class="btn btn-primary " name="add" value="註冊">註冊</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>