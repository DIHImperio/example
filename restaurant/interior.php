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
		<div class="interior">
			
			<div class="tittleInterior">
				<h1>ИНТЕРЬЕР</h1>
			</div>
				<div class="borderLine"></div>
				<?php 
					$interiors = get_interiors(); // функция возвращает результат запроса SELECT * FROM interiors
					foreach ($interiors as $interior): // начало цикла; из каждой строки вывожу изображение и название 
				?>
				<div class="restaurantItem">
					<div class="textRest">
						<h2><?php echo $interior["address"]; ?></h2>
						<p><?php echo $interior["text_preview"]; ?></p>
					</div>
					<?php 
						$id_interior = $interior["id_interior"];
						print('<a href="inter_page.php?id='.$id_interior.'" method="GET">');
					?> 
					<div class="imgRest"><img src=<?php echo $interior["img1"]; ?> width="300" height="150" alt=""></div></a>
				</div>
				<?php endforeach; ?>
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