<?php
$mysql_host = "localhost";
$mysql_user = "user1";
$mysql_password = "12345";
$mysql_db = "sample";
$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

if (!$conn) { // 연결 오류 발생 시 스크립트 종료
    die("연결 실패: " . mysqli_connect_error());
}
ini_set('display_errors', 'Off');
?>