<?php

if($_SESSION["profile"] == "Seller"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administración de Productos

    </h1>

    <ol class="breadcrumb">
		<!-- Log on to codeastro.com for more projects! -->
      <li><a href="home"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addProduct"> <i class="fa fa-plus"></i> Añadir Producto</button>

      </div>

      <div class="box-body">

        <table class="table table-bordered table-hover table-striped dt-responsive productsTable" width="100%">
       
          <thead>
			<!-- Log on to codeastro.com for more projects! -->
           <tr>
             
             <th style="width:10px">#</th>
             <th>Imagen</th>
             <th>Código</th>
             <th>Descripción</th>
             <th>Categoría</th>
             <th>Existencias</th>
             <th>Precio Compra</th>
             <th>Precio Venta</th>
             <th>Fecha de ingreso</th>
             <th>Acciones</th>

           </tr> 

          </thead>

        </table>

        <input type="hidden" value="<?php echo $_SESSION['profile']; ?>" id="hiddenProfile">

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
=            module add Product            =
======================================-->

<!-- Modal -->
<div id="addProduct" class="modal fade" role="dialog">
	<!-- Log on to codeastro.com for more projects! -->
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Añadir Producto</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- input category -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span>

                <select class="form-control input-lg" id="newCategory" name="newCategory">

                  <option value="">Seleccionar Categoría</option>

                   <?php

                    $item = null;
                    $value1 = null;

                    $categories = controllerCategories::ctrShowCategories($item, $value1);

                    foreach ($categories as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["Category"].'</option>';
                    }

                  ?>

                </select>

              </div>

            </div>

            <!--Input Code -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-code"></i></span>

                <input class="form-control input-lg" type="text" id="newCode" name="newCode" placeholder="Código de producto" required>

              </div>

            </div>

            <!-- input description -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span>

                <input class="form-control input-lg" type="text" id="newDescription" name="newDescription" placeholder="Nombre de producto" required>

              </div>

            </div>

             <!-- input Stock -->
            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-check"></i></span>

                <input class="form-control input-lg" type="number" id="newStock" name="newStock" placeholder="Añadir Existencias" min="0" required>

              </div>

            </div>

            <!-- INPUT BUYING PRICE -->
            <div class="form-group row">

              <div class="col-xs-12 col-sm-6">

                <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                  <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newBuyingPrice" step="any" min="0" placeholder="Precio de compra" required>

                </div>

              </div>
			  <!-- Log on to codeastro.com for more projects! -->

              <!-- INPUT SELLING PRICE -->
              <div class="col-xs-12 col-sm-6">  

                <div class="input-group"> 

                  <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                  <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Precio de venta" required>

                </div> 

                <br>

                <!-- CHECKBOX PERCENTAGE -->
                <div class="col-xs-6"> 

                  <div class="form-group">   

                    <label>     

                      <input type="checkbox" class="minimal percentage" checked>

                      Precio porcentual

                    </label>

                  </div>

                </div>

                <!-- INPUT PERCENTAGE -->
                <div class="col-xs-6" style="padding:0">

                  <div class="input-group"> 

                    <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

            <!-- input image -->
            <div class="form-group">

              <div class="panel">Subir imagen</div>

              <input id="newProdPhoto" type="file" class="newImage" name="newProdPhoto">

              <p class="help-block">Tamaño máximo 2Mb</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" alt="" width="100px">

            </div> 

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-success">Guardar Producto</button>

        </div>

      </form>
	  <!-- Log on to codeastro.com for more projects! -->

      <?php

          $createProduct = new ControllerProducts();
          $createProduct -> ctrCreateProducts();

        ?> 
    </div>

  </div>

</div>

<!--====  End of module add Product  ====-->

<!--=====================================
EDIT PRODUCT
======================================-->

<div id="modalEditProduct" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Producto</h4>

        </div>

        <!--=====================================
         BODY
        ======================================-->
		<!-- Log on to codeastro.com for more projects! -->
        <div class="modal-body">

          <div class="box-body">

            <!-- Select Category -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editCategory" readonly required>
                  
                  <option id="editCategory"></option>

                </select>

              </div>

            </div>

            <!-- INPUT FOR THE CODE -->          
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editCode" name="editCode" readonly required>

              </div>

            </div>

            <!-- INPUT FOR THE DESCRIPTION -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editDescription" name="editDescription" required>

              </div>

            </div>

             <!-- INPUT FOR THE STOCK -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editStock" name="editStock" min="0" required>

              </div>

            </div>

             <!-- INPUT FOR BUYING PRICE -->
             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editBuyingPrice" name="editBuyingPrice" step="any" min="0" required>

                  </div>

                </div><!-- Log on to codeastro.com for more projects! -->

                <!-- INPUT FOR SELLING PRICE -->
                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editSellingPrice" name="editSellingPrice" step="any" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- PERCENTAGE CHECKBOX -->
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal percentage" checked>
                        
                        Precio porcentual

                      </label>

                    </div>

                  </div>

                  <!-- INPUT FOR PORCENTAJE -->
                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- INPUT TO UPLOAD IMAGE -->
             <div class="form-group">
              
              <div class="panel">Subir imagen</div>

              <input type="file" class="newImage" name="editImage">

              <p class="help-block">Tamaño Máximo 2MB</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">

              <input type="hidden" name="currentImage" id="currentImage">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-success">Guardar cambios</button>

        </div>

      </form>

        <?php

          $editProduct = new controllerProducts();
          $editProduct -> ctrEditProduct();

        ?>      

    </div>

  </div>

</div><!-- Log on to codeastro.com for more projects! -->

<?php

  $deleteProduct = new controllerProducts();
  $deleteProduct -> ctrDeleteProduct();

?>
