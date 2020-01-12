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
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['type']) && isset($_POST['name']) && isset($_POST['discr']) && isset($_POST['cost']) && isset($_POST['weight']) && isset($_POST['img']) && isset($_POST['subNew'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
    	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    	$discr = htmlentities(mysqli_real_escape_string($link, $_POST['discr']));
    	$cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
    	$weight = htmlentities(mysqli_real_escape_string($link, $_POST['weight']));
    	$img = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
    		// создание строки запроса
	    	$query ="INSERT INTO `$type` VALUES(NULL, '$name','$discr','$cost','$weight','$img')";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Блюдо успешно добавлено</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['type']) && isset($_POST['update']) && isset($_POST['name']) && isset($_POST['discr']) && isset($_POST['cost']) && isset($_POST['weight']) && isset($_POST['img']) && isset($_POST['subUpdate'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['update']));
    	$name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
    	$discr = htmlentities(mysqli_real_escape_string($link, $_POST['discr']));
    	$cost = htmlentities(mysqli_real_escape_string($link, $_POST['cost']));
    	$weight = htmlentities(mysqli_real_escape_string($link, $_POST['weight']));
    	$img = htmlentities(mysqli_real_escape_string($link, $_POST['img']));
    		// создание строки запроса
	    	$query ="UPDATE `$type`SET  name='$name',discr='$discr',cost='$cost',weight='$weight',img='$img' WHERE id ='$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Блюдо успешно изменено</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}
	if(isset($_POST['key']) && $_SESSION['key'] == $_POST['key'] && isset($_POST['delete']) && isset($_POST['type']) && isset($_POST['subDelete'])){
    
    	$link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
    	// экранирования символов для mysql
    	$type = htmlentities(mysqli_real_escape_string($link, $_POST['type']));
    	$id = htmlentities(mysqli_real_escape_string($link, $_POST['delete']));
    	
    		// создание строки запроса
	    	$query ="DELETE FROM `$type` WHERE id = '$id'";
	    	// выполняем запрос
	    	if ($link->query($query) === TRUE) {
	  			echo '<h3>Блюдо успешно удалено</h3>';
	  			mysqli_close($link);
			}else {
	 			echo 'Error: '. $link->error;
	 			mysqli_close($link);
		}
	}		
?>
		
		<div class="form">

			<form action="edit_menu.php" id="formNew" method="post">
				<h2>Добавить блюдо</h2>
				<table border="1">
					<tr><td>Выберите тип</td><td><select name="type" form="formNew">
						<option>appetizer</option>
						<option>dessert</option>
						<option>garnish</option>
						<option>pizza</option>
						<option>salad</option>
						<option>soup</option>
					</select></td></tr>
					<tr><td>Введите название</td><td><input type="text" name="name" required></td></tr>
					<tr><td>Введите состав</td><td><input type="text" name="discr" required></td></tr>
					<tr><td>Введите стоимость</td><td><input type="number" name="cost" required></td></tr>
					<tr><td>Введите вес</td><td><input type="number" name="weight" required></td></tr>
					<tr><td>Укажите путь до изображения</td><td><input type="text" name="img" required></td></tr>
					<tr><td><input type="submit" name="subNew" value="Отправить"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
			<form action="edit_menu.php" id="formUpdate" method="post">
				<h2>Изменить блюдо</h2>
				<table border="1">
					<tr><td>Выберите тип</td><td><select name="type" form="formUpdate">
						<option>appetizer</option>
						<option>dessert</option>
						<option>garnish</option>
						<option>pizza</option>
						<option>salad</option>
						<option>soup</option>
					</select></td></tr>
					<tr><td>Введите id изменяемой записи</td><td><input type="text" name="update" required></td></tr>
					<tr><td>Введите название</td><td><input type="text" name="name" required></td></tr>
					<tr><td>Введите состав</td><td><input type="text" name="discr" required></td></tr>
					<tr><td>Введите стоимость</td><td><input type="number" name="cost" required></td></tr>
					<tr><td>Введите вес</td><td><input type="number" name="weight" required></td></tr>
					<tr><td>Укажите путь до изображения</td><td><input type="text" name="img" required></td></tr>
					<tr><td><input type="submit" name="subUpdate" value="Отправить"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
			<form action="edit_menu.php" id="formDelete" method="post">
				<h2>Удалить блюдо</h2>
				<table border="1">
					<tr><td>Выберите тип</td><td><select name="type" form="formDelete">
						<option>appetizer</option>
						<option>dessert</option>
						<option>garnish</option>
						<option>pizza</option>
						<option>salad</option>
						<option>soup</option>
					</select></td></tr>
					<tr><td>Введите id удаляемой записи</td><td><input type="text" name="delete" required></td></tr>
					<tr><td><input type="submit" name="subDelete" value="Отправить"></td><td><input type="reset" value="Сбросить"></td></tr>
					<input type="hidden" name="key" value="<?=$key;?>">
					<?php $_SESSION['key'] = $key;?>
				</table>
			</form>
		</div>	
		<h2>Все блюда</h2>
		<div class="database">
		<?php $link = mysqli_connect($dbhost, $username, $password, $dbname)or die("Ошибка " . mysqli_error($link)); 
     	$query ="SELECT * FROM `appetizer`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>appetizer</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		$query ="SELECT * FROM `dessert`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>dessert</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		$query ="SELECT * FROM `garnish`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>garnish</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		$query ="SELECT * FROM `pizza`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>pizza</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		$query ="SELECT * FROM `salad`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>salad</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		$query ="SELECT * FROM `soup`";
		$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		if($result)
		{
    		$rows = mysqli_num_rows($result); // количество полученных строк
			echo "<table border='1'><tr><th>Тип</th><th>ID</th><th>Название</th><th>Состав, без ГМО</th><th>Стоимость, р</th><th>Вес, гр</th><th>Изображение, jpg</th></tr>";
    		for ($i = 0 ; $i < $rows  ; ++$i)
    		{
    		    $row = mysqli_fetch_row($result);
    		    echo "<tr>";
    		        for ($j = -1 ; $j < 6 ; ++$j){
    		        	if ($j==-1) {
    		        			echo "<td>soup</td>";
    		        		}else echo "<td>$row[$j]</td>";
    		        }
    		    echo "</tr>";
    		}
    		echo "</table>";
    		// очищаем результат
    		mysqli_free_result($result);
		}
		mysqli_close($link);
?>
</div>
	</div>
	<footer>
		
	</footer>
</body>
</html>