<html>
<head>
<title>PHP and MySQL</title>
</head>
<body>
<a name="top"><h1>Countries of the World</h1></a>
	<?php  
		$connection = mysql_connect('localhost', 'root', '123')
			or die ('Imposible conectar al servidor Server!');
		mysql_select_db('world')
			or die ('No ha sido posible seleccionar la BBDD');
		$query = "SELECT  name, code FROM country order by name;";
		$result = mysql_query($query) 
			or die ('Error en la consulta: $query. ' . mysql_error());
				
		if (mysql_num_rows($result) > 0) {
			while($row = mysql_fetch_assoc($result)) {
				echo $row["code"]." - ";
				echo "<a name='".$row["code"]."' href='http://localhost/lab/country_wiki_2.php?country_name=".$row["name"]."'>".$row["name"]."</a><br>";
			}
			echo "<a href='#top'> Return top</a><br><br>";
		} else {
			echo '¡Codigo de pais no encontrado!';			
		}
		
		mysql_free_result($result);
		mysql_close($connection);
		

		
	?>  
     
</body>
</html>