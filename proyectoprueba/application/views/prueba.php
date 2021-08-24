<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#6640b2">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="prueba">
  <meta name="keywords" content="prueba">
  <meta name="author" content="Miguel Segura">

  <title>Prueba</title>

  <link rel="apple-touch-icon" href="<?= base_url() ?>assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>app-assets/images/ico/favicon.ico">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- font-awesome-->
  <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css">

  <!-- highcharts-->
  <script src="https://code.highcharts.com/highcharts.js"></script>

</head>

<body>
  <div class="content container">
    <!-- <div class="alert alert-primary" role="alert"><center><h1>Prueba</h1></center></div> -->
		<div class="row">
      <button class="btn btn-primary" onclick="nuevoRegisto()">Ingresar Nuevo Registro</button>
			
<br>
<br>
  <table id="tabla" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th align="center">id</th>
                <th align="center">folio</th>
                <th align="center">nombre</th>
                <th align="center">valor</th>
                <th align="center">fecha</th>
                <th align="center">Acción</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($datos as $di) {
                echo '<tr>
                        <td>'.$di->id.'</td>
                        <td>'.$di->folio.'</td>
                        <td>'.$di->nombre.'</td>
                        <td>'.$di->valor.'</td>
                         <td>'.date("d-m-Y", strtotime($di->fecha)).'</td>
                        <td align="center"><a data-toggle="modal" onclick="Editar_boleta('.$di->id.',\''.$di->folio.'\',\''.$di->nombre.'\','.$di->valor.',\''.$di->fecha.'\')"><button class="btn btn-info">Editar</button></a>
                        <button class="btn btn-danger" onclick="eliminar('.$di->id.')">Eliminar</button>
                        </td>
                    </tr>';
            }
            ?>
        </tbody>
    </table>




  <div class="modal fade text-left" id="modal_nuevo" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title">
                    <i class="ft ft-edit"></i>
                    <span class="font-weight-bold">nuevo registro </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_guardar">
                <div class="modal-body">
                    <div class="row">
                        Folio
                        <input type="text" name="folio"><br>
                        Nombre
                        <input type="text" name="nombre"><br>
                        Fecha
                        <input type="date" name="fecha"><br>
                        Valor
                        <input type="number" name="valor">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-sm" data-dismiss="modal" value="Cerrar">
                    <input type="button" class="btn btn-outline-primary btn-sm" onclick="ingresar_dato()" value="Guardar">
                </div>
            </form>
        </div>
    </div>
</div>

 <div class="modal fade text-left" id="modal_editar" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h3 class="modal-title">
                    <i class="ft ft-edit"></i>
                    <span class="font-weight-bold">editar registro </span>
                </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_editar">
                <div class="modal-body">
                    <div class="row">
                        ID
                        <input type="number" name="id" id="id" readonly>
                        Folio
                        <input type="text" name="folio_edit" id="folio" readonly><br>
                        Nombre
                        <input type="text" name="nombre_edit" id="nombre"><br>
                        Fecha
                        <input type="date" name="fecha_edit" id="fecha"><br>
                        Valor
                        <input type="number" name="valor_edit" id="valor">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="reset" class="btn btn-outline-secondary btn-sm" data-dismiss="modal" value="Cerrar">
                    <input type="button" class="btn btn-outline-primary btn-sm" onclick="actualizar_dato()" value="Actualizar">
                </div>
            </form>
        </div>
    </div>
</div>
		</div>
  </div>

</body>

<script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function nuevoRegisto() {
     $('#modal_nuevo').modal('show');
  }
  function ingresar_dato() {
    $.ajax({
          type:"POST",
          url:"<?= base_url() ?>ctrl_prueba/guardar",
          data: $('#form_guardar').serialize(),
          success: function(response){
            //alert(response);
            if (response == '0') {
              Swal.fire({
                    icon: 'success',
                    title: 'Hecho',
                    text: 'Dato ingresado!',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }else{
                            location.reload();
                        }
                    })
              
            }
            else {
              Swal.fire({
              icon: 'error',
              title: 'error',
              text: 'Dato repetido!'
              })
            }
              
          },
          error: function(error){
              console.log(error);
              Swal.fire({
              icon: 'error',
              title: 'Error...',
              text: 'Hay un error!!'
              })
          }
      });
  }
  function Editar_boleta(id, folio, nombre,valor, fecha ) {
    $('#id').val(id);
    $('#folio').val(folio);
    $('#nombre').val(nombre);
    $('#fecha').val(fecha);
    $('#valor').val(valor);
    $('#modal_editar').modal('show');
  }
  function actualizar_dato() {
    $.ajax({
          type:"POST",
          url:"<?= base_url() ?>ctrl_prueba/actualizar",
          data: $('#form_editar').serialize(),
          success: function(response){
            Swal.fire({
              icon: 'success',
              title: 'Hecho',
              text: 'Dato Actualizado!',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ok!'
              }).then((result) => {
                  if (result.isConfirmed) {
                      location.reload();
                  }else{
                      location.reload();
                  }
              }) 
          },
          error: function(error){
              console.log(error);
              Swal.fire({
              icon: 'error',
              title: 'Error...',
              text: 'Hay un error!!'
              })
          }
      });
  }
  function eliminar(id) {
    Swal.fire({
        icon: 'Atención',
        title: 'Esta a punto de eliminar el dato',
        text: '¿Esta seguro de eliminar el registro?!',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok!'
        }).then((result) => {
            if (result.isConfirmed) {
              var datos = {
                "id" : id
              }
                $.ajax({
                type:"POST",
                url:"<?= base_url() ?>ctrl_prueba/eliminar",
                data: datos,
                success: function(response){
                    Swal.fire({
                          icon: 'success',
                          title: 'Hecho',
                          text: 'Dato eliminado!',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Ok!'
                          }).then((result) => {
                              if (result.isConfirmed) {
                                  location.reload();
                              }else{
                                  location.reload();
                              }
                          })
                },
                error: function(error){
                    console.log(error);
                    Swal.fire({
                    icon: 'error',
                    title: 'Error...',
                    text: 'Hay un error!!'
                    })
                }
            });
            }else{
              Swal.fire({
              icon: 'error',
              title: 'registro no eliminado',
              text: '!'
              })
            }
        })
  }
</script>

</html>