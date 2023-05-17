<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <script>
        //setInterval(make_code, 10000); //10초마다
        // 홈페이지를 부를때마다가 아닌 그냥 지정 시간 날짜에 발행 -> 이메일 전송
        var code;
        function make_code() {
            code = Math.floor(Math.random() * 9999);
            console.log(code);
            $mail = new PHPMailer(true);
            <?php
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                // SMTP 서버 세팅
                $mail->isSMTP();
                // 구글 smtp 설정
                $mail->Host = "smtp.gmail.com";
                // SMTP 암호화 여부
                $mail->SMTPAuth = true;
                // SMTP 포트
                $mail->Port = 465;
                // SMTP 보안 프초트콜
                $mail->SMTPSecure = "ssl";
                // gmail 유저 아이디
                $mail->Username = "1212guswjd@gmail.com";
                // gmail 패스워드
                $mail->Password ="lhj121305!";
                // 인코딩 셋
                $mail->CharSet = 'utf-8';
                $mail->Encoding = "base64";
                // 보내는 사람
                $mail->setFrom('32203660@dankook.ac.kr', 'Tester');
                // 받는 사람
                $mail->AddAddress("hyeonjeong1212@naver.com", "이현정");
                // 본문 html 타입 설정
                $mail->isHTML(true);
                // 제목
                $mail->Subject = '4stup 익명게시판 입장코드';
                // 본문 (HTML 전용)
                $mail->Body = '익명게시판 4stup :'.$code;
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        ?>
        }
    </script>
    <?php if(!isset($_POST['code'])) {
        echo '코드를 입력하세요';
        echo '<form action="home.php" method="post">';
        echo '<input type="text" name="code" value="0">';
        echo '<input type="submit" value="제출"></form>';
    } else {
        if ($_POST['code'] == 0) {
            # 0 대신 주기적으로 만들어지는 코드를 읽을 수 있게
        echo '성공입니다. <input type="button" onclick="make_code()"><a href="main.html">익명게시판으로 이동</a>';
        } else {
            echo '실패입니다.';
            echo '코드를 입력하세요';
            echo '<form action="home.php" method="post">';
            echo '<input type="text" name="code" value="0000">';
            echo '<input type="submit" value="제출"></form>';
        }
    } ?>
</body>
</html>