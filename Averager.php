<?php
#
# Clase que calcula los promedios para las evaluaciones
# Habiendo obtenido los resultados de las evaluaciones
# de un profesor usando la clase TeacherResults, puedes
# pasarlos como parámetro al método getAverageFor de esta
# clase.
#
# Ejemplo:
# $profe = 10; # Id del profesor.
# $resultados = TeacherResults::getFor($profe);
# $averager = new Averager();
# $promedioAlumnos = $averager->getAverageFor($resultados['alum']);
# $promedioDirector = $averager->getAverageFor($resultados['dir']);
# $promedioDocente = $averager->getAverageFor($resultados['doc']);
# 
#
class Averager {
  public $FREQUENCIES = array(
    'Siempre' => 100,
    'Casi siempre' => 75,
    'Algunas veces' => 50,
    'Casi nunca' => 25,
    'Nunca' => 0
  );

	public function getAveragesFor($results) {
    $averages = [];
    for ($i = 0; $i < sizeof($results); $i++) {
      $question = $results[$i];
      $totalPoints = $this->getPointsForQuestion($question);
      $maxPossiblePoints = $this->getMaxPossiblePoints($question);
      $averages[] = round(($totalPoints * 100) / $maxPossiblePoints, 1);
    }
    return $averages;
	}

  private function getTotalPoints($results) {
    $totalPoints = 0;
    foreach ($results as $question) {
      $totalPoints += $this->getPointsForQuestion($question);
    }
    return $totalPoints;
  }

  private function getPointsForQuestion($question) {
    $questionPoints = 0;
    foreach ($question as $frequency => $points) {
      $questionPoints += $points * $this->FREQUENCIES[$frequency];
    }
    return $questionPoints;
  }

  private function getMaxPossiblePoints($question) {
    $numberOfEvaluators = $this->getNumberOfEvaluators($question);
    $maxScaleValue = $this->FREQUENCIES['Siempre'];
    return $numberOfEvaluators * $maxScaleValue;
  }

  private function getNumberOfEvaluators($question) {
    $numberOfEvaluators = 0;
    foreach ($question as $frequency => $value) {
      $numberOfEvaluators += $value;
    }
    return $numberOfEvaluators;
  }
}

?>
