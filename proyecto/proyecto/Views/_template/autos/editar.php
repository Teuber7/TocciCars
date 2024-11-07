<?php $secciones = $estudiantes->listarSecciones(); ?>
<div class="box-principal">
<h3 class="titulo">Editar Auto <?php echo $datos['nombre']; ?><hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Editar Auto <?php echo $datos['nombre']; ?></h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-3">
	  			<div class="panel panel-default">
				  <div class="panel-body">
				    <img class="img-responsive" src="<?php echo URL;?>Views/_template/imagenes/avatars/<?php echo $datos['imagen']; ?>">
				  </div>
				</div>
	  		</div>
	  		<div class="col-md-9">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Nombre del Auto</label>
				        <input class="form-control" value="<?php echo $datos['nombre']; ?>" name="nombre" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Año</label>
				        <input class="form-control" value="<?php echo $datos['Año']; ?>" name="Año" type="number" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Modelo</label>
				        <input class="form-control" value="<?php echo $datos['Modelo']; ?>" name="Modelo" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Sección (<b>Sección Actual: <?php echo $datos['nombre_seccion']; ?></b>)</label>
				      <select name="id_seccion" class="form-control">
				      	<?php while($row = mysqli_fetch_array($secciones)){ ?>
				      		<option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
				      	<?php } ?>
				      </select>
				    </div>
				    <input value="<?php echo $datos['id']; ?>" name="id" type="hidden" required>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Editar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  	</div>
	  </div>
	</div>
</div>