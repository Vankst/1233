<!doctype html>
<html lang="en-us">
   <head>
      <meta charset="UTF-8">
      <title>Магазин</title>
      <style>
      body, table {
  font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
  font-size: 14px;
  background: white;
  max-width: 70%;
  width: 70%;
  border-collapse: collapse;
  text-align: left;
}
th {
  font-weight: normal;
  color: #039;
  border-bottom: 2px solid #6678b1;
  padding: 10px 8px;
}
td {
  color: #669;
  padding: 9px 8px;
  transition: .3s linear;
}
tr:hover td {
  color: #6699ff;
}</style>
   </head>
   <body>
      <h3>Список товаров</h3>
      <form method="POST" action="PayProct.php">
         <table>
            <?php
               //var_dump($_POST);
               	$mysqli=new mysqli('localhost','root','','mybase');
               	if ($mysqli->connect_errno) {
               		echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
               		return false;
               	};
                  if(empty($_POST['price']) ){
                     echo "Нет аргумента";
                  }
                  else{
               	$mysqli->set_charset("utf8");
               	$text="select * from products where name='".$_POST['name']."' and price".$_POST['sign']." ".$_POST['price'];
               //echo $text;
               	$result=$mysqli->query($text);
                  $content = "<table>
                     <tr><th>Название</th><th>Артикл</th><th>Цена</th></tr>
                        
                     ";
                     echo $content;
               	while ($row = mysqli_fetch_assoc($result)){
              //echo $row['name'];
               		echo "<tr><td>".$row['name']."</td><td>".$row['articl']."</td><td>".$row['price']."</td>";
               		echo "</tr>";
               	};
               	
                  echo "</table>";
               }
               ?>
         </table>
				   <a href="index.php">Назад</a>
      </form>
   </body>
</html>