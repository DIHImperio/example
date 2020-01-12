
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
		<div class="reports">

			<div class="titleReports">
				<h1>ОТЗЫВЫ</h1>
			</div>
			<div class="borderLine"></div>
			<div class="buttonReport"><a href="#openModal"><h3>ОСТАВИТЬ ОТЗЫВ</h3></a></div>
			<?php
						
						if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['text_report']) && isset($_POST['address']) && isset($_POST['submit']))
						{
							$link = mysqli_connect($dbhost, $username, $password, $dbname) 
        					or die("Ошибка " . mysqli_error($link)); 
							$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
							$address = htmlentities(mysqli_real_escape_string($link, $_POST['address']));
							$text_report = htmlentities(mysqli_real_escape_string($link, $_POST['text_report']));
							$date = htmlentities(mysqli_real_escape_string($link, $_POST['date']));
							$query = "INSERT INTO `reports` VALUES (NULL, '$name','$address','$text_report','$date','');";
						
						if ($link->query($query) === TRUE) {
  							echo '<div class="confirm"><p>Отзыв успешно отправлен. Большое спасибо.</p></div>';
  							mysqli_close($link);
						}else {
							echo '<div class="confirm"><p>Что-то пошло не так. Пожалуйста, повторите попытку позже. </p></div>';
							mysqli_close($link);
						}
						}
					?>
			<div id="openModal" class="modalDialog">
				<div>
 		    		<a href="#close" title="Закрыть" class="close">Х</a>
 		    		
					<form action="reports.php" id="data_report" method="POST">
						<div class="formReport">
							<div class="formItem">
								<select name="address" width="20" form="data_report">
  									<option >Московская, 65</option>
  									<option >Ленина, 2</option>
								</select>
							</div>
							<div class="borderLine"></div>
							<div class="formItem">
								<input form="data_report" name="name" type="text" size="15" required  placeholder="Имя">
							</div>
							<div class="borderLine"></div>
							<div class="formItem">
								<input form="data_report" name="date" type="date" size="20" required >
							</div>
							<div class="borderLine"></div>
							<div class="formItem">
								<textarea form="data_report" name="text_report" maxlength="100" cols="18" rows="3" required placeholder="Сообщение"></textarea>
							</div>
							<div class="borderLine"></div>
							<div class="formItem">
								<input form="data_report" name="submit" type="submit" size="15" value="Отправить">
								
							</div>
						</div>
					</form>
					
				</div>

			</div>
			<?php
				$empty =""; 
				$reports = get_reports(); // функция возвращает результат запроса SELECT * FROM reports
				foreach ($reports as $report): // начало цикла; из каждой строки вывожу все значения, если есть ответ администрации
				if ($report["answer"] != $empty) { // если администратор ответил на отзыв, то выводится пост
			?>
			<div class="reportItem">
				<div class="report">
					<div class="top">
						<div class="author"><h2><?php echo $report["name"]; ?>, <?php echo $report["address"]; ?></h2></div>
						<div class="date"><p><?php echo $report["date"]; ?></p></div>
					</div>
					<p><?php echo $report["text_report"]; ?></p>
				</div>
				<div class="answer">
					<div class="imgAnswer"><img src="img/repLogo.png" width="150" alt=""></div>
					<div class="textAnswer"><h2>ОТВЕТ АДМИНИСТРАЦИИ</h2><p><?php echo $report["answer"]; ?></p></div>
				</div>
			</div>
			<?php
				}
				endforeach; 
			?>
			
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