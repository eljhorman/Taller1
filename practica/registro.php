<?php require_once('Connections/chipichipi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_chipichipi, $chipichipi);
$query_oncecaldas = "SELECT * FROM persona";
$oncecaldas = mysql_query($query_oncecaldas, $chipichipi) or die(mysql_error());
$row_oncecaldas = mysql_fetch_assoc($oncecaldas);
$totalRows_oncecaldas = mysql_num_rows($oncecaldas);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registro</title>
</head>

<body>
<table border="1">
  <tr>
    <td>cedula</td>
    <td>fecha</td>
    <td>asunto</td>
    <td>primer_nombre</td>
    <td>segundo_nombre</td>
    <td>primer_apellido</td>
    <td>segundo_apellido</td>
    <td>fijo</td>
    <td>celular</td>
    <td>direccion</td>
    <td>barrio</td>
    <td>descripcion</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_oncecaldas['cedula']; ?></td>
      <td><?php echo $row_oncecaldas['fecha']; ?></td>
      <td><?php echo $row_oncecaldas['asunto']; ?></td>
      <td><?php echo $row_oncecaldas['primer_nombre']; ?></td>
      <td><?php echo $row_oncecaldas['segundo_nombre']; ?></td>
      <td><?php echo $row_oncecaldas['primer_apellido']; ?></td>
      <td><?php echo $row_oncecaldas['segundo_apellido']; ?></td>
      <td><?php echo $row_oncecaldas['fijo']; ?></td>
      <td><?php echo $row_oncecaldas['celular']; ?></td>
      <td><?php echo $row_oncecaldas['direccion']; ?></td>
      <td><?php echo $row_oncecaldas['barrio']; ?></td>
      <td><?php echo $row_oncecaldas['descripcion']; ?></td>
    </tr>
    <?php } while ($row_oncecaldas = mysql_fetch_assoc($oncecaldas)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($oncecaldas);
?>
