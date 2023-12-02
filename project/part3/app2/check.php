<?php
include("../dbconn.php"); // DB연결을 위한 dbconn.php 파일을 인클루드합니다.
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
$id = $_GET['id'];
if (empty($id)) {
    echo "<script>alert('체크실패 : 고유 ID가 넘어오지 않았습니다.');</script>";
	echo "<script>location.replace('../todo_form2.php');</script>";
    exit;
} else {
    $todo_sql = " SELECT * FROM todo2 WHERE id = '$id' ";
    $result = mysqli_query($conn, $todo_sql);
    $row = mysqli_fetch_assoc($result);

    $checked = (int)$row['checked'];
    $checked_re = match ($checked) {
        1 => 0,
        0 => 1,
    };
     #  작성자와 유저가 같지 않으면 체크와 삭제를 할 수 없게 하는 장치 : WHERE user_id = '$userid';
    $todo_sql = " UPDATE todo2 SET checked = '$checked_re', user_id = '$userid' WHERE id = '$id' and user_id ='$userid'";  #todo2로 넣을 것 
    $result = mysqli_query($conn, $todo_sql);
    mysqli_close($conn); // 데이터베이스 접속 종료-
    header("Location: ../todo_form2.php");
}
?>