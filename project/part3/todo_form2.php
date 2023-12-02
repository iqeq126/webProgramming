<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>오늘 뭐하지?</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/todo.css">
</head>
<body> 
	<header>
    	<?php include "header.php"; ?>
    </header>
    <section>
    <div id="main_img_bar">
            <img src="./img/main_png.png"> <!-- !!!!메인 이미지 변경!!!!-->
    </div>
    <div id="todo_box">
	<h3 id="todo_title">
	 공유 일정
	 </h3>
	</div> 
	</section>
	<section>
	    <?php include "todo_index2.php";
	    if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
	//로그인 접근 권한
		?>
	</section> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
