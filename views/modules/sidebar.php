<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<?php

			if ($_SESSION["profile"] == "Administrator") {
				
				echo '

					<li class="active">

						<a href="home">

							<i class="fa fa-home"></i>

							<span>Inicio</span>

						</a>

					</li>

					

				';
			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Special"){

				echo '

					<li>

						<a href="categories">

							<i class="fa fa-th"></i>

							<span>Categorías</span>

						</a>

					</li>

					<li>

						<a href="products">

							<i class="fa fa-product-hunt"></i>

							<span>Productos</span>

						</a>

					</li>
				';

			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Seller"){
				echo '
					
					<li>

						<a href="customers">

							<i class="fa fa-users"></i>

							<span>Clientes</span>

						</a>

					</li>

				';
			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Seller"){

			echo'


				<li class="treeview">

				<a href="#">

					<i class="fa fa-usd"></i>

					<span>Ventas</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="sales">

							<i class="fa fa-circle"></i>

							<span>Administración de Ventas</span>

						</a>

					</li>

					<li>

						<a href="create-sale">

							<i class="fa fa-circle"></i>

							<span>Nueva Venta</span>

						</a>

					</li> </ul>';

				}

				if($_SESSION["profile"] == "Administrator"){

					echo '<li>

						<a href="reports">

							<i class="fa fa-file"></i>

							<span>Reporte de ventas</span>

						</a>

					</li>
					
					
					<li>

						<a href="users">

							<i class="fa fa-user"></i>

							<span>Administración de usuarios</span>

						</a>

					</li>';

				}

				

		?>
			
		</ul>

	</section>
	<!-- Log on to codeastro.com for more projects! -->
</aside>