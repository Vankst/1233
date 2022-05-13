<!doctype html>
<html lang="en-us">
<head>
	<meta charset="UTF-8"> 
	<title>Магазин</title>
</head>
<body>
<h3>Список товаров</h3>
<form method="POST" action="SummProct.php">
<table>
<tr><td><select name="name">
<?php
	$mysqli=new mysqli('localhost','root','','mybase');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	$text="select distinct name from products"; 
	$result=$mysqli->query($text);
	while ($row = mysqli_fetch_assoc($result)){
		echo "<option>".$row['name']."</option>";
	};
?>
</select></td><td><select name="sign"><option value=">">></option><option value="=">=</option><option value="<"><</option></select></td>
<td><input name="count"></td></tr>
</table>
<input type="submit" value="Заказать">
</form>
</body>
</html>
