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
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['address']) && isset($_POST['text_preview']) && isset($_POST['text']) && isset($_POST['img']) && isset($_POST['subNew'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$address = htmlentities(mysqli_real_escape_string($link, $_POST['address']));
    	$text_preview = htmlentities(mysqli_real_escape_string($link, $_POST['text_preview']));
    	$text = htmlentities(mysqli_real_escape_string($link, $_POST['text']));
    	$img1 = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
    		// создание строки запроса
	    	$query ="INSERT INTO `interior` VALUES(NULL, '$address','$text_preview','$text','$img1','$img2','$img3')";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Ресторан успешно добавлен</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['address']) && isset($_POST['update']) && isset($_POST['text_preview']) && isset($_POST['text']) && isset($_POST['img']) && isset($_POST['subUpdate'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['update']));
    	$address = htmlentities(mysqli_real_escape_string($link, $_POST['address']));
    	$text_preview = htmlentities(mysqli_real_escape_string($link, $_POST['text_preview']));
    	$text = htmlentities(mysqli_real_escape_string($link, $_POST['text']));
    	$img1 = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
    	
    		// создание строки запроса
	    	$query ="UPDATE `interior` SET  address='$address',text_preview='$text_preview', text_full='$text',img1='$img1' WHERE id_interior ='$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Ресторан успешно изменен</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['delete']) && isset($_POST['subDelete'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['delete']));
    	
    		// создание строки запроса
	    	$query ="DELETE FROM `interior` WHERE id_interior = '$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Ресторан успешно удален</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}		
?>
		
		<div class="form">

			<form action="edit_interior.php" id="formNew" method="post">
				<h2>Добавить ресторан</h2>
				<table border="1">
					
					<tr><td>Введите адрес</td><td><input type="text" name="address" required placeholder="Московская, 8" ></td></tr>
					<tr><td>Введите текст превью</td><td><input type="text" name="text_preview" required></td></tr>
					<tr><td>Введите текст</td><td><input type="text" name="text" required></td></tr>
					<tr><td>Укажите путь до изображения</td><td><input type="text" name="img" required></td></tr>
                    <tr><td><input type="submit" name="subNew" value="Создать"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
			<form action="edit_interior.php" id="formUpdate" method="post">
				<h2>Изменить ресторан</h2>
				<table border="1">
                <tr><td>Введите ID</td><td><input type="number" name="update"></td></tr>
                <tr><td>Введите адрес</td><td><input type="text" name="address" required placeholder="Московская, 8" ></td></tr>
				<tr><td>Введите текст превью</td><td><input type="text" name="text_preview" required></td></tr>
				<tr><td>Введите текст</td><td><input type="text" name="text" required></td></tr>
				<tr><td>Укажите путь до изображения</td><td><input type="text" name="img" required></td></tr>
                
				
				<tr><td><input type="submit" name="subUpdate" value="Обновить"></td><td><input type="reset" value="Сбросить"></td></tr>
				<input type="hidden" name="key" value="<?=$key;?>">
				<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
			<form action="edit_interior.php" id="formDelete" method="post">
            <h2>Удалить ресторан</h2>
				<table border="1">
                <tr><td>Введите ID</td><td><input name="delete" type="number"></td></tr>
                	<tr><td><input type="submit" name="subDelete" value="Удалить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
		</div>	
		<h2>Все рестораны</h2>
		<div class="database">
		<?php $link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
     	$query ="SELECT * FROM `interior`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>ID</th><th>Адрес</th><th>Текст превью</th><th>Текст</th><th>Изображение</th>";
    		for ($i = 0 ; $i < $rows ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = 0 ; $j < 5 ; ++$j)
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