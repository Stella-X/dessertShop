<?php
function GetSQLValueString($theValue, $theType)
{
    switch ($theType) {
        case "string":
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_MAGIC_QUOTES) : "";
            break;
        case "int":
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_SANITIZE_NUMBER_INT) : "";
            break;
        case "email":
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_EMAIL) : "";
            break;
        case "url":
            $theValue = ($theValue != "") ? filter_var($theValue, FILTER_VALIDATE_URL) : "";
            break;
    }
    return $theValue;
}
include "addmysql.php";
if (isset($_POST["action"]) && ($_POST["action"] == "join")) {
    //找尋帳號是否已經註冊
    $query_RecFindUser = "SELECT m_username FROM memberdata WHERE m_username='{$_POST["m_username"]}'";
    $RecFindUser = $db_link->query($query_RecFindUser);
    if ($RecFindUser->num_rows > 0) {
        header("Location: 註冊.php?errMsg=1&username={$_POST["m_username"]}");
    } else {
        //若沒有執行新增的動作	
        $query_insert = "INSERT INTO memberdata (m_name, m_username, m_passwd, m_sex, m_birthday, m_email, m_url, m_phone, m_address, m_jointime) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
        $stmt = $db_link->prepare($query_insert);
        $stmt->bind_param(
            "sssssssss",
            GetSQLValueString($_POST["m_name"], 'string'),
            GetSQLValueString($_POST["m_username"], 'string'),
            password_hash($_POST["m_passwd"], PASSWORD_DEFAULT),
            GetSQLValueString($_POST["m_sex"], 'string'),
            GetSQLValueString($_POST["m_birthday"], 'string'),
            GetSQLValueString($_POST["m_email"], 'email'),
            GetSQLValueString($_POST["m_url"], 'url'),
            GetSQLValueString($_POST["m_phone"], 'string'),
            GetSQLValueString($_POST["m_address"], 'string')
        );
        $stmt->execute();
        $stmt->close();
        $db_link->close();
        header("Location: 註冊.php?loginStats=1");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 註冊</title>
    <?php include "b4_link.php"; ?>
    <script>
        function checkForm() {
            if (document.formJoin.m_username.value == "") {
                alert("請填寫帳號!");
                document.formJoin.m_username.focus();
                return false;
            } else {
                uid = document.formJoin.m_username.value;
                if (uid.length < 5 || uid.length > 12) {
                    alert("您的帳號長度只能5至12個字元!");
                    document.formJoin.m_username.focus();
                    return false;
                }
                if (!(uid.charAt(0) >= 'a' && uid.charAt(0) <= 'z')) {
                    alert("您的帳號第一字元只能為小寫字母!");
                    document.formJoin.m_username.focus();
                    return false;
                }
                for (idx = 0; idx < uid.length; idx++) {
                    if (uid.charAt(idx) >= 'A' && uid.charAt(idx) <= 'Z') {
                        alert("帳號不可以含有大寫字元!");
                        document.formJoin.m_username.focus();
                        return false;
                    }
                    if (!((uid.charAt(idx) >= 'a' && uid.charAt(idx) <= 'z') || (uid.charAt(idx) >= '0' && uid.charAt(idx) <= '9') || (uid.charAt(idx) == '_'))) {
                        alert("您的帳號只能是數字,英文字母及「_」等符號,其他的符號都不能使用!");
                        document.formJoin.m_username.focus();
                        return false;
                    }
                    if (uid.charAt(idx) == '_' && uid.charAt(idx - 1) == '_') {
                        alert("「_」符號不可相連 !\n");
                        document.formJoin.m_username.focus();
                        return false;
                    }
                }
            }
            if (!check_passwd(document.formJoin.m_passwd.value, document.formJoin.m_passwdrecheck.value)) {
                document.formJoin.m_passwd.focus();
                return false;
            }
            if (document.formJoin.m_name.value == "") {
                alert("請填寫姓名!");
                document.formJoin.m_name.focus();
                return false;
            }
            if (document.formJoin.m_birthday.value == "") {
                alert("請填寫生日!");
                document.formJoin.m_birthday.focus();
                return false;
            }
            if (document.formJoin.m_email.value == "") {
                alert("請填寫電子郵件!");
                document.formJoin.m_email.focus();
                return false;
            }
            if (!checkmail(document.formJoin.m_email)) {
                document.formJoin.m_email.focus();
                return false;
            }
            return confirm('確定送出嗎？');
        }

        function check_passwd(pw1, pw2) {
            if (pw1 == '') {
                alert("密碼不可以空白!");
                return false;
            }
            for (var idx = 0; idx < pw1.length; idx++) {
                if (pw1.charAt(idx) == ' ' || pw1.charAt(idx) == '\"') {
                    alert("密碼不可以含有空白或雙引號 !\n");
                    return false;
                }
                if (pw1.length < 5 || pw1.length > 10) {
                    alert("密碼長度只能5到10個字母 !\n");
                    return false;
                }
                if (pw1 != pw2) {
                    alert("密碼二次輸入不一樣,請重新輸入 !\n");
                    return false;
                }
            }
            return true;
        }

        function checkmail(myEmail) {
            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (filter.test(myEmail.value)) {
                return true;
            }
            alert("電子郵件格式不正確");
            return false;
        }
    </script>
</head>

<body>
    <?php if (isset($_GET["loginStats"]) && ($_GET["loginStats"] == "1")) { ?>
        <script>
            alert('會員新增成功\n請用申請的帳號密碼登入。');
            window.location.href = '登入.php';
        </script>
    <?php } ?>
    <?php include "navbar.php"; ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6 p-3 m-2" style="border: #f2e5b1 solid 1.5px;border-radius: 7px;background-color: #243560;">
                <form action="" method="post" name="formJoin" id="formJoin" onSubmit="return checkForm();">
                    <div class="mb-3" style="font-size: 1.7rem;">註冊表單</div>
                    <div class="form-group">
                        <label for="">帳號<small>*</small>
                        <?php if(isset($_GET["errMsg"]) && ($_GET["errMsg"]=="1")){?>
                        <?php echo $_GET["username"];?> 已經有人使用！
                        <?php }?>
                    </label>
                        <input type="text"  name="m_username" id="m_username" class="form-control" placeholder="請填入5~12個字元以內的小寫英文字母、數字、以及_ 符號。" required>
                    </div>
                    <div class="form-group">
                        <label for="">密碼<small>*</small></label>
                        <input type="password" name="m_passwd" id="m_passwd" class="form-control" placeholder="請填入5~10個字元以內的英文字母、數字、以及各種符號組合。" required>
                    </div>
                    <div class="form-group">
                        <label for="">確認密碼<small>*</small></label>
                        <input type="password" name="m_passwdrecheck" id="m_passwdrecheck" class="form-control" placeholder="再輸入一次密碼" required>
                    </div>
                    <div class="form-group">
                        <label for="">姓名<small>*</small></label>
                        <input type="text" name="m_name" id="m_name" class="form-control" placeholder="" required>
                    </div>
                    <label>性別</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio" name="m_sex" value="女" checked>
                            <label class="custom-control-label" for="customRadio">女</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="m_sex" value="男">
                            <label class="custom-control-label" for="customRadio2">男</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">生日<small>*</small></label>
                        <input type="date" name="m_birthday" id="m_birthday" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">電話號碼<small>*</small></label>
                        <input type="text" name="m_phone" id="m_phone" class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email<small>*</small></label>
                        <input type="email" name="m_email" id="m_email" class="form-control" placeholder="確定此電子郵件為可用，以便未來找回帳號。" required>
                    </div>
                    <div class="form-group">
                        <label for="">地址<small>*</small></label>
                        <input type="text" name="m_address" id="m_address" class="form-control" placeholder="" size="40" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>*必填</small>
                        <input name="action" type="hidden" id="action" value="join">
                        <button type="submit" class="btn btn-primary " name="reg"" value="註冊">註冊</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>