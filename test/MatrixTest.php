<?php

namespace hashbangcode\php3d\Test;

use hashbangcode\php3d\Matrix;
use hashbangcode\php3d\MatrixCalculations;
use PHPUnit\Framework\TestCase;
use hashbangcode\php3d\Vertex;

class MatrixTest extends TestCase {

  public function testCreateMatrix() {
    $matrix = new Matrix();
    $matrix->setMatrix([
      [1, 2, 3],
      [4, 5, 6],
      [7, 8, 9],
    ]);
    $matrixValue = $matrix->getMatrix();

    $this->assertEquals(1, $matrixValue[0][0]);
    $this->assertEquals(2, $matrixValue[0][1]);
    $this->assertEquals(3, $matrixValue[0][2]);
    $this->assertEquals(4, $matrixValue[1][0]);
    $this->assertEquals(5, $matrixValue[1][1]);
    $this->assertEquals(6, $matrixValue[1][2]);
    $this->assertEquals(7, $matrixValue[2][0]);
    $this->assertEquals(8, $matrixValue[2][1]);
    $this->assertEquals(9, $matrixValue[2][2]);
  }
}
