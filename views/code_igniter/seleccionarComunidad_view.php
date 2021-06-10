<?php
//casos a estudiar: count= 0 o 1.
if (count($comunidades) == 1) {
  $cmd = reset($comunidades);
  $_SESSION['id_comunidad'] = $cmd['id'];
  header("location: /principal/index/{$cmd['id']}");
}else{
echo "<!DOCTYPE html><html>";
// include page header HTML
include_once "header.php";
$output = "<body><div class='container' style='margin-top:70px'";

$output .= "<div id='resultado' class='col-md-12'>";
$output .= "<h1 class = 'border-bottom'>Seleccionar comunidad</h1>";
$output .= "<table class='table table-sm table-striped table-hover table-bordered'>";

foreach ($cmds as $comunidad) { // Si cmds está vacía, no entra en el bucle.  CORREGIR
  extract($comunidad);

  // edit button
  $output .= '<tr><td>' . "{$denom} </td>";
  $output .= "<td>{$dir}</td>";
  $output .= "<td>{$localidad}</td>";
  $output .= "<td>{$provincia}</td>";
  $output .= "<td><a href=' / principal/index/{$id}' class='btn btn-info btn-sm mr-3'>";
  $output .= "<span class='fas fa-edit'></span> Seleccionar";
  $output .= "</a></td></tr>";
}
$output .= "</table></body></html>";
echo $output;

}

