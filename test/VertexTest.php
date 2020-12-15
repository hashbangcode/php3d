<?php

namespace hashbangcode\php3d\Test;

use PHPUnit\Framework\TestCase;
use hashbangcode\php3d\Vertex;

class VertexTest extends TestCase {

  public function testCreateZeroPoint() {
    $vertex = new Vertex(0, 0, 0);
    $this->assertEquals(0, $vertex->x);
    $this->assertEquals(0, $vertex->y);
    $this->assertEquals(0, $vertex->z);
  }

  public function testTranslate() {
    $vertex1 = new Vertex(1, 1, 1);
    $vertex2 = new Vertex(1, 1, 1);
    $vertex1->translate($vertex2);
    $this->assertEquals(2, $vertex1->x);
    $this->assertEquals(2, $vertex1->y);
    $this->assertEquals(2, $vertex1->z);
  }

  public function testRotate() {
    $vertex = new Vertex(1, 1, 1);
    $vertex->rotateX(0.01);
    $vertex->rotateY(0.01);
    $vertex->rotateZ(0.01);
    $this->assertEquals(1.0001004916294203, $vertex->x);
    $this->assertEquals(0.9999989950502072, $vertex->y);
    $this->assertEquals(0.999900503320789, $vertex->z);
  }
}
