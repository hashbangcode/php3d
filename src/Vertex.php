<?php

namespace hashbangcode\php3d;

class Vertex implements VertexInterface {

  public $x;
  public $y;
  public $z;

  public function __construct($x, $y, $z) {
    $this->setX($x);
    $this->setY($y);
    $this->setZ($z);
  }

  public function setX($x) {
    $this->x = (float) round($x, 5);
  }

  public function setY($y) {
    $this->y = (float) round($y, 5);
  }

  public function setZ($z) {
    $this->z = (float) round($z, 5);
  }

  public function translate(VertexInterface $vertex) {
    $this->setX($this->x + $vertex->x);
    $this->setY($this->y + $vertex->y);
    $this->setZ($this->z + $vertex->z);
  }

  public function rotateX($angle) {
    $matrix = [
      [1, 0, 0],
      [0, cos($angle), sin($angle)],
      [0, -sin($angle), cos($angle)],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  public function rotateY($angle) {
    $matrix = [
      [cos($angle), 0, -sin($angle)],
      [0, 1, 0],
      [sin($angle), 0, cos($angle)],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  public function rotateZ($angle) {
    $matrix = [
      [cos($angle), sin($angle), 0],
      [-sin($angle), cos($angle), 0],
      [0, 0, 1],
    ];

    $x = ($this->x * $matrix[0][0]) + ($this->y * $matrix[0][1]) + ($this->z * $matrix[0][2]);
    $y = ($this->x * $matrix[1][0]) + ($this->y * $matrix[1][1]) + ($this->z * $matrix[1][2]);
    $z = ($this->x * $matrix[2][0]) + ($this->y * $matrix[2][1]) + ($this->z * $matrix[2][2]);

    $this->x = $x;
    $this->y = $y;
    $this->z = $z;
  }

  public function multiply(Matrix $matrix) {
    $theMatrix = $matrix->getMatrix();
    $this->x = ($this->x * $theMatrix[0][0]) + ($this->y * $theMatrix[0][1]) + ($this->z * $theMatrix[0][2]);
    $this->y = ($this->x * $theMatrix[1][0]) + ($this->y * $theMatrix[1][1]) + ($this->z * $theMatrix[1][2]);
    $this->z = ($this->x * $theMatrix[2][0]) + ($this->y * $theMatrix[2][1]) + ($this->z * $theMatrix[2][2]);
  }

  public function __toString() {
    $output = '';
    $output .= 'x:' . $this->x . ' y:' . $this->y . ' z:' . $this->z;
    return $output;
  }

  public static function exponent($value) {
    $split = explode('e', $value);
    if (count($split) == 1) {
        $split = explode('E', $value);
    }

    if (count($split) > 1) {
        $value = bcmul($split[0], bcpow(10, $split[1]));
    }

    return $value;
  }

}
