<!doctype html>
<html lang="en-us">
<head>
	<meta charset="UTF-8"> 
	<title>Магазин</title>
</head>
<body>
<h3>Список товаров</h3>

<table>
<tr><td>Товар</td><td>Артикул</td><td>Цена</td><td>Количество</td><td>Сумма</td><tr>

<?php
	$summ=0;
	$mysqli=new mysqli('localhost','root','','mybase');
	if ($mysqli->connect_errno) {
		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
		return false;
	};
	$mysqli->set_charset("utf8");
	foreach($_POST as $k=>$v){
		$k=str_replace('n','',$k);
		$v=intval($v);
		$text="select * from products where id=".$k;
		$result=$mysqli->query($text);
		$row=mysqli_fetch_assoc($result);
		echo "<tr><td>".$row['name']."</td><td>".$row['articl']."</td><td>".$row['price']."</td>";
		echo "<td>".$v."</td><td>".$v*$row['price']."</td></tr>";
		$summ+=$v*$row['price'];
	}
?>
</table>
<?="<p>Всего ".$summ."</p>"?>
</body>
</html>
