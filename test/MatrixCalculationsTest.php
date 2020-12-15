<?php

namespace hashbangcode\php3d\Test;

use hashbangcode\php3d\Matrix;
use hashbangcode\php3d\MatrixCalculations;
use PHPUnit\Framework\TestCase;
use hashbangcode\php3d\Vertex;

class MatrixCalculationsTest extends TestCase {

  public function testMatrixMultiplications() {
    $vertex = new Vertex(50, 50, 50);
    $matrix = new Matrix();
    $matrix->setMatrix([
      [2, 0, 0],
      [0, 2, 0],
      [0, 0, 2],
    ]);
    $newVertex = MatrixCalculations::multiply($vertex, $matrix);

    $this->assertEquals(100, $newVertex->x);
    $this->assertEquals(100, $newVertex->y);
    $this->assertEquals(100, $newVertex->z);
  }
}
