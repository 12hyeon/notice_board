<?php

    header('Content-Type: text/html; charset=utf-8'); // utf-8 인코딩

    // 순서대로 DB주소, DB 계정 아이디, DB 계정 비밀번호, DB 이름
    $db=new mysqli("localhost","root","","stup");
    $db->set_charset("utf8");

    function mq($sql)
    {
        global $db;
        return $db->query($sql);
    }
?>