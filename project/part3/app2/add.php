<?php
include("../dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.

$title    = trim($_POST['title']);
$datetime = date('Y-m-d H:i:s', time());
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (empty($title)) {
    echo "<script>alert('추가실패 : 내용을 입력하세요.');</script>";
    echo "<script>location.replace('../todo_form2.php');</script>";
    exit;
} else {
    $todo_sql = " INSERT INTO todo2 SET title = '$title', user_id = '$userid', datetime = '$datetime' ";  # todo2로 넣을 것 
    $result = mysqli_query($conn, $todo_sql);
    mysqli_close($conn); // 데이터베이스 접속 종료
    header("Location: ../todo_form2.php");
}
?>