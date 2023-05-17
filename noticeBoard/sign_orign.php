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
    <script>
        var reg_id = /^[A-Za-z0-9]{4,12}$/g;
        var reg_pw = /^[A-Za-z0-9]{4,12}$/g;
        var position = document.getElementsByClassName("error");

        function check_id(id) {
            if (!reg_id.test(id)) {
                position[0].innerHTML = '4~12자리 영문+숫자가 아닙니다.';
            } else if (cmp(id)) {
                // 동일 아이디 생성 못하게!
                position[0].innerHTML = '동일한 아이디가 존재합니다.';
            }
            else {
                position[0].innerHTML = "";
            }
        }
        function check_pw(pw) {
            if (!reg_pw.test(pw)) {
                position[1].innerHTML = '4~12자리 영문+숫자가 아닙니다.';
            } else {
                position[1].innerHTML = "";
            }
        }
        function check_pw2() {
            let pw = document.getElementsByTagName("input")[1].value;
            let pw_check = document.getElementsByTagName("input")[2].value;
            if (pw != pw_check) {
                position[2].innerHTML = '비밀번호가 다릅니다.';
            } else {
                position[2].innerHTML = "";
            }
        }
    </script>
    <div id="login_set_top">
        <a href="main.html"><img src="/image/4STUP_log.png" alt="4STUP_logo" width="100px" height="120px"></a>
        <div><a class="homepage" href="main.html">4STUP: Mobile Lab</a></div>
    </div>

    < class="board">
    <form action="sign_process.php" method="post">
            <h3>회원가입</h3>
            <div class="table_bgbox">
                <table>
                    <tr>
                        <td>아이디</td>
                        <td><input name="id" onchange ="check_id(this.value)" type="text" placeholder="4~12자리 영문+ 숫자"></td>
                    </tr>
                    <tr><td></td><td><div class="error"></div></td></tr>
                    
                    <tr>
                        <td>비밀번호</td>
                        <td><input name="pw" onchange ="check_pw(this.value)" type="text" placeholder="4~12자리 영문+ 숫자"></td>
                    </tr>
                    <tr><td></td><td><div class="error"></div></td></tr>
                    <tr>
                        <td>비밀번호 확인</td>
                        <td><input name="pw_check" onchange ="check_pw2()" type="text" placeholder="비밀번호 확인"></td>
                    </tr>
                    <tr><td></td><td><div class="error"></div></td></tr>
                </table>
                <br>
                <input class="sign" type="submit" value="가입하기">
            </div>
        </form>
    </div>
  <script src="https://kit.fontawesome.com/e0962cb232.js" crossorigin="anonymous"></script>
</body>
</html>