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
		<h1>Lorem ipsum dolor.</h1>
		<div class="borderLine"></div>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident suscipit odio in illo commodi, error dolor dignissimos molestiae. Sapiente, perferendis nostrum, saepe fugiat totam quis ratione vero, illo nisi sunt recusandae! Cum enim ipsam quas eum odit dignissimos ad soluta.</p>
		<div class="menu">
			<!---->
			<?php 
				$menu = get_menu(); // функция возвращает результат запроса SELECT * FROM menu
				foreach ($menu as $_menu): // начало цикла; из каждой строки вывожу изображение и название 
				print('<a href="page.php?id='.$_menu["type_eng"].'" method="GET">');
			?> 
				<div class="item">
					<div class="imgItem">
						<img src=<?php echo $_menu["img"];?> width="250" height="200" alt="">
					</div>
					<div class="titleItem">
						<h2><?php echo $_menu["type"];?></h2>
					</div>
				</div>
			</a>
			<?php endforeach; // конец цикла ?>
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