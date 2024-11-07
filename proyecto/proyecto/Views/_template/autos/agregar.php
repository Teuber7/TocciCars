<div class="box-principal">
<h3 class="titulo">Agregar Auto<hr></h3>
	<div class="panel panel-success">
	  <div class="panel-heading">
	    <h3 class="panel-title">Agregar un nuevo auto</h3>
	  </div>
	  <div class="panel-body">
	  	<div class="row">
	  		<div class="col-md-1"></div>
	  		<div class="col-md-10">
	  			<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Nombre del auto</label>
				        <input class="form-control" name="nombre" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Año del auto</label>
				        <input class="form-control" name="año" type="number" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Modelo del auto</label>
				        <input class="form-control" name="modelo" type="text" required>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Sección</label>
				      <select name="id_seccion" class="form-control">
				      	<?php while($row = mysqli_fetch_array($datos)){ ?>
				      		<option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
				      	<?php } ?>
				      </select>
				    </div>
				    <div class="form-group">
				      <label for="inputEmail" class="control-label">Imagen</label>
				        <input class="form-control" name="imagen" id="imagen" type="file" required>
				    </div>
				    <div class="form-group">
				    	 <button type="submit" class="btn btn-success">Registrar</button>
				        <button type="reset" class="btn btn-warning">Borrar</button>
				    </div>
				</form>
	  		</div>
	  		<div class="col-md-1"></div>
	  	</div>
	  </div>
	</div>
</div>