<?php

namespace hashbangcode\php3d\Test;

use hashbangcode\php3d\Matrix;
use hashbangcode\php3d\MatrixCalculations;
use PHPUnit\Framework\TestCase;
use hashbangcode\php3d\Vertex;

class MatrixCalculationsTest extends TestCase {

  public function testMatrixMultiplications() {
    $vertex = new Vertex(2, 4, 6);
    $matrix = new Matrix();
    $matrix->setMatrix([
      [2, 0, 0],
      [0, 2, 0],
      [0, 0, 2],
    ]);
    $newVertex = MatrixCalculations::multiply($vertex, $matrix);

    $this->assertEquals(4, $newVertex->x);
    $this->assertEquals(8, $newVertex->y);
    $this->assertEquals(12, $newVertex->z);
  }
}
