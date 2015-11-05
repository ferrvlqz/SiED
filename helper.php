<?php

function get_asignatures_for_teacher($teacher_id) {
  $rows = get_asignature_rows_for($teacher_id);
  return build_asignatures_array($rows);
}

function get_asignature_rows_for($teacher_id) {
  include_once "conexion.php";
  
  $table1 = 'asignacion_de_prof_a_materia';
  $table2 = 'materias';
  $column = 'no_trabajador';
  $sql = "SELECT a.id_mat, nombremat FROM $table1 as a INNER JOIN $table2 as m ON a.id_mat = m.id_mat WHERE $column = $teacher_id";
  return mysql_query($sql);
}

function build_asignatures_array($rows) {
  $asignatures = [];
  while ($asignature = mysql_fetch_assoc($rows)) {
    $asignatures[] = $asignature;
  }
  return $asignatures;
}

?>
