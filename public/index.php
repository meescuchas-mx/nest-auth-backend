<?php
/*
 *   PHP Vista Directorio
 *   Muestra el directorio a los usuarios */

  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require '../app/ApiClient.php';

  $apiClient = new ApiClient();
  
  $personas = $apiClient->getApiResponse('/personas');
  $actualizacion = $apiClient->getApiResponse('/personas/ultimaActualizacion')['fecha_actualizacion'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Directorio CDHCM</title>
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.css"/>
  <style type="text/css">
    html{
      font-family: Arial, Helvetica, Sans-Serif;
    }
    table{
      table-layout: fixed;
      word-wrap:break-word;
    }
    th { font-size: 12px; }
    td { font-size: 12px; }
    
    .table-striped>tbody>tr:nth-child(odd)>td,
    .table-striped>tbody>tr:nth-child(odd)>th {
      background-color: #272B30;
    }
    .table-striped>tbody>tr:nth-child(even)>td,
    .table-striped>tbody>tr:nth-child(even)>th {
      background-color: #2E3338;
    }
    table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child:before, table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child:before {
      background-color: #31b131;
    }
</style>
</head>
<body>
  <div align="right">Actualizado por la DGA (<?php echo $actualizacion;?>) </div>
  <table id="example" class="display" style="width:100%">
      <thead>
          <tr>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Nombre(s)</th>
            <th>Ext.</th>
            <th>Área</th>
            <th>SubUnidad</th>
            <th>Cargo<br>Funciones</th>
            <th>Correo</th>
          </tr>
      </thead>
      <tbody>
        <?php
          foreach($personas as $clave => $valor){
            echo "<tr>
                <td>{$valor['apellido_paterno']}</td>
                <td>{$valor['apellido_materno']}</td>
                <td>{$valor['nombre']}</td>
                <td>{$valor['extension']}</td>
                <td>{$valor['id_area']['nombre']}</td>
                <td>{$valor['id_sub_unidad']['nombre']}</td>
                <td>{$valor['cargo']}</td>
                <td>{$valor['correo']}</td>
              </tr>";
          }
        ?>
      </tbody>
      <tfoot>
          <tr>
              <th>Primer apellido</th>
              <th>Segundo apellido</th>
              <th>Nombre(s)</th>
              <th>Ext.</th>
              <th>Área</th>
              <th>SubUnidad</th>
              <th>Cargo<br>Funciones</th>
              <th>Correo</th>
          </tr>
      </tfoot>
  </table>
</body>
<script src="//code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.datatables.net/v/dt/dt-1.10.18/r-2.2.2/datatables.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#example thead tr').clone(true).appendTo( '#example thead' );
    $('#example thead tr:eq(1) th').each( function (i) {
      var title = $(this).text();
      $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
      $( 'input', this ).on( 'keyup change', function () {
        if ( table.column(i).search() !== this.value ) {
          table.column(i).search( this.value ).draw();
        }
      });
    });

    var table = $('#example').DataTable( {
      orderCellsTop: true,
      fixedHeader: true,
      "language": {"url": "//cdn.datatables.net/plug-ins/725b2a2115b/i18n/Spanish.json"},
    });
  });
</script>
</html>
