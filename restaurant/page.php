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
		<div class="page">
			<div class="topnav">
				<ul>
					<?php
						$types = get_types();
						foreach ($types as $type):
							print('<a href="page.php?id='.$type["type_eng"].'" method="GET">'); 
                    ?>
					<li><?php echo $type["type"];?></li>
					</a>
					<?php endforeach; ?>
				</ul>
			</div>
		<div class="food">
			<?php 
				$type_foods = get_food($_GET['id']);
				foreach ($type_foods as $type_food):
			?>
			<div class="foodItem">
				<div class="imgFood"><img src=<?php echo $type_food["img"];?> width="300" height="210" alt=""></div>
				<div class="textFood">
					<div class="foodTitle"><h4><?php echo $type_food["name"];?></h4></div>
					<div class="foodDescr"><p><?php echo $type_food["discr"];?></p></div>
					<div class="foodData">
						<div class="foodCost"><p><?php echo $type_food["cost"];?> р.</p></div>
						<div class="foodWeight"><p><?php echo $type_food["weight"];?> гр.</p></div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
			
		</div>	
		</div>
		<footer>
			<div class="footnav">
				<ul>
					<a href="menu.php">
						<li>МЕНЮ</li>
					</a>
					<a href="news.php">
						<li>НОВОСТИ</li>
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