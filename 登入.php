<?php include "addmysql.php"; ?>
<?php
//檢查是否經過登入，若有登入則重新導向
if (isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"] != "")) {
    //若帳號等級為 member 則導向會員中心
    if ($_SESSION["memberLevel"] == "member") {
        header("Location: 主頁.php");
        //否則則導向管理中心
    } else {
        header("Location: member_admin.php");
    }
}
//執行會員登入
if (isset($_POST["username"]) && isset($_POST["passwd"])) {
    //繫結登入會員資料
    $query_RecLogin = "SELECT m_username, m_passwd, m_level FROM memberdata WHERE m_username=?";
    $stmt = $db_link->prepare($query_RecLogin);
    $stmt->bind_param("s", $_POST["username"]);
    $stmt->execute();
    //取出帳號密碼的值綁定結果
    $stmt->bind_result($username, $passwd, $level);
    $stmt->fetch();
    $stmt->close();
    //比對密碼，若登入成功則呈現登入狀態
    if (password_verify($_POST["passwd"], $passwd)) {
        //計算登入次數及更新登入時間
        $query_RecLoginUpdate = "UPDATE memberdata SET m_login=m_login+1, m_logintime=NOW() WHERE m_username=?";
        $stmt = $db_link->prepare($query_RecLoginUpdate);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->close();
        //設定登入者的名稱及等級
        $_SESSION["loginMember"] = $username;
        $_SESSION["memberLevel"] = $level;
        //使用Cookie記錄登入資料
        if (isset($_POST["rememberme"]) && ($_POST["rememberme"] == "true")) {
            setcookie("remUser", $_POST["username"], time() + 365 * 24 * 60);
            setcookie("remPass", $_POST["passwd"], time() + 365 * 24 * 60);
        } else {
            if (isset($_COOKIE["remUser"])) {
                setcookie("remUser", $_POST["username"], time() - 100);
                setcookie("remPass", $_POST["passwd"], time() - 100);
            }
        }
        //若帳號等級為 member 則導向會員中心
        if ($_SESSION["memberLevel"] == "member") {
            header("Location: 主頁.php");
            //否則則導向管理中心
        } else {
            header("Location: member_admin.php");
        }
    } else {
        header("Location: 登入.php?errMsg=1");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 登入</title>
    <?php include "b4_link.php"; ?>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 p-3" style="border: #f2e5b1 solid 1.5px;border-radius: 7px;background-color: #243560;">
                <form action="" method="post" name="form1">
                    <div class="mb-3" style="font-size: 1.7rem;">會員登入</div>
                    <div class="form-group">
                        <label for="">帳號</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="" value="<?php if (isset($_COOKIE["remUser"]) && ($_COOKIE["remUser"] != "")) echo $_COOKIE["remUser"]; ?>">
                    </div>
                    <div class="form-group">
                        <label for="">密碼</label>
                        <input type="password" name="passwd" id="passwd" class="form-control" placeholder="" value="<?php if (isset($_COOKIE["remPass"]) && ($_COOKIE["remPass"] != "")) echo $_COOKIE["remPass"]; ?>">
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberme" name="rememberme" value="true">
                        <label class="custom-control-label" for="rememberme">記住我的帳號密碼</label>
                    </div>
                    <?php if (isset($_GET["errMsg"]) && ($_GET["errMsg"] == "1")) { ?>
                        <div class="errDiv"> 登入帳號或密碼錯誤！</div>
                    <?php } ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <small all id="helpId" class="text-muted">尚未註冊? <a href="註冊.php">註冊</a><a href="admin_passmail.php">忘記密碼</a></small>
                        <button type="submit" class="btn btn-primary " name="button" id="button" value="登入">登入</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>