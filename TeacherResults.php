<?php
require_once 'Averager.php';

class TeacherResults {
  public static $table = 'evaluaciones';

  public function TeacherResults($teacherId) {
    $this->teacherId = $teacherId;
    $this->averager = new Averager();
  }

  public function getResultsFor($type) {
    return $this->buildEvals($type);
  }

  public function getResultsByAsignaturesFor($type){
    $asignatures = $this->getTeacherAsignatures();
    $results = [];
    foreach ($asignatures as $asignature) {
      $asignatureName = $asignature['nombremat'];
      $asignatureId = $asignature['id_mat'];
      $results[$asignatureName] = $this->buildEvals($type, $asignatureId);
    }
    return $results;
  }

  private function getTeacherAsignatures() {
    require_once 'helper.php';
    return get_asignatures_for_teacher($this->teacherId);
  }

  public function getAveragesFor($type) {
    $results = $this->getResults($type);
    return $this->averager->getAveragesFor($result[$type]);
  }

  private function buildEvals($type, $asignatureId = null) {
    $rows = $this->getEvalRows($type, $asignatureId);
    return $this->formatEvals($rows);
  }

  private function getEvalRows($type, $asignatureId = null) {
    require_once 'conexion.php';
    $query = "SELECT * FROM ".TeacherResults::$table." ".
             "WHERE no_trabajador = $this->teacherId ".
             "AND tipo = '$type'";
    if ($asignatureId) {
      $query .= " AND id_materia = $asignatureId";
    }
    $rows = mysql_query($query);
    return $this->rowsToArray($rows);
  }

  private function rowsToArray($rows) {
    $array = array();
    while ($row = mysql_fetch_assoc($rows)) {
      array_push($array, $row);
    }
    return $array;
  }

  private function formatEvals($rows) {
    $evals = [];
    $no_pregunta = 0;
    for ($i = 0; $i < sizeof($rows); $i++) {
      $row = $rows[$i];
      if ($no_pregunta != $row['no_pregunta']) { 
        $no_pregunta = $row['no_pregunta'];
        $evals[] = array(
          'Siempre' => $this->countAnswerForQuestionInRows('5', $no_pregunta, $rows),
          'Casi siempre' => $this->countAnswerForQuestionInRows('4', $no_pregunta, $rows),
          'Algunas veces' => $this->countAnswerForQuestionInRows('3', $no_pregunta, $rows),
          'Casi nunca' => $this->countAnswerForQuestionInRows('2', $no_pregunta, $rows),
          'Nunca' => $this->countAnswerForQuestionInRows('1', $no_pregunta, $rows)
        );
      }
    }
    return $evals;
  }

  private function countAnswerForQuestionInRows($answer, $question, $rows) {
    $count = 0;
    for ($i = 0; $i < sizeof($rows); $i++) {
      $row = $rows[$i];
      if ($row['no_pregunta'] == $question && $row['respuesta'] == $answer) { $count++; }
    }
    return $count;
  }
}

?>
