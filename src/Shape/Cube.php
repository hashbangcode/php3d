<?php

namespace hashbangcode\php3d\Shape;

use hashbangcode\php3d\Vertex;

class Cube implements ShapeInterface {

  public $vertexes = [];

  public function __construct($top, $bottom) {
    for ($i = $bottom; $i <= $top; ++$i) {
      $this->vertexes[] = new Vertex($i, $bottom, $top);
      $this->vertexes[] = new Vertex($i, $top, $top;
      $this->vertexes[] = new Vertex($top, $i, $top;
      $this->vertexes[] = new Vertex($bottom, $i, $top);

      $this->vertexes[] = new Vertex($i, $bottom, $bottom);
      $this->vertexes[] = new Vertex($i, $top, $bottom);
      $this->vertexes[] = new Vertex($top, $i, $bottom);
      $this->vertexes[] = new Vertex($bottom, $i, $bottom);
    }

    for ($i = $bottom; $i <= $top; ++$i) {
      $this->vertexes[] = new Vertex($bottom, $top, $i);
      $this->vertexes[] = new Vertex($top, $top, $i);
      $this->vertexes[] = new Vertex($top, $bottom, $i);
      $this->vertexes[] = new Vertex($bottom, $bottom, $i);
    }

    $this->vertexes[] = new Vertex($bottom, $top, $top);
    $this->vertexes[] = new Vertex($top, $top, $top);
    $this->vertexes[] = new Vertex($top, $bottom, $top);
    $this->vertexes[] = new Vertex($bottom, $bottom, $top);

    $this->vertexes[] = new Vertex($bottom, $top, $bottom);
    $this->vertexes[] = new Vertex($top, $top, $bottom);
    $this->vertexes[] = new Vertex($top, $bottom, $bottom);
    $this->vertexes[] = new Vertex($bottom, $bottom, $bottom);
  }

}
