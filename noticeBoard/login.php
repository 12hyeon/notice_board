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
            <form action="main_login.php" method="post">
                <table>
                    <tr>
                        <td>ID</td>
                        <td><input name="id" type="text" placeholder="아이디"></td>
                    </tr>
                    <tr>
                        <td>PASSWORD</td>
                        <td><input name="pw" type="password" placeholder="비밀번호"></td>
                    </tr>
                </table>
                <input class="login" type="submit" value="로그인">
                <a class="signup" href="sign.php"><strong>회원가입</strong></a>
            </form>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>