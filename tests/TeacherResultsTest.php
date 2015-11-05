<?php
  require_once "TeacherResults.php";

  class TeacherResultsTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
      $this->results = new TeacherResults(10);      
    }

    public function testGetResults() {
      $expected = array(
        array(
          'Siempre' => 3,
          'Casi siempre' => 3,
          'Algunas veces' => 1,
          'Casi nunca' => 2,
          'Nunca' => 0
        )
      );

      $this->assertEquals($expected, $this->results->getResultsFor('alum'));
    }

    public function testGetResultsByAsignatures() {
      $expected = array(
        'matematicas' => array(
          array(
            'Siempre' => 2,
            'Casi siempre' => 3,
            'Algunas veces' => 1,
            'Casi nunca' => 2,
            'Nunca' => 0
          )
        ),
        'español' => array(
          array(
            'Siempre' => 1,
            'Casi siempre' => 0,
            'Algunas veces' => 0,
            'Casi nunca' => 0,
            'Nunca' => 0
          )
        )
      );

      $this->assertEquals($expected, $this->results->getResultsByAsignaturesFor('alum'));
    }
}

?>
