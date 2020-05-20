<?php include "addmysql.php";?>
<?php
    $names ="";
    if(isset($_POST["sigein"])&& $_POST["sigein"]="登入")
    {
        $quert = "SELECT Acct,Names FROM account WHERE Acct=? AND Passwd=?";
        $stmt = $db_link->prepare($quert);
        $stmt->bind_param("ss",$_POST["acct"],$_POST["passwd"]);
        $stmt->execute();
        $stmt->bind_result($accth,$names);
        $stmt->fetch();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 登入</title>
    <?php include "b4_link.php";?>
</head>
<body>
    <?php include "navbar.php";?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 p-3" style="border: #ddd solid 1px;border-radius: 7px;">
                <form action ="" method="post" name="formadd">
                    <div class="form-group">
                        <label for="">帳號</label>
                        <input type="text" name="acct" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">密碼</label>
                        <input type="password" name="passwd" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small all id="helpId" class="text-muted">尚未註冊?  <a href="註冊.php">註冊</a></small>
                        <button type="submit" class="btn btn-primary " name="sigein" value="登入">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php";?>
</body>
</html>