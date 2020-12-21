<?php

namespace hashbangcode\php3d;

/**
 * Class Matrix.
 *
 * @package hashbangcode\php3d
 */
class Matrix {

  protected $matrix;

  public function setMatrix(array $matrix) {
    $this->matrix = $matrix;
  }

  public function getMatrix() {
    return $this->matrix;
  }
}
