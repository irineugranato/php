<!DOCTYPE html>
<html>

<head>
	<title>Comunidade ZDG - https://comunidadezdg.com.br/</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "pontozdg");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];

		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO colaborador VALUES (NULL, '$first_name',
			'$last_name')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Dados armazenados com sucesso."
				. " Clique no link para voltar"
				. "<br><br> <a href='index.php'><<< VOLTAR</a></h3>";

			echo nl2br("\nNome: $first_name\nContato: $last_name\n ");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
