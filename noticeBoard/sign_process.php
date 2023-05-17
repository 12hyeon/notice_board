<?php
$conn = mysqli_connect('localhost', 'root', '011212', 'db');
$sql = "
  INSERT INTO member
    (id, password, date, permit)
    VALUES(
        '{$_POST["id"]}',
        '{$_POST["pw"]}',
        NOW(),
        NULL
    )
";
# 아이디가 겹치지 않는지 확인 코드 삽입
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="main.css">
    <meta charset="UTF-8">
    <title>회원가입</title>
    <style>
        div {
            display: block;
            text-align: center;
        }
        #login_set_top {
            padding: 50px;
            background-color: rgba(47, 50, 90, 0.983);
            color: white;
        }
        table {
            text-align: center;
            width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        tbody {
            margin-left: auto;
            margin-right: auto;
        }
        table td {
            text-align: center;
        }
        table tr td {
            width: 150px;
        }
        tbody input {
            text-align: center;
            border-radius: 10px;
            width: 200px
        }
        table tr {
            background-color: #f5f5f5;
        }
        .table_bgbox {
            margin: 40px;
            padding: 10px;
            height: 500px;
        }
        .table_bgbox ul {
            padding: 0px;
            display: block;
        }
        .table_bgbox li {
            padding: 0px;
        }
        .table_bgbox a {
            padding: 5px;
            margin: 0px 10px
        }
        .table_bgbox  {
            padding: 5px;
            font-weight: bold;
            font-size: 15px;
            border-style: none;
        }
    </style>
</head>

<body>
    <div id="login_set_top">
        <a href="main.html"><img src="/image/4STUP_log.png" alt="4STUP_logo" width="100px" height="120px"></a>
        <div><a class="homepage" href="main.html">4STUP: Mobile Lab</a></div>
    </div>

    <div class="board">
        <form action="sign_process.php" method="post">
            <h3>회원가입</h3>
            <div class="table_bgbox">
            <?php
            if ($result === false){
                echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요';
                error_log(mysqli_error($conn));
            } else {
                echo '성공했습니다. <br><a href="login.php">로그인으로 돌아가기</a>';
            }
            ?>
            </div>
        </form>
    </div>
  <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>