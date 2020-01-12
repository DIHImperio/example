<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" >
		<link rel="stylesheet" href="css/style.css">
		<?php 
                include "db.php"; //подключение файла с данными БД
        ?>
	</head>
	<body>
		<header>
			<div class="contactsInfo">
				<div class="leftBlock">
					<div class="contact">
						<p>г. Муром, ул. Московская, 32, стр. 1 </p>
						<p>+7(933)994-87-31 +7(933)994-87-31</p>
					</div>
					<div class="contact">
						<p>г. Муром, ул. Московская, 32, стр. 1</p>
						<p>+7(933)994-87-31 +7(933)994-87-31</p>
					</div>
				</div>
				<div class="logoBlock">
					<a href="index.php"><img src="img/logo.jpg" width="300" height="200" alt="logo"></a>
				</div>
				<div class="rightBlock">
					<div class="contact">
						<p>г. Муром, ул. Московская, 32, стр. 1</p>
						<p>+7(933)994-87-31 +7(933)994-87-31</p>
					</div>
					<div class="contact">
						<p>г. Муром, ул. Московская, 32, стр. 1</p>
						<p>+7(933)994-87-31 +7(933)994-87-31</p>
					</div>
				</div>
			</div>
			<nav>
				<ul>
					<a href="index.php">
						<li>ГЛАВНАЯ</li>
					</a>
					<a href="menu.php">
						<li>МЕНЮ</li>
					</a>
					<a href="reports.php">
						<li>ОТЗЫВЫ</li>
					</a>
					<a href="interior.php">
						<li>ИНТЕРЬЕР</li>
					</a>
				</ul>
			</nav>
		</header>
		<div class="inter_page">
			<?php 
				$id_interior = $_GET['id'];
				$interiors = get_interiors(); // функция возвращает результат запроса SELECT * FROM interiors
				foreach ($interiors as $interior): // начало цикла; из каждой строки вывожу изображение и название 
					
				if ($interior["id_interior"] == $id_interior) {
			?>
			<div class="tittleInter_page">
				<h1><?php echo $interior["address"];?></h1>
			</div>
			<div class="borderLine"></div>
			<div class="slider">
				<img src=<?php echo $interior["img1"];?> width="800" height="500" alt="">
			</div>
			<div class="borderLine"></div>
			<div class="text_inter">
				<p><?php echo $interior["text_full"];?></p>
			</div>
		<?php } endforeach; ?>
		</div>
		<footer>
			<div class="footnav">
				<ul>
					<a href="menu.php">
						<li>МЕНЮ</li>
					</a>
					<a href="reports.php">
						<li>ОТЗЫВЫ</li>
					</a>
					<a href="interior.php">
						<li>ИНТЕРЬЕР</li>
					</a>
				</ul>
			</div>
			<div class="footimges">
				<div class="mastercard"><img src="img/mastercard.png" width="50" height="30" alt=""></div>
				<div class="visa"><img src="img/visa.png" width="50" height="30" alt=""></div>
			</div>
		</footer>
	</body>
</html>