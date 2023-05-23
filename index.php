<?php session_start();
error_reporting(0);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- macaco con cara de rana-->
	<meta charset="UTF-8">
	<title>JJD FOOD - App</title>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css" integrity="sha384-Mmxa0mLqhmOeaE8vgOSbKacftZcsNYDjQzuCOm6D02luYSzBG8vpaOykv9lFQ51Y" crossorigin="anonymous">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>

	<?php

	$carrito_mio=$_SESSION['carrito'];
	$_SESSION['carrito']=$carrito_mio;
	// contamos nuestro carrito hhhhh
	if(isset($_SESSION['carrito'])){
	    for($i=0;$i<=count($carrito_mio)-1;$i ++){
	    if($carrito_mio[$i]!=NULL){

	    $total_cantidad = $carrito_mio['cantidad'];
	    $total_cantidad ++ ;
	    $totalcantidad += $total_cantidad;
	    }}}
	?>


	<header>
		<div class="container">
			<div class="row justify-content-between align-items-center">

				<div class="col-auto">

					<h1>JJD FOOD </h1>
				</div>
				 <div class="col">
				 <h4><a data-bs-toggle="modal" data-bs-target="#modal_cart" class="float-left" style="color: #A17EFF;"><i class="fas fa-shopping-cart"></i> <?php echo $totalcantidad; ?></a></h4>
				 </div>

<!-- Avatar -->
				<div class="col-auto">
					<div class="avatar-container" data-target="#profileOptions" data-toggle="modal">
						<img src="img/avatar.png" alt="">
						<i class="fas fa-cog"></i>
					</div>
				</div>

		</div>
</div>
	</header>

	<!-- MODAL CARRITO -->
	<div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Carrito de compras</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
				<div class="modal-body">
					<div>
						<div class="p-2">
							<ul class="list-group mb-3">
								<?php
								if(isset($_SESSION['carrito'])){
								$total=0;
								for($i=0;$i<=count($carrito_mio)-1;$i ++){
								if($carrito_mio[$i]!=NULL){

	            ?>
								<li class="list-group-item d-flex justify-content-between lh-condensed">
									<div class="row col-12" >
										<div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; // echo substr($carrito_mio[$i]['titulo'],0,10); echo utf8_decode($titulomostrado)."..."; ?></h6>
										</div>
										<div class="col-6 p-0"  style="text-align: right; color: #000000;" >
										<span   style="text-align: right; color: #000000;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?> COP</span>
										</div>
									</div>
								</li>
								<?php
								$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
								     }
								          }
								               }
								?>
								<li class="list-group-item d-flex justify-content-between">
								<span  style="text-align: left; color: #000000;">Total (COP)</span>
								<strong  style="text-align: left; color: #000000;"><?php
								if(isset($_SESSION['carrito'])){
								$total=0;
								for($i=0;$i<=count($carrito_mio)-1;$i ++){
								if($carrito_mio[$i]!=NULL){
								$total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
								}}}
								echo $total; ?> COP</strong>
								</li>

							</ul>
						</div>
					</div>
				</div>



	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
	        <a type="button" class="btn btn-primary" href="Carrito/borrarcarro.php">Vaciar carrito</a>

			<a type="button" class="btn btn-primary" name="continuar" href="js/funciones.php">Continuar compra</a>


	      </div>
	    </div>
	  </div>
	</div>
	<!-- END MODAL CARRITO -->

	<div class="modal fade profile-options-modal" id="profileOptions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">

	      <div class="modal-header">
	        <h5 class="modal-title">Opciones</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>

	      <div class="modal-body">
	        <ul class="profile-options-list">
	        	<li>
	        		<a href=" seguridad.php"><i class="fas fa-user"></i> Mi perfil</a>
	        	</li>
	        	<li>
	        		<a href="logout/logout.php" class="text-danger"><i class="fas fa-times-circle"></i> Cerrar sesión</a>
	        	</li>
	        </ul>
	      </div>

	    </div>
	  </div>
	</div>

	<main class="main">
		<div class="container">
			<div class="search-container">
			</div>
			<div class="products-list-container">
				<h2 class="section-title">Los más pedidos</h2>
				<ul>
					<!-- Platos -->
					<?php

								$consulta = "SELECT * FROM platos";
								$conexion = mysqli_connect("localhost","root","","jjd-food");
								$resultado = mysqli_query($conexion, $consulta);
								while ($Datos = mysqli_fetch_array($resultado)) {
									?>
									<li>
										<a href="#">
											<div class="product-image">
												<img src="img/<?php echo $Datos[5]?>" alt="">
											</div>
											<div class="product-info">
												<div class="product-info-inner">
													<div class="tags">
														<span><?php echo $Datos[1]?></span><span><?php echo $Datos[2]?></span>
													</div>
													<form id="formulario" name="formulario" method="post" action="Carrito/cart.php">
													<input name="precio" type="hidden" id="precio" value="<?php echo $Datos[4]?>" />
													<input name="titulo" type="hidden" id="titulo" value="<?php echo $Datos[0]?>" />
													<input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />

													<h3 class="product-name"><?php echo $Datos[0]?></h3>
													<p class="restaurant"><?php echo $Datos[3]?></p>
													<div class="stars">
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
														<i class="fas fa-star"></i>
													</div>
												</div>
												<p class="product-price"><span>$</span><?php echo $Datos[4]?></p>
											</div>
											<div class="col text-center">
												<button  class="btn btn-primary" type="submit"  ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
											</div>

													</form>
										</a>
									</li>
									<?php
								}
					?>




				</ul>
				<div class="pt-4 pb-5 text-center">
					<a href="#" class="btn btn-block btn-link">
						<span class="d-block mb-2">Ver más productos</span>
						<i class="fas fa-arrow-down"></i>
					</a>
				</div>
			</div>
		</div>
	</main>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>

</html>
