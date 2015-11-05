<?php
  require_once "Averager.php";

  class AveragerTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
      $this->averager = new Averager();
    }

    public function testGetAveragesFor() {
      $results = array(
        array(
          'Siempre' => 20,
          'Casi siempre' => 3,
          'Algunas veces' => 1,
          'Casi nunca' => 0,
          'Nunca' => 0
        )
      );

      $average = $this->averager->getAveragesFor($results);
      $expected = [round(94.8, 1)];
      $this->assertEquals($expected, $average);
    }
}

?>
