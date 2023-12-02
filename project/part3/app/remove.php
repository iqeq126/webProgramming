<?php
include("../dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.

$id = $_GET['id'];
session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
if (empty($id)) {
    echo "<script>alert('삭제실패 : 고유 ID가 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('../todo_form.php');</script>";
    exit;
} else {
    $todo_sql = " DELETE FROM todo WHERE id = '$id'";
    $result = mysqli_query($conn, $todo_sql);
    mysqli_close($conn); // 데이터베이스 접속 종료
    header("Location: ../todo_form.php");
}
?>
