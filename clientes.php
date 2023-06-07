<?php
include("conection.php");     

	
	$query1="select * from clientes where ID in (select ID from residencial) and ID in (select ID from comercial)";
	$query2="select * from clientes natural join comercial where ID not in (select ID from residencial)";
	$query3="select * from clientes natural join residencial where ID not in (select ID from comercial)";


	$result1 = mysqli_query($dbconnection,$query1);
	$result2 = mysqli_query($dbconnection,$query2);
	$result3 = mysqli_query($dbconnection,$query3);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
	<title>Clientes</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   </head>
	<body>
	<div id="wrap" class="container">
	<h2>Lista de Clientes</h2>
	<p><a href="menu.php" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Atras</a></p>
	<p><a href="insert_cliente.php?tipo=comercial" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Inserta cliente comercial</a></p>
	<p><a href="insert_cliente.php?tipo=residencial" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Inserta cliente residencial</a></p>
	<table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
	  <thead class="thead-light">
		<tr>
		  <th scope="col">Nombre</th>
		  <th scope="col">Apellido</th>
		  <th scope="col">Telefono</th>
		 <th scope="col">Tipo</th>
		  <th scope="col">Operaciones</th>
		</tr>
	  </thead>
	  <tbody>

<?php

	while($row = mysqli_fetch_array($result1,MYSQLI_BOTH))
	{
		print "<tr><td>";
		print $row['nombre'];
		print "</td><td>";
		print $row['apellido'];
		print "</td><td>";
		print $row['telefono'];
		print "</td><td>";
	
			print 'Ambos';
			print "</td><td>";
		print '
		<a href="insert_cliente.php?edita=1&id='.$row['ID'].'&tipo=both'.'" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Edita</a>
		<a href="delete_cliente.php?id='.$row['ID'].'" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Borra</a>
		';
		print "</td></tr>";			
	}


	while($row = mysqli_fetch_array($result2,MYSQLI_BOTH))
	{
		print "<tr><td>";
		print $row['nombre'];
		print "</td><td>";
		print $row['apellido'];
		print "</td><td>";
		print $row['telefono'];
		print "</td><td>";
	
			print 'Comercial';
			print "</td><td>";
		print '
		<a href="insert_cliente.php?edita=1&id='.$row['ID'].'&tipo=comercial'.'" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Edita</a>
		<a href="delete_cliente.php?id='.$row['ID'].'" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Borra</a>
		';
		print "</td></tr>";			
	}

	while($row = mysqli_fetch_array($result3,MYSQLI_BOTH))
	{
		print "<tr><td>";
		print $row['nombre'];
		print "</td><td>";
		print $row['apellido'];
		print "</td><td>";
		print $row['telefono'];
		print "</td><td>";
	
			print 'Residencial';
			print "</td><td>";
		print '
		<a href="insert_cliente.php?edita=1&id='.$row['ID'].'&tipo=residencial'.'" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Edita</a>
		<a href="delete_cliente.php?id='.$row['ID'].'" class="btn btn-danger btn-sm" role="button" aria-pressed="true">Borra</a>
		';
		print "</td></tr>";			
	}
	
?>
  	</tbody>


</div>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 
 <script>
  $(document).ready(function () {
$('#dtBasicExample').DataTable();
});
</script>

</body>
</html>
<?php
mysqli_close($dbconnection);
?>