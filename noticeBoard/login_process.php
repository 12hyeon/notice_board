<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '011212',
    'db');
$sql = "SELECT * from member WHERE id={$_POST['id']}";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$info = array('id'=>$row['id'], 'pw'=>$row['password']);
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <title>로그인</title>
    <style>
        div {
          display: block;
          text-align: center;
        }
        #login_set_top {
            padding: 30px;
            background-color: rgba(47, 50, 90, 0.983);
            color: white;
        }
        tbody td {
            text-align: center;
        }
        tbody input {
            text-align: center;
            border-radius: 10px;
            width: 150px
        }
        tbody tr {
            background-color: #f5f5f5;
        }
        .table_bgbox {
            margin: 40px;
            height: 200px;
        }
        .table_bgbox ul {
            padding: 0px;
            display: block;
        }
        .table_bgbox li {
            padding: 10px;
        }
        .table_bgbox a {
            padding: 5px;
            margin: 0px 10px
        }
        .table_bgbox input {
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
            border-style: none;
        }
    </style>
</head>

<body>
    <header>
        <div id="login_set_top">
            <a href="main.html"><img src="./image/4STUP_log.png" alt="4STUP_logo" width="100px" height="120px"></a>
            <div><a class="homepage" href="main.html">4STUP: Mobile Lab</a></div>
        </div>
    </header>
    <div class="board">
		<div class="table_bgbox">
            <form action="main_process.php" method="post">
            <?php
            $conn = mysqli_connect(
                'localhost', 'root', '011212', 'db');
                $sql = "SELECT * FROM member";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);
                echo "<li>{$row['id']}</li>";
                if ($row['id'] & $row['password']) {
                    if (($_POST['id'] == $row['id']) & ($_POST['password'] == $row['password'])) {
                        # 바로 로그인된 메인페이지로 이동?
                        ?>
                        <input type="hidden" name=<?=$_POST['id'] ?>>
                        <?php
                    }
                    else {
                        echo "올바른 비밀번호가 아닙니다.<a href='login.php'>로그인</a>";
                    }
                }
                else {
                    echo "올바른 아이디가 아닙니다.<a href='login.php'>로그인</a>";
                }
                ?>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>