

<?php
    include "addmysql.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DessertShop - 會員資料</title>
    <?php include "b4_link.php"; ?>
    <script>
        function checkForm() {
            
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

    <?php include "navbar.php"; ?>
    <?php 
        include "b4_link.php"; 
        if(isset($_SESSION["loginMember"]) && ($_SESSION["loginMember"] != "")){
            $username = $row_RecMember["m_username"];
            $name = $row_RecMember["m_name"];
            $sex = $row_RecMember["m_sex"];
            $birthday = $row_RecMember["m_birthday"];
            $phone = $row_RecMember["m_phone"];
            $email = $row_RecMember["m_email"];
            $address = $row_RecMember["m_address"];
        } 
        else{
            $username = "0";
            $name = "1";
            $sex = "2";
            $birthday = "3";
            $phone = "4";
            $email = "5";
            $address = "6";
        }
    ?>
    <?php
        function GetSQLValueString($theValue, $theType) {
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
        //判斷按下修改按鈕
        if(isset($_POST["update"]) && $_POST["update"] =="修改"){
            //確認是否登入中
            if (isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"] != "")) {
                //檢查新密碼是否有輸入
                
                //比對目前密碼是否正確
                if(password_verify($_POST["m_passwd"], $row_RecMember["m_passwd"])){
                    //讀取欲修改密碼
                    $mpass = password_hash($_POST["m_passwd"], PASSWORD_DEFAULT);
                    if($_POST["m_passwdo"] != ""){
                        //檢查確認新密碼是否有輸入
                        if($_POST["m_passwdorecheck"] != ""){
                            $passwd = $_POST["m_passwdo"];
                            $passwd2 = $_POST["m_passwdorecheck"];
                            //檢查passwd 與 passwdrecheck 字串值相同
                            if($passwd == $passwd2){
                                //
                                if(($_POST["m_passwdo"] != "")){
                                    $mpass = password_hash($_POST["m_passwdo"], PASSWORD_DEFAULT);
                                }
                            }
                        }
                    }
                    $query_update = "UPDATE memberdata SET m_passwd=?, m_name=?, m_sex=?, m_birthday=?, m_email=?, m_url=?, m_phone=?, m_address=? WHERE m_username=?";
                        $stmt = $db_link->prepare($query_update);
                        $stmt->bind_param("sssssssss", $mpass,
                        $_POST["m_name"],
                        $_POST["m_sex"],
                        $_POST["m_birthday"],
                        $_POST["m_email"],
                        $_POST["m_url"],
                        $_POST["m_phone"],
                        $_POST["m_address"],
                        $username);
                        $stmt->execute();
                        //若有修改密碼，則登出回到首頁。
                        $redirectUrl= "修改會員資料.php";
                        if(($_POST["m_passwdo"]!="")&&($_POST["m_passwdo"]==$_POST["m_passwdorecheck"])){
                            $stmt->close();
                            unset($_SESSION["loginMember"]);
                            unset($_SESSION["memberLevel"]);
                            $redirectUrl="主頁.php";
                        }
                        ?>
                            <script>
                                var redirectUrlJS = "<?php print($redirectUrl); ?>";
                                alert('會員修改成功。');
                                window.location.href = redirectUrlJS;
                            </script>
                        <?php 
                }
            }   
        }
    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-4 p-3" style="border: #f2e5b1 solid 1.5px;border-radius: 7px;background-color: #243560;">
                <form action="" method="post" name="formJoin" id="formJoin" onSubmit="return checkForm();">
                    <div class="mb-3" style="font-size: 1.7rem;">會員資料表單</div>
                    <div class="form-group">
                        <label for="">帳號<small></small></label>
                        <p name="m_username" id="m_username" class="form-control"><?php echo $username; ?></p>
                    </div>
                    <div class="form-group">
                        <label for="">輸入目前密碼<small>*</small></label>
                        <input type="password" name="m_passwd" id="m_passwd" class="form-control" placeholder="請填入目前密碼" required>
                    </div>
                    <div class="form-group">
                        <label for="">新密碼<small></small></label>
                        <input type="password" name="m_passwdo" id="m_passwdo" class="form-control" placeholder="請填入5~10個字元以內的英文字母、數字">
                    </div>
                    <div class="form-group">
                        <label for="">確認新密碼<small>*</small></label>
                        <input type="password" name="m_passwdorecheck" id="m_passwdorecheck" class="form-control" placeholder="再輸入一次目前密碼">
                    </div>
                    <div class="form-group">
                        <label for="">姓名<small>*</small></label>
                        <input type="text" name="m_name" id="m_name" class="form-control" placeholder="" value=<?php echo $name; ?> required>
                    </div>
                    <label>性別</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio" name="m_sex" value="女" <?php if($sex == "女") echo "checked";?>>
                            <label class="custom-control-label" for="customRadio">女</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" id="customRadio2" name="m_sex" value="男" <?php if($sex == "男") echo "checked";?>>
                            <label class="custom-control-label" for="customRadio2">男</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">生日<small>*</small></label>
                        <input type="date" name="m_birthday" id="m_birthday" class="form-control" placeholder="" required value=<?php echo $birthday; ?>>
                    </div>
                    <div class="form-group">
                        <label for="">電話號碼<small>*</small></label>
                        <input type="text" name="m_phone" id="m_phone" class="form-control" placeholder="" value=<?php echo $phone; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="">Email<small>*</small></label>
                        <input type="email" name="m_email" id="m_email" class="form-control" placeholder="確定此電子郵件為可用，以便未來找回帳號。" value=<?php echo $email; ?> required>
                    </div>
                    <div class="form-group">
                        <label for="">地址<small>*</small></label>
                        <input type="text" name="m_address" id="m_address" class="form-control" placeholder="" size="40" value=<?php  echo str_replace(" ","&nbsp;",$address); ?> required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <small>*必填</small>
                        <input name="action" type="hidden" id="action" value="join">
                        <button type="submit" class="btn btn-primary " name="update" value="修改">修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>