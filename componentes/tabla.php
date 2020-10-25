
<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>
 <img src="imagenes/img2.png" width="150" height="150"  align=right >
 <h3>USAC - EFPEM<br> 
    Didactica de la Programacion<br>
    Evaluacion Parcial II</hr> 
	<br>
	<br>
<div class="row">
	<div class="col-sm-12">
	
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
				<td class="success">Nombre</td>
				<td class="success">Apellido</td>
				<td class="success">Email</td>
				<td class="success">Telefono</td>
				<td class="success">Editar</td>
				<td class="success">Eliminar</td>
			</tr>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona where id='$idp'";
					}else{
						$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona";
					}
				}else{
					$sql="SELECT id,nombre,apellido,email,telefono 
						from t_persona";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4];
			 ?>

			<tr>
				<td ><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td class="warning" style= "text-align:center"><?php echo $ver[4] ?></td>
				<td class="warning" style= "text-align:center">
					<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('<?php echo $datos ?>')">
						
					</button>
				</td>
				<td class="warning" style= "text-align:center">
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>