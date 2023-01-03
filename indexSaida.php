<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comunidade ZDG - https://comunidadezdg.com.br/</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="index.css">
</head>
<body>

  <?php
  
  //Change the password to match your configuration
  $link = mysqli_connect("localhost", "root", "", "pontozdg");

  // Check connection
  if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  echo "<br>";
  
  
  $sql = "SELECT id, colaborador, dia, horario, local FROM saida";
  $result = $link->query($sql);

  	echo "<nav id='menu-h'>";
    echo "<ul>";
    echo "    <li><a href='https://comunidadezdg.com.br/'>Comunidade ZDG</a></li>";
	echo "    <li><a href='index.php'>Colaborador</a></li>";
	echo "    <li><a href='indexEntrada.php'>Entrada</a></li>";
	echo "    <li><a href='indexSaida.php'>Saída</a></li>";
    echo "    <li><a target='_blank' href='https://comunidadezdg.com.br/'><img src='https://comunidadezdg.com.br/wp-content/uploads/elementor/thumbs/icone-p7nqaeuwl6ck4tz33sz0asflw2opfsqwutv8l3hfk0.png' style='height:20px;'><br></a></li>";
    echo "</ul>";
    echo "</nav>";
	echo "<br> ";
	echo "<h3 align='center' style='margin-left:250px;margin-right:250px'>Assista o vídeo abaixo e entenda porque tanta gente comum está <b>economizando tempo e ganhando dinheiro</b> explorando automações e robôs de mensagens, mesmo sem saber nada de programação</h3>";
	echo "<p align='center'><iframe style='border-radius:20px' width='820' height='461' src='https://www.youtube.com/embed/mr0BvO9quhw' title='Comunidade ZDG' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></p>";
	echo "<p align='center'><a href='https://comunidadezdg.com.br'><button type='button' class='btn btn-success btn-lg'>QUERO FAZER PARTE DA COMUNIDADE ZDG</button></a></p>";
	echo "<br> ";
	echo "<hr>";
	echo "<br> ";
	echo "<h2>Gestão de Pontos - Saídas</h2>";
	echo "<p>Insira algum valor para filtrar a coluna abaixo</p> ";
	echo "<input class='form-control' id='myInput' type='text' placeholder='Buscar..'>";
	echo "<br>";
  
    echo "<br> ";
	echo "<table class='table table-bordered table-striped'> ";
    echo "<thead> ";
				echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Colaborador</th>";
				echo "<th>Dia</th>";
				echo "<th>Horário</th>";
				echo "<th>Local</th>";
				echo "<th>Del</th>";
				echo "</tr>";
	echo " </thead> ";
	echo " <tbody id='myTable'> ";
				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
							
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["colaborador"] . "</td>";
						echo "<td>" . $row["dia"] . "</td>";
						echo "<td>" . $row["horario"] . "</td>";
						echo "<td><a target='_blank' href='". $row["local"] ."'>" . $row["local"] . "</a></td>";
						echo "<td><a href='deleteSaida.php?id=".$row["id"]."' onclick='return delAlert(".$row["id"].");'>Remover</a></td>";
						echo "</tr>";			
					}
				} else {
					echo "0 resultados";
				}
	echo " </tbody> ";
	echo " </table> ";
	echo "<hr>" ;
	echo "<p>Desenvolvido por Comunidade ZDG</p>";


	// Close connection
	mysqli_close($link);
  ?>
  
<script type="text/javascript">
    function delAlert(id){
        alert("A etiqueta " + id + " foi removida com sucesso.");
        return true;
    }
</script>
  
 <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>



</body>
</html>