<?
//Запуск сессий;
session_start();
$key = md5(uniqid(rand(),1));
//если пользователь не авторизован
if (!(isset($_SESSION['admin'])))
{
//идем на страницу авторизации
header("Location: login.php");
exit;
};
?>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/admin.css">
	<?php include "db.php"; ?>
	<title>Admin</title>
</head>
<body>
	<header>
		<nav>
			
				<a href="edit_menu.php">
					Редактор меню
				</a>
				<a href="edit_reports.php">
					Редактор отзывов
				</a>
				<a href="edit_interior.php">
					Редактор интерьера
				</a>
				<div class="logoutButton">
					<form method="POST">
            			<input  name='logout' type='submit' value='Выход'  />
        			</form>
        			<?php if(isset($_POST['logout'])){session_destroy();} ?>
    			</div>
				
		</nav>
	</header>
	<div class="edit_menu">
	<?php
	
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['update']) && isset($_POST['answer']) && isset($_POST['subUpdate'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['update']));
    	$answer = htmlentities(mysqli_real_escape_string($link, $_POST['answer']));
    		// создание строки запроса
	    	$query ="UPDATE `reports` SET  answer='$answer' WHERE id_report ='$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Ответ успешно добавлен</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['delete']) && isset($_POST['subDelete'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['delete']));
    	
    		// создание строки запроса
	    	$query ="DELETE FROM `reports` WHERE id_report = '$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>отзыв успешно удален</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}		
?>
		
		<div class="form">

			<form action="edit_reports.php" id="formUpdate" method="post">
				<h2>Добавить ответ</h2>
				<table border="1">
					<tr><td>Введите id отзыва</td><td><input type="text" name="update" required></td></tr>
					<tr><td>Напишите ответ</td><td><input type="text" name="answer" required></td></tr>
					<tr><td><input type="submit" name="subUpdate" value="Ответить"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
			<form action="edit_reports.php" id="formDelete" method="post">
				<h2>Удалить отзыв</h2>
				<table border="1">
					<tr><td>Введите id удаляемой записи</td><td><input type="text" name="delete" required></td></tr>
					<tr><td><input type="submit" name="subDelete" value="Отправить"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
		</div>	
		<h2>Все отзывы</h2>
		<div class="database">
		<?php $link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
     	$query ="SELECT * FROM `reports`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>ID</th><th>Имя</th><th>Адрес</th><th>Содержание</th><th>Дата</th><th>Ответ</th>";
    		for ($i = 0 ; $i < $rows ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = 0 ; $j < 6 ; ++$j)
    		        	echo "<td>$row[$j]</td>";
    		        
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		
?>
</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>