<?php
session_start();
$admin = '123';//логин 
$pass = '123';//пароль 
?>
<?php
if($_POST['submit'])
{
    if($admin == $_POST['user'] AND $pass == ($_POST['pass'])) // если совпадает
    {
        $_SESSION['admin'] = $admin; // присваиваем сессии имя админа
        header("Location: edit_menu.php"); // направляем в админку 
        exit;
    }else echo '<p>Логин или пароль неверны!</p>';//или нет
} 
?>
<meta charset="UTF-8">

<div class="log">
<form method="post">

<table>
<th>Введите данные для входа</th><th><a href="index.php">Вернуться на сайт</a> </th>
<tr><td>Логин: </td><td><input type="text" name="user" /></td></tr>
<tr><td>Пароль:</td><td> <input type="password" name="pass" /></td></tr>
<tr><td><input type="submit" name="submit" value="Войти" /></td></tr>
</table>
</form>
</div>
<style>
	body{
		width: 800px;
		margin: 0 auto;
	}
	.log{
		width: 600px;
		height: 300px;
		position: absolute;
    	top: 0;
    	right: 0;
    	bottom: 0;
    	left: 0;
		margin: auto;
		display: flex;
		justify-content: center;
	}
</style>

