<?php

if($_SESSION["profile"] == "Special"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>
<!-- Log on to codeastro.com for more projects! -->
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administración de Clientes

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-success" data-toggle="modal" data-target="#addCustomer">

        Añadir Cliente

        </button>

      </div>
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Nombre</th>
             <th>DNI</th>
             <th>Correo electrónico</th>
             <th>Contacto</th>
             <th>Dirección</th>
             <th>Fecha ingreso</th>
             <th>Compras realizadas</th>
             <th>Última compra</th>
             <th>Último contacto</th>
             <th>Acciones</th>

           </tr> 

          </thead>

          <tbody>
          
          <?php

            $item = null;
            $valor = null;

            $Customers = controllerCustomers::ctrShowCustomers($item, $valor);

            foreach ($Customers as $key => $value) {
              

              echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["name"].'</td>

                      <td>'.$value["idDocument"].'</td>

                      <td>'.$value["email"].'</td>

                      <td>'.$value["phone"].'</td>

                      <td>'.$value["address"].'</td>

                      <td>'.$value["birthdate"].'</td>             

                      <td>'.$value["purchases"].'</td>

                      <td>'.$value["lastPurchase"].'</td>

                      <td>'.$value["registerDate"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-primary btnEditCustomer" data-toggle="modal" data-target="#modalEditCustomer" idCustomer="'.$value["id"].'"><i class="fa fa-pencil"></i></button>

                          <button class="btn btn-danger btnDeleteCustomer" idCustomer="'.$value["id"].'"><i class="fa fa-trash"></i></button>

                        </div>  

                      </td>

                    </tr>';
            
              }

          ?>
            
          </tbody>
		<!-- Log on to codeastro.com for more projects! -->
        </table>

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
MODAL ADD CUSTOMER
======================================-->

<div id="addCustomer" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        <div class="modal-header" style="background: #DD4B39; color: #fff">
          
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
          <h4 class="modal-title">Añadir Cliente</h4>

        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- NAME INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Nombre" required>
              </div>
            </div>

            <!-- I.D DOCUMENT INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="DNI" required>
              </div>
            </div>

            <!-- EMAIL INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input class="form-control input-lg" type="text" name="newEmail" placeholder="Correo" required>
              </div>
            </div>

            <!-- PHONE INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                <input class="form-control input-lg" type="text" name="newPhone" placeholder="Teléfono" data-inputmask="'mask':'9999-9999'" data-mask required>
              </div>
            </div>

            <!-- ADDRESS INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Dirección" required>
              </div>
            </div>


             <!-- BIRTH DATE INPUT -->

            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Fecha" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>

          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Guardar Cliente</button>
        </div>
      </form>

      <?php

        $createCustomer = new ControllerCustomers();
        $createCustomer -> ctrCreateCustomer();

      ?>
    </div>

  </div>

</div>


<!--=====================================
MODAL EDIT CUSTOMER
======================================-->

<div id="modalEditCustomer" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        <div class="modal-header" style="background:#DD4B39; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Cliente</h4>

        </div>
		<!-- Log on to codeastro.com for more projects! -->
        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- NAME INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editCustomer" id="editCustomer" required>
                <input type="hidden" id="idCustomer" name="idCustomer">
              </div>

            </div>

            <!-- I.D DOCUMENT INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editIdDocument" id="editIdDocument" required>

              </div>

            </div>

            <!-- EMAIL INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editEmail" id="editEmail" required>

              </div>

            </div>

            <!-- PHONE INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editPhone" id="editPhone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ADDRESS INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editAddress" id="editAddress"  required>

              </div>

            </div>

            <!-- BIRTH DATE INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editBirthdate" id="editBirthdate"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>

          <button type="submit" class="btn btn-success">Guardar Cambios</button>

        </div>

      </form>

      <?php

        $EditCustomer = new ControllerCustomers();
        $EditCustomer -> ctrEditCustomer();

      ?>

    

    </div>
	<!-- Log on to codeastro.com for more projects! -->
  </div>

</div>

<?php

  $deleteCustomer = new ControllerCustomers();
  $deleteCustomer -> ctrDeleteCustomer();

?>