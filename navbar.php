<nav class="navbar navbar-expand-md navbar-dark" style="background-color:#243560;">
    <a class="navbar-brand" href="主頁.php"><img src="img/Logo/Logo - line.png" style="height:56px"></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="主頁.php">主頁<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="產品.php">商品</a>
            </li>
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Action 1</a>
                    <a class="dropdown-item" href="#">Action 2</a>
                </div>
            </li> -->
        </ul>
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <?php
            //執行登出動作
            if (isset($_GET["logout"]) && ($_GET["logout"] == "true")) {
                unset($_SESSION["loginMember"]);
                unset($_SESSION["memberLevel"]);
                #header("Location: 主頁.php");
                ?>
                    <script>
                        window.location.href = '登入.php';
                    </script>
                <?php
            }

            if (!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"] == "")) {
                echo '<li class="nav-item"><a id="login_a" class="nav-link" href="登入.php">登入</a></li>';
            } else {
                //繫結登入會員資料
                $query_RecMember = "SELECT * FROM memberdata WHERE m_username = '{$_SESSION["loginMember"]}'";
                $RecMember = $db_link->query($query_RecMember);
                $row_RecMember = $RecMember->fetch_assoc();
                echo '<li class="nav-item"><a class="nav-link" href="修改會員資料.php">' . $row_RecMember["m_name"] . '</a></li>';
                echo '<li class="nav-item"><a id="login_a" class="nav-link" href="?logout=true">登出</a></li>';
            }
            ?>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>