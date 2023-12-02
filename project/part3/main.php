        <div id="main_img_bar">
            <img src="./img/main_png.png"> <!-- 메인 이미지 변경-->
        </div>
        <div id="main_content">
            <div id="latest">
                <h4>최근 게시글</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php
    $con = mysqli_connect("localhost", "user1", "12345", "sample");
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
?>
                <li>
                    <span><?=$row["subject"]?></span>
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </div>
            <div id="point_rank">
                <h4>포인트 랭킹</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from members order by point desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $name  = $row["name"];        
            $id    = $row["id"];
            $point = $row["point"];
            $name = mb_substr($name, 0, 1)." * ".mb_substr($name, 2, 1);
?>
                <li>
                    <span><?=$rank?></span>
                    <span><?=$name?></span>
                    <span><?=$id?></span>
                    <span><?=$point?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>
        <div id="main_content">
            <div id="latest">
                <h4>나의 일정</h4>
                <ul>
<!-- 나의 일정 -->
<?php
    include("./dbconn.php");
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $userid = "";
    $todo_sql = " SELECT * FROM todo where user_id = '$userid' ORDER BY id DESC limit 10"; # 댜른부분
    $result = mysqli_query($conn, $todo_sql);

    if (!$result)
        echo "남은 일정이 없습니다.";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
?>
                <li>
                    <span><?=$row["title"]?></span>
                    <span></span>
                
<?php
            if($row["checked"] == 0){ 

?>
                </li>
<?php
            }
            else{
?>
                    <span><?='✔'?></span>
                </li>
<?php
            }
            
        }
    }
?>
 </ul>
            </div>
        </div>

        <!--  공유 일정-->
        <div id="main_content">
            <div id="latest">
                <h4>공유 일정</h4>
                <ul>
<?php
    include("./dbconn.php");
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $userid = "";
    $todo_sql = " SELECT * FROM todo2 ORDER BY id DESC limit 10"; # 멤버별 일정을 보이게 하기 위한 장치, order by id
    $result = mysqli_query($conn, $todo_sql);

    if (!$result)
        echo "남은 일정이 없습니다.";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
?>
                <li>
                    <span><?=$row["title"]?></span>
                    <span></span>
                
<?php
            if($row["checked"] == 0){               # 일정이 체크되지 않은 경우

?>
                </li>
<?php
            }
            else{                                   # 일청이 체크된 경우
?>
                    <span><?='✔'?></span>
                </li>
<?php
            }
            
        }
    }
mysqli_close($conn);
?>
    </ul>
</div>
</div>


